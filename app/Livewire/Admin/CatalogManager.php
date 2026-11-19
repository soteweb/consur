<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class CatalogManager extends Component
{
    use WithFileUploads;

    public string $title = '';
    public string $edition = '';
    public string $subtitle = '';
    public string $currentPdfUrl = '';
    public $newPdfFile = null;

    public function mount(): void
    {
        $this->title = Setting::get('catalog_title', 'Catálogo Digital Consur S.A.');
        $this->edition = Setting::get('catalog_edition', 'Edición Oficial Vigente');
        $this->subtitle = Setting::get(
            'catalog_subtitle',
            'Explorá nuestra revista interactiva con toda la gama de vehículos, fichas técnicas y beneficios exclusivos.'
        );
        $this->currentPdfUrl = Setting::get('catalog_pdf_url', '/catalogos/CATALOGO_CONSUR_TOYOTA_WEB_02.pdf');
    }

    public function saveCatalog(): void
    {
        $this->validate([
            'title' => 'required|string|max:120',
            'edition' => 'required|string|max:80',
            'subtitle' => 'nullable|string|max:300',
            'newPdfFile' => 'nullable|file|mimes:pdf|max:51200', // Hasta 50 MB
        ], [
            'newPdfFile.mimes' => 'El archivo del catálogo debe estar en formato PDF.',
            'newPdfFile.max' => 'El archivo PDF no debe superar los 50 MB.',
        ]);

        if ($this->newPdfFile) {
            $dir = public_path('catalogos');
            if (!File::isDirectory($dir)) {
                File::makeDirectory($dir, 0755, true);
            }

            $originalName = pathinfo($this->newPdfFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName = Str::slug($originalName, '_') ?: 'catalogo_consur';
            $filename = strtoupper($safeName) . '_' . now()->format('Y_m_His') . '.pdf';

            // Copiar archivo desde carpeta temporal de Livewire a public/catalogos
            File::copy($this->newPdfFile->getRealPath(), $dir . DIRECTORY_SEPARATOR . $filename);

            $this->currentPdfUrl = '/catalogos/' . $filename;
            $this->newPdfFile = null;
        }

        Setting::set('catalog_title', $this->title, 'catalog', 'Título del Catálogo Digital');
        Setting::set('catalog_edition', $this->edition, 'catalog', 'Edición / Mes del Catálogo');
        Setting::set('catalog_subtitle', $this->subtitle, 'catalog', 'Subtítulo del Catálogo Digital');
        Setting::set('catalog_pdf_url', $this->currentPdfUrl, 'catalog', 'Ruta del PDF del Catálogo Activo');
        Setting::set('catalog_updated_at', now()->translatedFormat('d M Y H:i'), 'catalog', 'Última actualización del Catálogo');

        ActivityLog::log(
            'catalog_updated',
            "Catálogo mensual actualizado ({$this->edition}): {$this->currentPdfUrl}"
        );

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => '¡Catálogo mensual actualizado y publicado correctamente!',
        ]);
    }

    public function activateFile(string $filename): void
    {
        $cleanName = basename($filename);
        $fullPath = public_path('catalogos/' . $cleanName);

        if (!File::exists($fullPath)) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'El archivo seleccionado no existe.',
            ]);
            return;
        }

        $this->currentPdfUrl = '/catalogos/' . $cleanName;
        Setting::set('catalog_pdf_url', $this->currentPdfUrl, 'catalog', 'Ruta del PDF del Catálogo Activo');

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => "El archivo {$cleanName} ahora es el catálogo activo en la web.",
        ]);
    }

    public function deleteFile(string $filename): void
    {
        $cleanName = basename($filename);
        $relativePath = '/catalogos/' . $cleanName;

        if ($this->currentPdfUrl === $relativePath) {
            $this->dispatch('notify', [
                'type' => 'warning',
                'message' => 'No podés eliminar el PDF que está actualmente publicado como activo.',
            ]);
            return;
        }

        $fullPath = public_path('catalogos/' . $cleanName);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
            $this->dispatch('notify', [
                'type' => 'info',
                'message' => "Archivo {$cleanName} eliminado del servidor.",
            ]);
        }
    }

    public function getAvailableFilesProperty(): array
    {
        $dir = public_path('catalogos');
        if (!File::isDirectory($dir)) {
            return [];
        }

        $files = [];
        foreach (File::files($dir) as $file) {
            if (strtolower($file->getExtension()) === 'pdf') {
                $name = $file->getFilename();
                $relPath = '/catalogos/' . $name;
                $files[] = [
                    'name' => $name,
                    'path' => $relPath,
                    'url' => asset('catalogos/' . $name),
                    'size_kb' => round($file->getSize() / 1024, 1),
                    'modified' => date('d/m/Y H:i', $file->getMTime()),
                    'mtime' => $file->getMTime(),
                    'is_active' => ($this->currentPdfUrl === $relPath),
                ];
            }
        }

        usort($files, fn ($a, $b) => $b['mtime'] <=> $a['mtime']);

        return $files;
    }

    public function render()
    {
        return view('livewire.admin.catalog-manager', [
            'availableFiles' => $this->availableFiles,
        ])->layoutData([
            'title' => 'Catálogo Mensual (Revista PDF)',
            'header' => 'Gestor de Catálogo Mensual (Revista Digital 3D)',
        ]);
    }
}
