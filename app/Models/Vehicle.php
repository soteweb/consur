<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'condition', // '0km' | 'usado'
        'brand_id',
        'vehicle_category_id',
        'branch_id',
        'model',
        'version',
        'slug',
        'year',
        'price_usd',
        'price_gs',
        'show_price',
        'price_note',
        'mileage_km',
        'fuel_type',
        'transmission',
        'traction',
        'engine',
        'doors',
        'color_exterior',
        'color_interior',
        'chassis_vin',
        'tagline',
        'description',
        'specs',
        'features',
        'is_certified',
        'is_featured',
        'is_hybrid',
        'status',
        'sort_order',
        // Plantilla Showcase 0 Km
        'monthly_fee_usd',
        'brochure_url',
        'video_url',
        'airbags',
        'colors',
        'versions',
        'safety',
        'highlights',
        'hero_banners',
        'custom_html',
        'html_media',
    ];

    protected $casts = [
        'year' => 'integer',
        'price_usd' => 'decimal:2',
        'price_gs' => 'decimal:0',
        'show_price' => 'boolean',
        'mileage_km' => 'integer',
        'doors' => 'integer',
        'specs' => 'array', // PostgreSQL JSONB
        'features' => 'array', // PostgreSQL JSONB
        'is_certified' => 'boolean',
        'is_featured' => 'boolean',
        'is_hybrid' => 'boolean',
        'sort_order' => 'integer',
        'monthly_fee_usd' => 'decimal:2',
        'airbags' => 'integer',
        'colors' => 'array',
        'versions' => 'array',
        'safety' => 'array',
        'highlights' => 'array',
        'hero_banners' => 'array',
        'html_media' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehicle) {
            if (empty($vehicle->uuid)) {
                $vehicle->uuid = (string) Str::uuid();
            }
            if (empty($vehicle->slug)) {
                $vehicle->slug = Str::slug($vehicle->model . '-' . ($vehicle->version ?? '') . '-' . $vehicle->year . '-' . Str::random(5));
            }
        });
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(VehicleCategory::class, 'vehicle_category_id');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(VehicleImage::class)->orderBy('sort_order', 'asc');
    }

    public function mainImage()
    {
        return $this->hasOne(VehicleImage::class)->where('is_main', true);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', 'disponible');
    }

    public function scopeNewVehicles($query)
    {
        return $query->where('condition', '0km');
    }

    public function scopeUsedVehicles($query)
    {
        return $query->where('condition', 'usado');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeCertified($query)
    {
        return $query->where('is_certified', true);
    }

    // Helper Accessors
    public function getFormattedPriceUsdAttribute(): string
    {
        if (!$this->show_price || !$this->price_usd) {
            return 'Consultar Precio';
        }
        return 'US$ ' . number_format($this->price_usd, 0, ',', '.');
    }

    public function getFormattedPriceGsAttribute(): string
    {
        if (!$this->show_price || !$this->price_gs) {
            return 'Consultar';
        }
        return '₲ ' . number_format($this->price_gs, 0, ',', '.');
    }

    public function getFormattedMileageAttribute(): string
    {
        return number_format($this->mileage_km, 0, ',', '.') . ' Km';
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        $main = $this->images->firstWhere('is_main', true) ?? $this->images->first();
        if ($main) {
            $path = $main->image_path;
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            if (file_exists(public_path($path))) {
                return asset($path);
            }
            return asset('storage/' . $path);
        }
        return asset('images/models/corolla.webp');
    }

    public function getHoverImageUrlAttribute(): string
    {
        $hover = $this->images->where('is_main', false)->first() ?? $this->images->get(1);
        if ($hover) {
            $path = $hover->image_path;
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            if (file_exists(public_path($path))) {
                return asset($path);
            }
            return asset('storage/' . $path);
        }
        return $this->primary_image_url;
    }

    public function getFullNameAttribute(): string
    {
        return trim(($this->brand ? $this->brand->name : '') . ' ' . $this->model . ' ' . ($this->version ?? '') . ' ' . $this->year);
    }

    /**
     * Resuelve una ruta de medio (URL absoluta, archivo en public/ o en storage/).
     */
    public static function mediaUrl(?string $path): ?string
    {
        if (empty($path)) {
            return null;
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        if (file_exists(public_path($path))) {
            return asset($path);
        }
        return asset('storage/' . ltrim($path, '/'));
    }

    public function getBrochureLinkAttribute(): ?string
    {
        return static::mediaUrl($this->brochure_url);
    }

    /**
     * Lista de URLs resueltas para las imágenes del Hero 0 Km.
     */
    public function getHeroBannerUrlsAttribute(): array
    {
        $banners = collect($this->hero_banners ?? [])
            ->map(function ($item) {
                $path = is_array($item) ? ($item['path'] ?? $item['image'] ?? '') : (string) $item;
                return static::mediaUrl($path);
            })
            ->filter()
            ->values()
            ->all();

        if (!empty($banners)) {
            return $banners;
        }

        return [$this->primary_image_url];
    }

    /**
     * Lista de slides del Hero 0 Km con soporte automático de versión Desktop y Mobile.
     */
    public function getHeroBannerSlidesAttribute(): array
    {
        $slides = collect($this->hero_banners ?? [])
            ->map(function ($item) {
                $path = is_array($item) ? ($item['path'] ?? $item['image'] ?? '') : (string) $item;
                $desktopUrl = static::mediaUrl($path);
                if (!$desktopUrl) {
                    return null;
                }

                $mobileUrl = $desktopUrl;
                if (is_array($item) && !empty($item['mobile'])) {
                    $mobileUrl = static::mediaUrl($item['mobile']) ?: $desktopUrl;
                } elseif (!str_starts_with($path, 'http://') && !str_starts_with($path, 'https://')) {
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $base = substr($path, 0, -(strlen($ext) + 1));
                    $candidateMobile = $base . '_mobile.' . $ext;
                    if (file_exists(public_path($candidateMobile))) {
                        $mobileUrl = asset($candidateMobile);
                    }
                }

                return [
                    'desktop' => $desktopUrl,
                    'mobile' => $mobileUrl,
                ];
            })
            ->filter()
            ->values()
            ->all();

        if (!empty($slides)) {
            return $slides;
        }

        return [[
            'desktop' => $this->primary_image_url,
            'mobile' => $this->primary_image_url,
        ]];
    }

    /**
     * URL embebible de YouTube a partir de cualquier formato de enlace.
     */
    public function getVideoEmbedUrlAttribute(): ?string
    {
        if (empty($this->video_url)) {
            return null;
        }
        if (preg_match('~(?:youtu\.be/|youtube\.com/(?:watch\?v=|embed/|shorts/))([\w-]{11})~', $this->video_url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }
        return $this->video_url;
    }

    public function getFormattedMonthlyFeeAttribute(): ?string
    {
        if (!$this->monthly_fee_usd) {
            return null;
        }
        return 'US$ ' . number_format($this->monthly_fee_usd, 0, ',', '.');
    }

    /**
     * Ficha técnica normalizada: [Etiqueta de grupo => [Etiqueta => Valor]].
     * Soporta el formato agrupado de la plantilla 0 Km y el formato plano heredado.
     */
    public function getSpecSheetAttribute(): array
    {
        $specs = is_array($this->specs) ? $this->specs : [];
        $groups = config('vehicle_template.spec_groups', []);
        $sheet = [];

        foreach ($groups as $groupKey => $group) {
            $values = $specs[$groupKey] ?? null;
            if (!is_array($values)) {
                continue;
            }
            foreach ($group['fields'] as $fieldKey => [$label]) {
                if (filled($values[$fieldKey] ?? null)) {
                    $sheet[$group['label']][$label] = $values[$fieldKey];
                }
            }
        }

        // Datos libres: grupo 'extra' + claves planas heredadas
        $extra = is_array($specs['extra'] ?? null) ? $specs['extra'] : [];
        foreach ($specs as $key => $value) {
            if (!is_array($value) && !isset($groups[$key]) && filled($value)) {
                $extra[$key] = $value;
            }
        }
        if (!empty($extra)) {
            $sheet['Otros Datos'] = $extra;
        }

        return $sheet;
    }

    /**
     * Sistemas de seguridad activos con su metadata del catálogo.
     */
    public function getSafetyItemsAttribute(): array
    {
        $catalog = config('vehicle_template.safety_catalog', []);
        return collect($this->safety ?? [])
            ->filter(fn($key) => isset($catalog[$key]))
            ->map(fn($key) => [
                'key' => $key,
                'label' => $catalog[$key][0],
                'description' => $catalog[$key][1],
                'icon' => $catalog[$key][2],
                'group' => $catalog[$key][3],
            ])
            ->values()
            ->all();
    }

    /**
     * Genera la sección de Galería Fotográfica interactiva (con pestañas, visor grande, miniaturas y lightbox)
     * adaptada con la identidad visual oficial de CONSUR S.A.
     */
    public static function renderLexusGallery(string $modelName, string $slug, array $items): string
    {
        $cleanSlug = preg_replace('/[^a-zA-Z0-9_]/', '_', $slug);
        $itemsJson = json_encode($items, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return <<<HTML
<!-- ================= GALERÍA FOTOGRÁFICA CONSUR ================= -->
<script>
window.toyotaGallery_{$cleanSlug} = function() {
    return {
        activeTab: 'todos',
        activeIdx: 0,
        lightbox: false,
        touchStartX: 0,
        touchEndX: 0,
        items: {$itemsJson},

        get filteredItems() {
            if (this.activeTab === 'todos') {
                return this.items;
            }
            return this.items.filter(item => (item.category || '').toLowerCase() === this.activeTab);
        },

        get currentItem() {
            const list = this.filteredItems;
            if (!list.length) return { image: '', caption: '', category: '' };
            return list[this.activeIdx] || list[0];
        },

        setTab(tab) {
            this.activeTab = tab;
            this.activeIdx = 0;
            this.scrollToThumb(0);
        },

        selectItem(index) {
            this.activeIdx = index;
            this.scrollToThumb(index);
        },

        prev() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx - 1 + total) % total;
            this.scrollToThumb(this.activeIdx);
        },

        next() {
            const total = this.filteredItems.length;
            if (total === 0) return;
            this.activeIdx = (this.activeIdx + 1) % total;
            this.scrollToThumb(this.activeIdx);
        },

        scrollToThumb(index) {
            this.\$nextTick(() => {
                const thumb = document.getElementById('toyota_thumb_{$cleanSlug}_' + index);
                if (thumb) {
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }
            });
        },

        handleTouchStart(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchStartX = e.changedTouches[0].screenX;
            }
        },

        handleTouchEnd(e) {
            if (e.changedTouches && e.changedTouches[0]) {
                this.touchEndX = e.changedTouches[0].screenX;
                const diff = this.touchStartX - this.touchEndX;
                if (diff > 45) {
                    this.next();
                } else if (diff < -45) {
                    this.prev();
                }
            }
        }
    };
};
</script>

<section id="galeria" class="py-16 md:py-24 bg-slate-50 border-y border-slate-200/80 overflow-hidden"
    x-data="toyotaGallery_{$cleanSlug}()"
    @keydown.escape.window="lightbox = false"
    @keydown.arrow-left.window="if (lightbox) prev()"
    @keydown.arrow-right.window="if (lightbox) next()"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con título y pestañas interactivas -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-3xl sm:text-4xl font-light text-slate-900 font-heading uppercase">
                    Galería
                </h2>
            </div>

            <!-- Pestañas de filtrado (Todos / Exterior / Interior) -->
            <div class="inline-flex items-center p-1 rounded-full bg-slate-200/80 border border-slate-300 self-start md:self-auto shadow-inner">
                <button type="button" 
                    @click="setTab('todos')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'todos' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Todos
                </button>
                <button type="button" 
                    @click="setTab('exterior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'exterior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Exterior
                </button>
                <button type="button" 
                    @click="setTab('interior')"
                    class="px-5 py-2 rounded-full text-xs font-bold tracking-wider uppercase transition-all duration-300"
                    :class="activeTab === 'interior' ? 'bg-[#eb0a1e] text-white shadow-md shadow-red-600/30' : 'text-slate-600 hover:text-slate-900'">
                    Interior
                </button>
            </div>
        </div>

        <!-- Escenario Principal del Slider (Gran Formato Cinemático) -->
        <div class="mt-8 relative group">
            <div 
                class="relative aspect-[16/10] sm:aspect-[16/9] lg:aspect-[21/9] max-h-[620px] w-full overflow-hidden rounded-3xl bg-slate-950 border border-slate-200 select-none shadow-xl cursor-pointer"
                @click="lightbox = true"
                @touchstart="handleTouchStart(\$event)"
                @touchend="handleTouchEnd(\$event)"
            >
                <!-- Capa de Imágenes con transición suave -->
                <template x-for="(item, idx) in filteredItems" :key="item.image + '_' + idx">
                    <div 
                        class="absolute inset-0 transition-opacity duration-500 ease-in-out"
                        :class="activeIdx === idx ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'"
                    >
                        <img 
                            :src="item.image" 
                            :alt="'Foto ' + (idx + 1)" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
                            loading="lazy"
                        >
                    </div>
                </template>

                <!-- Botón Flotante de Pantalla Completa (Lexus icon_expand) -->
                <button 
                    type="button" 
                    @click.stop="lightbox = true"
                    class="absolute top-4 right-4 z-20 inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-black/60 hover:bg-black/85 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider backdrop-blur-md transition hover:scale-105"
                    title="Ver en pantalla completa"
                >
                    <i class="fas fa-expand text-[#eb0a1e] text-xs"></i>
                    <span class="hidden sm:inline">Pantalla Completa</span>
                </button>

                <!-- Etiqueta Flotante de Categoría -->
                <div class="absolute top-4 left-4 z-20">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-black/60 border border-white/15 text-[10px] font-extrabold uppercase tracking-widest text-slate-200 backdrop-blur-md"
                        x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'TOYOTA')"
                    ></span>
                </div>

                <!-- Contador elegante en esquina inferior derecha (sin textos) -->
                <div class="absolute bottom-4 right-4 z-20 pointer-events-none">
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-black/65 border border-white/20 text-xs font-mono font-bold text-white backdrop-blur-md">
                        <span x-text="String(activeIdx + 1).padStart(2, '0')"></span>
                        <span class="text-slate-400">/</span>
                        <span class="text-slate-400" x-text="String(filteredItems.length).padStart(2, '0')"></span>
                    </span>
                </div>
            </div>

            <!-- Botones de Navegación Anterior / Siguiente -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto anterior"
            >
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-3 sm:right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/60 hover:bg-[#eb0a1e] border border-white/20 hover:border-[#eb0a1e] text-white flex items-center justify-center transition-all duration-300 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 backdrop-blur-md hover:scale-110 shadow-lg"
                aria-label="Foto siguiente"
            >
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        <!-- Tira de Miniaturas Sincronizada -->
        <div class="mt-4 sm:mt-6">
            <div 
                class="flex items-center gap-3 overflow-x-auto no-scrollbar py-2 px-1 scroll-smooth"
            >
                <template x-for="(item, idx) in filteredItems" :key="'thumb_' + idx">
                    <button 
                        type="button"
                        :id="'toyota_thumb_{$cleanSlug}_' + idx"
                        @click="selectItem(idx)"
                        class="relative flex-shrink-0 w-24 sm:w-32 lg:w-36 aspect-[16/10] rounded-xl overflow-hidden border transition-all duration-300 group focus:outline-none"
                        :class="activeIdx === idx 
                            ? 'border-[#eb0a1e] ring-2 ring-[#eb0a1e]/50 scale-[1.03] opacity-100 shadow-md' 
                            : 'border-slate-300 opacity-50 hover:opacity-90 hover:border-slate-400'"
                        :title="'Foto ' + (idx + 1)"
                    >
                        <img :src="item.image" :alt="'Foto ' + (idx + 1)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        <div class="absolute inset-0 bg-black/15 group-hover:bg-transparent transition-colors"></div>
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Modal Lightbox Pantalla Completa -->
    <div 
        x-show="lightbox"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/95 backdrop-blur-xl flex flex-col justify-between p-4 sm:p-8"
        @click.self="lightbox = false"
    >
        <!-- Barra superior del Lightbox -->
        <div class="flex items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#eb0a1e]"></span>
                <span class="text-xs uppercase tracking-widest font-bold text-white">{$modelName} · <span x-text="(currentItem.category ? currentItem.category.toUpperCase() : 'GALERÍA')"></span></span>
            </div>
            <button 
                type="button" 
                @click="lightbox = false"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition border border-white/15 hover:rotate-90"
                title="Cerrar (Esc)"
            >
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Imagen Central en Proporción Original Completa -->
        <div 
            class="relative flex-1 flex items-center justify-center py-4 overflow-hidden select-none"
            @touchstart="handleTouchStart(\$event)"
            @touchend="handleTouchEnd(\$event)"
        >
            <img 
                :src="currentItem.image" 
                :alt="'Foto ' + (activeIdx + 1)" 
                class="max-h-[75vh] max-w-full object-contain rounded-lg shadow-2xl transition-all duration-300"
            >

            <!-- Flechas dentro del Lightbox -->
            <button 
                type="button" 
                @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Anterior"
            >
                <i class="fas fa-chevron-left text-base"></i>
            </button>
            <button 
                type="button" 
                @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/10 hover:bg-[#eb0a1e] border border-white/20 text-white flex items-center justify-center transition hover:scale-110"
                aria-label="Siguiente"
            >
                <i class="fas fa-chevron-right text-base"></i>
            </button>
        </div>

        <!-- Barra inferior del Lightbox -->
        <div class="pt-4 border-t border-white/10 flex items-center justify-between gap-4 text-xs text-slate-400">
            <span class="font-mono text-white font-bold" x-text="(activeIdx + 1) + ' / ' + filteredItems.length"></span>
            <span class="hidden sm:inline">Navegá con las flechas &larr; &rarr; o deslizá con el dedo</span>
        </div>
    </div>
</section>
HTML;
    }
}
