<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:sync {action : "export" to dump to JSON, "import" to restore from JSON}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export local database data to JSON or import JSON data into target database';

    protected array $tables = [
        'users',
        'brands',
        'vehicle_categories',
        'branches',
        'vehicles',
        'vehicle_images',
        'sliders',
        'menu_items',
        'pages',
        'posts',
        'site_sections',
        'settings',
        'testimonials',
        'form_configs',
        'podcasts',
    ];

    public function handle(): int
    {
        $action = $this->argument('action');

        if ($action === 'export') {
            return $this->exportData();
        }

        if ($action === 'import') {
            return $this->importData();
        }

        $this->error('Acción no válida. Use "export" o "import".');
        return Command::FAILURE;
    }

    protected function ensureLongTextColumns(): void
    {
        try {
            if (DB::getDriverName() === 'pgsql') {
                $queries = [
                    'ALTER TABLE branches ALTER COLUMN google_maps_url TYPE text;',
                    'ALTER TABLE branches ALTER COLUMN image_url TYPE text;',
                    'ALTER TABLE branches ALTER COLUMN address TYPE text;',
                    'ALTER TABLE vehicle_images ALTER COLUMN image_path TYPE text;',
                    'ALTER TABLE sliders ALTER COLUMN image_desktop TYPE text;',
                    'ALTER TABLE sliders ALTER COLUMN image_mobile TYPE text;',
                    'ALTER TABLE sliders ALTER COLUMN button_url TYPE text;',
                    'ALTER TABLE sliders ALTER COLUMN button_secondary_url TYPE text;',
                    'ALTER TABLE testimonials ALTER COLUMN avatar_url TYPE text;',
                    'ALTER TABLE podcasts ALTER COLUMN spotify_url TYPE text;',
                    'ALTER TABLE podcasts ALTER COLUMN youtube_url TYPE text;',
                    'ALTER TABLE podcasts ALTER COLUMN cover_image TYPE text;',
                ];
                foreach ($queries as $sql) {
                    try {
                        DB::statement($sql);
                    } catch (\Throwable) {
                        // Continuar si la tabla o columna aún no existe
                    }
                }
            }
        } catch (\Throwable) {
            // Ignorar excepciones al ajustar tipos
        }
    }

    protected function exportData(): int
    {
        $this->info('Exportando datos de la base de datos a JSON...');
        $data = [];

        foreach ($this->tables as $table) {
            if (Schema::hasTable($table)) {
                $rows = DB::table($table)->get()->map(function ($item) {
                    return (array) $item;
                })->toArray();
                $data[$table] = $rows;
                $this->line(" - Tabla <info>{$table}</info>: " . count($rows) . " registros exportados.");
            }
        }

        $filePath = database_path('consur_full_data.json');
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info("¡Exportación completada exitosamente en {$filePath}!");
        return Command::SUCCESS;
    }

    protected function importData(): int
    {
        $filePath = database_path('consur_full_data.json');

        if (!file_exists($filePath)) {
            $this->error("No se encontró el archivo {$filePath}");
            return Command::FAILURE;
        }

        $this->info('Importando datos desde JSON a la base de datos...');
        $content = file_get_contents($filePath);
        $data = json_decode($content, true);

        if (!$data) {
            $this->error('Error al decodificar el archivo JSON.');
            return Command::FAILURE;
        }

        // Desactivar restricciones de claves foráneas temporalmente
        Schema::disableForeignKeyConstraints();

        // Asegurar que las columnas de URLs y textos largos tengan tipo TEXT
        $this->ensureLongTextColumns();

        try {
            foreach ($this->tables as $table) {
                if (!isset($data[$table]) || !Schema::hasTable($table)) {
                    continue;
                }

                $rows = $data[$table];
                $this->line("Procesando tabla <comment>{$table}</comment> (" . count($rows) . " registros)...");

                foreach ($rows as $row) {
                    // Decodificar campos JSON que vienen como strings si el driver no lo hace
                    foreach ($row as $col => $val) {
                        if (is_string($val) && (str_starts_with($val, '{') || str_starts_with($val, '['))) {
                            $decoded = json_decode($val, true);
                            if (json_last_error() === JSON_ERROR_NONE) {
                                // Para MySQL/Postgres mantener json o array según corresponda
                                $row[$col] = $val;
                            }
                        }
                    }

                    // Manejo inteligente de claves únicas para evitar violaciones de unicidad (e.g. slug duplicado con otro ID previo de una migración)
                    $uniqueKeys = [
                        'pages' => ['slug'],
                        'settings' => ['key'],
                        'site_sections' => ['section_key'],
                        'form_configs' => ['key'],
                        'users' => ['email'],
                        'brands' => ['slug'],
                        'vehicle_categories' => ['slug'],
                        'vehicles' => ['slug'],
                    ];

                    if (isset($uniqueKeys[$table])) {
                        $match = [];
                        foreach ($uniqueKeys[$table] as $k) {
                            if (isset($row[$k])) {
                                $match[$k] = $row[$k];
                            }
                        }

                        if (!empty($match)) {
                            // Si ya existe un registro con esta clave pero con otro ID previo, eliminar el viejo
                            if (isset($row['id'])) {
                                DB::table($table)->where($match)->where('id', '!=', $row['id'])->delete();
                            }
                            DB::table($table)->updateOrInsert($match, $row);
                            continue;
                        }
                    }

                    if (isset($row['id'])) {
                        DB::table($table)->updateOrInsert(
                            ['id' => $row['id']],
                            $row
                        );
                    } else {
                        DB::table($table)->insert($row);
                    }
                }

                $this->info(" - Tabla <info>{$table}</info> importada correctamente.");
            }

            // Si es PostgreSQL, sincronizar las secuencias autoincrementales
            if (DB::getDriverName() === 'pgsql') {
                foreach ($this->tables as $table) {
                    if (Schema::hasColumn($table, 'id')) {
                        DB::statement("SELECT setval(pg_get_serial_sequence('{$table}', 'id'), coalesce(max(id), 1), max(id) IS NOT null) FROM {$table};");
                    }
                }
            }

            $this->info('¡Todos los datos han sido importados exitosamente!');
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('Error durante la importación: ' . $e->getMessage());
            return Command::FAILURE;
        } finally {
            Schema::enableForeignKeyConstraints();
        }
    }
}

