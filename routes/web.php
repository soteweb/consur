<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Admin\AuditManager;
use App\Livewire\Admin\BranchesManager;
use App\Livewire\Admin\BrandsManager;
use App\Livewire\Admin\CatalogManager;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\FooterManager;
use App\Livewire\Admin\FormsManager;
use App\Livewire\Admin\LeadsManager;
use App\Livewire\Admin\MenusManager;
use App\Livewire\Admin\PagesManager;
use App\Livewire\Admin\PostsManager;
use App\Livewire\Admin\SectionsManager;
use App\Livewire\Admin\SettingsManager;
use App\Livewire\Admin\SlidersManager;
use App\Livewire\Admin\TestimonialsManager;
use App\Livewire\Admin\UsersManager;
use App\Livewire\Admin\VehiclesManager;
use App\Livewire\Frontend\BrandShowcase;
use App\Livewire\Frontend\CanamShowcase;
use App\Livewire\Frontend\CatalogViewer;
use App\Livewire\Frontend\ContactPage;
use App\Livewire\Frontend\DescubreMas;
use App\Livewire\Frontend\DynamicPage;
use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\NewsDetail;
use App\Livewire\Frontend\NewsIndex;
use App\Livewire\Frontend\OmodaJaecoo;
use App\Livewire\Frontend\SeadooShowcase;
use App\Livewire\Frontend\ToyotaLanding;
use App\Livewire\Frontend\TrabajaConNosotros;
use App\Livewire\Frontend\UsadosCatalog;
use App\Livewire\Frontend\VehicleDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas del Frontend Público (Consur S.A.)
|--------------------------------------------------------------------------
*/
Route::get('/', Home::class)->name('home');
Route::get('/toyota', ToyotaLanding::class)->name('toyota');
Route::get('/marcas/toyota', fn () => redirect()->route('toyota'));
Route::get('/0km', fn () => redirect()->route('toyota'));
Route::get('/hino', DynamicPage::class)->name('hino');
Route::get('/marcas/hino', fn () => redirect()->route('hino'));
Route::get('/omoda-jaecoo', OmodaJaecoo::class)->name('omoda-jaecoo');
Route::get('/omoda-jaecoo/{model}', OmodaJaecoo::class)
    ->whereIn('model', ['omoda-c5', 'omoda-e5', 'jaecoo-j5', 'jaecoo-j7'])
    ->name('omoda-jaecoo.model');
Route::get('/omoda-c5', fn () => redirect()->route('omoda-jaecoo.model', 'omoda-c5'));
Route::get('/omoda-e5', fn () => redirect()->route('omoda-jaecoo.model', 'omoda-e5'));
Route::get('/jaecoo-j5', fn () => redirect()->route('omoda-jaecoo.model', 'jaecoo-j5'));
Route::get('/jaecoo-j7', fn () => redirect()->route('omoda-jaecoo.model', 'jaecoo-j7'));
Route::get('/marcas/omoda-jaecoo', fn () => redirect()->route('omoda-jaecoo'));
Route::get('/marcas/seguros', fn () => redirect()->route('seguros'));
Route::get('/marcas/consur-bike', fn () => redirect()->route('consur-bike'));
Route::get('/omoda', fn () => redirect()->route('omoda-jaecoo'));
Route::get('/jaecoo', fn () => redirect()->route('omoda-jaecoo'));

// Can-Am
Route::get('/canam', CanamShowcase::class)->name('canam');
Route::get('/can-am', fn () => redirect()->route('canam'));
Route::get('/marcas/can-am', fn () => redirect()->route('canam'));
Route::get('/marcas/canam', fn () => redirect()->route('canam'));

// Sea-Doo
Route::get('/seadoo', SeadooShowcase::class)->name('seadoo');
Route::get('/sea-doo', fn () => redirect()->route('seadoo'));
Route::get('/marcas/sea-doo', fn () => redirect()->route('seadoo'));
Route::get('/marcas/seadoo', fn () => redirect()->route('seadoo'));

