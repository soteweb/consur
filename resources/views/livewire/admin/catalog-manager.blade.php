<div class="space-y-8">
    <!-- Encabezado y Acceso Rápido al Visor Público -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <span class="text-xs font-bold uppercase tracking-widest text-[#eb0a1e] block">Revista Digital 3D</span>
            <h2 class="text-xl font-bold text-slate-900 mt-0.5">Catálogo Mensual (PDF)</h2>
            <p class="text-xs text-slate-500 mt-1">
                Subí el archivo PDF del catálogo del mes para que se visualice automáticamente como una revista interactiva 3D en <code>/catalogo</code>.
            </p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="{{ route('catalogo') }}" target="_blank"
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold uppercase tracking-wider transition shadow-sm">
                <i class="fas fa-book-open text-red-400"></i>
                <span>Ver Revista en Vivo</span>
                <i class="fas fa-external-link-alt text-[10px] opacity-70"></i>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Columna Izquierda: Formulario de Subida y Configuración -->
        <div class="lg:col-span-7 space-y-6">
            <form wire:submit.prevent="saveCatalog" class="bg-white rounded-2xl border border-slate-200/80 p-6 sm:p-8 shadow-xs space-y-6">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <i class="fas fa-cloud-upload-alt text-[#eb0a1e]"></i>
                        <span>Actualizar Catálogo del Mes</span>
                    </h3>
                    <span class="text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                        Publicación Inmediata
                    </span>
                </div>

                <!-- Subida de Nuevo Archivo PDF -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                        Subir Nuevo Archivo PDF (Opcional si solo editás textos)
                    </label>
                    <div class="relative border-2 border-dashed border-slate-300 hover:border-[#eb0a1e] rounded-2xl p-6 text-center transition bg-slate-50/60">
                        <input type="file" wire:model="newPdfFile" accept="application/pdf"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="space-y-2">
                            <div class="w-12 h-12 rounded-2xl bg-red-50 text-[#eb0a1e] flex items-center justify-center mx-auto text-xl">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            @if($newPdfFile)
                                <p class="text-sm font-bold text-emerald-600">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Archivo listo: {{ $newPdfFile->getClientOriginalName() }}
                                </p>
                                <p class="text-[11px] text-slate-500">
                                    Hacé clic en "Guardar y Publicar Catálogo" para activarlo.
                                </p>
                            @else
                                <p class="text-sm font-semibold text-slate-700">
                                    Arrastrá tu archivo PDF aquí o <span class="text-[#eb0a1e] underline">hacé clic para seleccionar</span>
                                </p>
                                <p class="text-[11px] text-slate-400">
                                    Formato permitido: PDF (Máximo 50 MB)
                                </p>
                            @endif
                        </div>

                        <!-- Indicador de carga mientras sube -->
                        <div wire:loading wire:target="newPdfFile" class="mt-3 text-xs font-bold text-[#eb0a1e]">
                            <i class="fas fa-spinner fa-spin mr-1"></i> Subiendo archivo PDF...
                        </div>
                    </div>
                    @error('newPdfFile')
                        <span class="text-xs text-rose-600 font-semibold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Datos Editoriales -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Título Principal
                        </label>
                        <input type="text" wire:model="title"
                               class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm focus:border-[#eb0a1e] focus:outline-hidden"
                               placeholder="Catálogo Digital CONSUR S.A.">
                        @error('title') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Edición / Mes
                        </label>
                        <input type="text" wire:model="edition"
                               class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm focus:border-[#eb0a1e] focus:outline-hidden"
                               placeholder="Ej: Edición Noviembre 2026">
                        @error('edition') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Descripción / Bajada
                    </label>
                    <textarea wire:model="subtitle" rows="2"
                              class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm focus:border-[#eb0a1e] focus:outline-hidden"
                              placeholder="Breve descripción sobre la edición vigente del catálogo..."></textarea>
                    @error('subtitle') <span class="text-xs text-rose-600">{{ $message }}</span> @enderror
                </div>

                <div class="pt-2 flex items-center justify-end gap-3">
                    <button type="submit"
                            wire:loading.attr="disabled"
                            class="px-6 py-3 rounded-xl bg-[#eb0a1e] hover:bg-red-700 text-white text-xs font-bold uppercase tracking-wider transition shadow-md flex items-center gap-2 cursor-pointer">
                        <span wire:loading.remove wire:target="saveCatalog">
                            <i class="fas fa-save mr-1"></i> Guardar y Publicar Catálogo
                        </span>
                        <span wire:loading wire:target="saveCatalog">
                            <i class="fas fa-spinner fa-spin mr-1"></i> Publicando...
                        </span>
                    </button>
                </div>
            </form>

            <!-- Historial de Archivos PDF en el Servidor -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 flex items-center gap-2">
                        <i class="fas fa-folder-open text-slate-400"></i>
                        <span>Archivos PDF en el Servidor ({{ count($availableFiles) }})</span>
                    </h3>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse($availableFiles as $file)
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="flex items-start gap-3 min-w-0">
                                <div class="w-9 h-9 rounded-xl {{ $file['is_active'] ? 'bg-red-50 text-[#eb0a1e]' : 'bg-slate-100 text-slate-500' }} flex items-center justify-center shrink-0">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span class="text-xs font-bold text-slate-800 truncate">{{ $file['name'] }}</span>
                                        @if($file['is_active'])
                                            <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-700">
                                                Activo Ahora
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-[11px] text-slate-400 font-mono mt-0.5">
                                        {{ $file['size_kb'] }} KB &bull; Subido: {{ $file['modified'] }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 shrink-0">
                                @if(!$file['is_active'])
                                    <button type="button"
                                            wire:click="activateFile('{{ $file['name'] }}')"
                                            class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-emerald-600 hover:text-white text-slate-700 text-[11px] font-bold transition">
                                        Activar
                                    </button>
                                @endif

                                <a href="{{ $file['url'] }}" target="_blank"
                                   class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs transition"
                                   title="Abrir PDF">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>

                                @if(!$file['is_active'])
                                    <button type="button"
                                            wire:click="deleteFile('{{ $file['name'] }}')"
                                            wire:confirm="¿Eliminar el archivo PDF {{ $file['name'] }}?"
                                            class="p-2 rounded-lg bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white text-xs transition"
                                            title="Eliminar PDF">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 py-4 text-center">No hay archivos PDF cargados todavía.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Vista Previa Rápida del PDF Activo -->
        <div class="lg:col-span-5">
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs space-y-4 sticky top-6">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-600 block">Catálogo Publicado</span>
                        <h4 class="text-sm font-bold text-slate-900">Vista Previa del Documento</h4>
                    </div>
                    <a href="{{ asset(ltrim($currentPdfUrl, '/')) }}" target="_blank"
                       class="text-xs font-bold text-[#eb0a1e] hover:underline flex items-center gap-1">
                        <span>Descargar</span>
                        <i class="fas fa-download text-[10px]"></i>
                    </a>
                </div>

                <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-900 h-[480px]">
                    <iframe src="{{ asset(ltrim($currentPdfUrl, '/')) }}#toolbar=0&navpanes=0"
                            class="w-full h-full border-0"
                            title="Vista Previa Catálogo PDF"></iframe>
                </div>

                <p class="text-[11px] text-slate-500 leading-relaxed">
                    <i class="fas fa-magic text-[#eb0a1e] mr-1"></i>
                    En la página pública (<code>/catalogo</code>), este PDF se transforma automáticamente en una <strong>Revista Interactiva 3D</strong> con efecto de paso de hojas, zoom y vista en cuadrícula.
                </p>
            </div>
        </div>
    </div>
</div>

