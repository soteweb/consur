<div>
    <!-- Page Title Banner -->
    <div class="bg-slate-900 text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&q=80&w=1920')] bg-cover bg-center opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-900/90 to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="text-xs text-slate-400 mb-3 font-medium uppercase tracking-wider" data-aos="fade-down">
                <a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a> <span class="mx-2">/</span> <span class="text-red-500 font-bold">Vehículos Usados</span>
            </nav>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-light text-white tracking-normal font-heading leading-tight" data-aos="fade-up">
                Vehículos con Experiencia &bull; <span class="font-normal text-red-500">Vehículos Usados</span>
            </h1>
            <p class="mt-2 text-sm sm:text-base text-slate-300 font-light max-w-2xl leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                Encontrá el usado ideal con el respaldo, la inspección técnica de 150 puntos y la garantía oficial de CONSUR S.A.
            </p>
        </div>
    </div>

    <!-- Catálogo de Vehículos Usados Seleccionados -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Filters Sidebar -->
            <aside class="w-full lg:w-1/4" data-aos="fade-right">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xs border border-slate-200/80 dark:border-slate-800 p-6 sticky top-28 space-y-6">
                    <div class="flex justify-between items-center pb-4 border-b border-slate-100 dark:border-slate-800">
                        <h2 class="text-base font-semibold text-slate-900 dark:text-white uppercase font-heading tracking-tight flex items-center gap-2">
                            <i class="fas fa-filter text-red-600 text-sm"></i> Filtros
                        </h2>
                        <button wire:click="clearFilters" class="text-xs text-red-600 hover:text-red-700 font-bold transition">
                            Limpiar todo
                        </button>
                    </div>

                    <!-- Search Input -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">Buscador</label>
                        <div class="relative">
                            <input type="text" 
                                   wire:model.live.debounce.300ms="search" 
                                   placeholder="Modelo, versión..." 
                                   class="w-full pl-9 pr-3 py-2 text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-950 text-slate-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-red-500">
                            <i class="fas fa-search absolute left-3 top-2.5 text-slate-400 dark:text-slate-400 text-xs"></i>
                        </div>
                    </div>

                    <!-- Filter Group: Marcas -->
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-3">Marca</h3>
                        <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                            @foreach($brands as $brand)
                                <label class="flex items-center justify-between group cursor-pointer text-xs">
                                    <div class="flex items-center">
                                        <input type="checkbox" wire:model.live="selectedBrands" value="{{ $brand->id }}" 
                                               class="w-4 h-4 rounded border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 text-red-600 focus:ring-red-500 cursor-pointer">
                                        <span class="ml-2.5 text-slate-700 dark:text-slate-300 group-hover:text-slate-900 dark:group-hover:text-white">{{ $brand->name }}</span>
                                    </div>
                                    <span class="text-slate-400 dark:text-slate-400 text-[11px]">({{ $brand->vehicles_count }})</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Filter Group: Carrocería -->
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-3">Carrocería</h3>
                        <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                            @foreach($categories as $category)
                                <label class="flex items-center justify-between group cursor-pointer text-xs">
                                    <div class="flex items-center">
                                        <input type="checkbox" wire:model.live="selectedCategories" value="{{ $category->id }}" 
                                               class="w-4 h-4 rounded border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 text-red-600 focus:ring-red-500 cursor-pointer">
                                        <span class="ml-2.5 text-slate-700 dark:text-slate-300 group-hover:text-slate-900 dark:group-hover:text-white">{{ $category->name }}</span>
                                    </div>
                                    <span class="text-slate-400 dark:text-slate-400 text-[11px]">({{ $category->vehicles_count }})</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Filter Group: Combustible -->
                    @if(count($availableFuels) > 0)
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-3">Combustible</h3>
                        <div class="space-y-2">
                            @foreach($availableFuels as $fuel)
                                <label class="flex items-center group cursor-pointer text-xs">
                                    <input type="checkbox" wire:model.live="selectedFuels" value="{{ $fuel }}" 
                                           class="w-4 h-4 rounded border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 text-red-600 focus:ring-red-500 cursor-pointer">
                                    <span class="ml-2.5 text-slate-700 dark:text-slate-300 group-hover:text-slate-900 dark:group-hover:text-white">{{ $fuel }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Filter Group: Sucursal -->
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">Sucursal</h3>
                        <select wire:model.live="selectedBranch" class="w-full text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-950 text-slate-900 dark:text-white py-2 focus:ring-2 focus:ring-red-500">
                            <option value="">Todas las sucursales</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->city }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </aside>

            <!-- Results Section -->
            <main class="w-full lg:w-3/4 space-y-6">
                <!-- Top Toolbar: Counter, Sort, View Switcher -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl p-4 border border-slate-200/80 dark:border-slate-800 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-xs text-slate-600 dark:text-slate-400">
                        Mostrando <strong class="text-slate-900 dark:text-white">{{ $vehicles->total() }}</strong> vehículos usados encontrados
                    </div>

                    <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                        <!-- Sort Dropdown -->
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-slate-500 dark:text-slate-400">Ordenar:</span>
                            <select wire:model.live="sortBy" class="text-xs rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-950 text-slate-900 dark:text-white py-1.5 focus:ring-2 focus:ring-red-500">
                                <option value="newest">Más recientes</option>
                                <option value="price_asc">Menor precio</option>
                                <option value="price_desc">Mayor precio</option>
                                <option value="year_desc">Año más nuevo</option>
                                <option value="mileage_asc">Menor kilometraje</option>
                            </select>
                        </div>

                        <!-- View Toggle -->
                        <div class="flex items-center border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden">
                            <button wire:click="$set('viewMode', 'grid')" 
                                    class="px-3 py-1.5 text-xs transition {{ $viewMode === 'grid' ? 'bg-slate-900 text-white' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button wire:click="$set('viewMode', 'list')" 
                                    class="px-3 py-1.5 text-xs transition {{ $viewMode === 'list' ? 'bg-slate-900 text-white' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Vehicles Grid / List -->
                @if($viewMode === 'grid')
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($vehicles as $veh)
                            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ ($loop->index % 6) * 50 }}">
                                <!-- Photo Area -->
                                <div class="relative aspect-[16/10] bg-slate-100 dark:bg-slate-950 overflow-hidden">
                                    <img src="{{ $veh->primary_image_url }}" alt="{{ $veh->full_name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                    
                                    <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                                        @if($veh->is_hybrid)
                                            <span class="bg-[#005cb9] text-white text-[10px] font-extrabold uppercase px-2.5 py-1 rounded shadow-sm flex items-center gap-1 tracking-wide">
                                                <i class="fas fa-bolt text-[9px]"></i> HEV Híbrido
                                            </span>
                                        @endif
                                    </div>

                                    <div class="absolute bottom-3 right-3 bg-slate-900/90 backdrop-blur-sm text-white px-2.5 py-1 rounded-lg text-xs font-bold shadow-sm">
                                        {{ $veh->year }}
                                    </div>
                                </div>

                                <!-- Body -->
                                <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                                    <div>
                                        <div class="flex items-center justify-between text-[11px] font-bold text-slate-400 dark:text-slate-400 uppercase">
                                            <span>{{ $veh->brand->name ?? '' }}</span>
                                            <span><i class="fas fa-tachometer-alt mr-1 text-red-500"></i>{{ $veh->formatted_mileage }}</span>
                                        </div>
                                        <h3 class="text-base font-semibold text-slate-900 dark:text-white font-heading uppercase tracking-wide group-hover:text-red-600 transition mt-0.5">
                                            {{ $veh->model }}
                                        </h3>
                                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium truncate">{{ $veh->version }}</p>
                                        
                                        <!-- Price -->
                                        <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800">
                                            <span class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider block leading-none mb-0.5">Precio Contado</span>
                                            <span class="text-lg font-black text-slate-900 dark:text-white">{{ $veh->formatted_price_usd }}</span>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="pt-2 flex items-center gap-2">
                                        <a href="{{ route('vehiculo.detalle', $veh->slug) }}" 
                                           class="flex-1 text-center bg-slate-900 dark:bg-red-600 hover:bg-red-600 dark:hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider py-2.5 rounded-xl transition shadow-sm">
                                            Ver Detalle
                                        </a>
                                        <a href="https://wa.me/{{ \App\Models\Setting::get('contact_whatsapp', '595985204106') }}?text=Hola%20CONSUR,%20me%20interesa%20el%20usado%20{{ urlencode($veh->full_name) }}" 
                                           target="_blank" 
                                           class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition border border-emerald-200 dark:border-emerald-800/50"
                                           title="Consultar por WhatsApp">
                                            <i class="fab fa-whatsapp text-base"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-12 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-8 space-y-3">
                                <i class="fas fa-search text-slate-300 dark:text-slate-600 text-4xl"></i>
                                <h4 class="text-base font-bold text-slate-800 dark:text-white">No encontramos vehículos con los filtros seleccionados</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Probá modificando los criterios de búsqueda o limpiando los filtros.</p>
                                <button wire:click="clearFilters" class="px-5 py-2 bg-red-600 text-white text-xs font-bold rounded-full">
                                    Limpiar todos los filtros
                                </button>
                            </div>
                        @endforelse
                    </div>
                @else
                    <!-- List View -->
                    <div class="space-y-4">
                        @forelse($vehicles as $veh)
                            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 p-4 shadow-xs hover:shadow-lg transition flex flex-col sm:flex-row gap-5 items-center group"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ ($loop->index % 6) * 50 }}">
                                <div class="w-full sm:w-56 aspect-[16/10] rounded-xl overflow-hidden flex-shrink-0 bg-slate-100 dark:bg-slate-950">
                                    <img src="{{ $veh->primary_image_url }}" alt="{{ $veh->full_name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                </div>
                                <div class="flex-1 min-w-0 space-y-1">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-semibold text-slate-400 dark:text-slate-400">{{ $veh->year }} &bull; {{ $veh->fuel_type }} &bull; {{ $veh->formatted_mileage }}</span>
                                    </div>
                                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white font-heading uppercase tracking-wide group-hover:text-red-600 transition">{{ $veh->full_name }}</h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2">{{ $veh->description }}</p>
                                </div>
                                <div class="w-full sm:w-auto text-right flex sm:flex-col justify-between sm:justify-center items-end gap-2">
                                    <div>
                                        <span class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider block leading-none mb-0.5">Precio Contado</span>
                                        <span class="text-lg font-black text-slate-900 dark:text-white">{{ $veh->formatted_price_usd }}</span>
                                    </div>
                                    <a href="{{ route('vehiculo.detalle', $veh->slug) }}" class="px-5 py-2.5 bg-slate-900 dark:bg-red-600 hover:bg-red-600 dark:hover:bg-red-700 text-white text-xs font-bold rounded-xl transition">
                                        Ver Ficha
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-8 space-y-3">
                                <i class="fas fa-search text-slate-300 dark:text-neutral-600 text-4xl"></i>
                                <h4 class="text-base font-bold text-slate-800 dark:text-white">No encontramos vehículos con los filtros seleccionados</h4>
                                <button wire:click="clearFilters" class="px-5 py-2 bg-red-600 text-white text-xs font-bold rounded-full">
                                    Limpiar filtros
                                </button>
                            </div>
                        @endforelse
                    </div>
                @endif

                <!-- Pagination -->
                <div class="pt-6">
                    {{ $vehicles->links() }}
                </div>
            </main>
        </div>
    </div>
</div>