Route::get('/marcas/{slug}', BrandShowcase::class)->name('marca.show');
Route::get('/usados', UsadosCatalog::class)->name('usados');
Route::get('/vehiculos/{slug}', VehicleDetail::class)->name('vehiculo.detalle');
Route::get('/v/{slug}', VehicleDetail::class)->name('vehicle.detail'); // Alias para compatibilidad de rutas
Route::get('/raize', fn () => redirect()->route('vehiculo.detalle', 'raize'));
Route::get('/rush', fn () => redirect()->route('vehiculo.detalle', 'rush'));
Route::get('/corolla-gli', fn () => redirect()->route('vehiculo.detalle', 'corolla'));
Route::get('/corolla-cross', fn () => redirect()->route('vehiculo.detalle', 'corolla-cross'));
Route::get('/agya', fn () => redirect()->route('vehiculo.detalle', 'agya'));
Route::get('/rav-4-limited', fn () => redirect()->route('vehiculo.detalle', 'rav4'));
Route::get('/yariscross', fn () => redirect()->route('vehiculo.detalle', 'yaris-cross'));
Route::get('/landcruiservx300', fn () => redirect()->route('vehiculo.detalle', 'land-cruiser-300'));
Route::get('/hiluxcabinasimple', fn () => redirect()->route('vehiculo.detalle', 'hilux-cabina-simple'));
Route::get('/land-cruiser-prado2025', fn () => redirect()->route('vehiculo.detalle', 'land-cruiser-prado'));
Route::get('/hiace', fn () => redirect()->route('vehiculo.detalle', 'hiace'));
Route::get('/fortuner', fn () => redirect()->route('vehiculo.detalle', 'fortuner'));
Route::get('/hilux-2', fn () => redirect()->route('vehiculo.detalle', 'hilux'));
Route::get('/la-empresa', DynamicPage::class)->name('la-empresa');
Route::get('/catalogo', CatalogViewer::class)->name('catalogo');
Route::get('/catalogo-consur-s-a', fn () => redirect()->route('catalogo'));
Route::get('/posventa', DynamicPage::class)->name('posventa');
Route::get('/seguros', DynamicPage::class)->name('seguros');
Route::get('/consur-bike', DynamicPage::class)->name('consur-bike');
Route::get('/consurbike', function () { return redirect()->route('consur-bike'); });
Route::get('/trabaja-con-nosotros', TrabajaConNosotros::class)->name('trabaja-con-nosotros');
Route::get('/rrhh', fn () => redirect()->route('trabaja-con-nosotros'));
Route::get('/contacto', ContactPage::class)->name('contacto');
Route::get('/descubremas', DescubreMas::class)->name('descubremas');
Route::get('/descubre-mas', fn () => redirect()->route('descubremas'));
Route::get('/politica-de-privacidad', fn () => redirect(asset('docs/POLITICA-DE-PRIVACIDAD-CONSUR.pdf')))->name('politica-privacidad');
Route::get('/privacidad', fn () => redirect(asset('docs/POLITICA-DE-PRIVACIDAD-CONSUR.pdf')));
Route::get('/novedades', NewsIndex::class)->name('novedades');
Route::get('/category/novedades', fn () => redirect()->route('novedades'));
Route::get('/novedades/{slug}', NewsDetail::class)->name('novedades.show');
Route::get('/pagina/{slug}', DynamicPage::class)->name('page.show');

/*
|--------------------------------------------------------------------------
| Autenticación del Panel de Control
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas Administrativas del Backoffice (TALL Stack con RBAC)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // 1. Dashboard Principal
    Route::get('/', Dashboard::class)->name('dashboard');

    // 2. Módulo Comercial (Admin y Vendedor)
    Route::middleware(['role:admin,vendedor'])->group(function () {
        Route::get('/leads', LeadsManager::class)->name('leads');
    });

    // 3. Catálogo de Vehículos (Separación 0 Km y Usados)
    Route::middleware(['role:admin,gestor,vendedor'])->group(function () {
        Route::get('/vehiculos-0km', VehiclesManager::class)->name('vehicles.0km');
        Route::get('/vehiculos-usados', VehiclesManager::class)->name('vehicles.usados');
        Route::get('/vehiculos', function () {
            return redirect()->route(auth()->user()?->isVendedor() ? 'admin.vehicles.usados' : 'admin.vehicles.0km');
        })->name('vehicles');
    });

    // 4. Gestión de Contenidos y Portada (Admin y Gestor)
    Route::middleware(['role:admin,gestor'])->group(function () {
        Route::get('/catalogo', CatalogManager::class)->name('catalog');
        Route::get('/marcas-categorias', BrandsManager::class)->name('brands');
        Route::get('/novedades', PostsManager::class)->name('posts');
        Route::get('/paginas', PagesManager::class)->name('pages');
        Route::get('/menus', MenusManager::class)->name('menus');
        Route::get('/secciones-home', SectionsManager::class)->name('sections');
        Route::get('/footer', FooterManager::class)->name('footer');
        Route::get('/sliders', SlidersManager::class)->name('sliders');
        Route::get('/sucursales', BranchesManager::class)->name('branches');
        Route::get('/testimonios-podcast', TestimonialsManager::class)->name('testimonials');
    });

    // 5. Configuración Avanzada y Sistema (Solo Administrador)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/usuarios', UsersManager::class)->name('users');
        Route::get('/formularios', FormsManager::class)->name('forms');
        Route::get('/auditoria', AuditManager::class)->name('audit');
        Route::get('/configuracion', SettingsManager::class)->name('settings');
    });
});
