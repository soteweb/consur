<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\Brand;
use App\Models\VehicleCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class BrandsManager extends BaseCrudComponent
{
    use WithFileUploads;

    public string $activeTab = 'brands'; // 'brands' | 'categories'

    // Form Brand
    public string $brandName = '';
    public string $brandTagline = '';
    public string $brandLogo = '';
    public $newLogo = null;
    public string $brandBanner = '';
    public $newBanner = null;
    public string $brandCustomUrl = '';
    public string $brandDescription = '';
    public bool $brandIsFeaturedMenu = false;
    public int $brandSortOrder = 0;
    public bool $brandActive = true;

    // Form Category
    public string $categoryName = '';
    public string $categoryIcon = '';
    public string $categoryDescription = '';
    public bool $categoryActive = true;

    protected function resetInputFields(): void
    {
        $this->brandName = '';
        $this->brandTagline = '';
        $this->brandLogo = '';
        $this->newLogo = null;
        $this->brandBanner = '';
        $this->newBanner = null;
        $this->brandCustomUrl = '';
        $this->brandDescription = '';
        $this->brandIsFeaturedMenu = false;
        $this->brandSortOrder = 0;
        $this->brandActive = true;

        $this->categoryName = '';
        $this->categoryIcon = '';
        $this->categoryDescription = '';
        $this->categoryActive = true;
        $this->selectedId = null;
    }

    public function saveBrand()
    {
        $this->validate([
            'brandName' => 'required|min:2|max:70',
            'brandTagline' => 'nullable|string|max:150',
            'brandCustomUrl' => 'nullable|string|max:255',
            'brandDescription' => 'nullable|string|max:2000',
            'newLogo' => 'nullable|image|max:3072',
            'newBanner' => 'nullable|image|max:5120',
        ]);

        $logoUrl = $this->brandLogo;
        if ($this->newLogo) {
            $path = $this->newLogo->store('marcas', 'public');
            $logoUrl = asset('storage/' . $path);
        }

        $bannerUrl = $this->brandBanner;
        if ($this->newBanner) {
            $path = $this->newBanner->store('marcas/banners', 'public');
            $bannerUrl = asset('storage/' . $path);
        }

        $data = [
            'name' => $this->brandName,
            'tagline' => $this->brandTagline ?: null,
            'logo_url' => $logoUrl ?: null,
            'banner_image' => $bannerUrl ?: null,
            'custom_url' => $this->brandCustomUrl ?: null,
            'description' => $this->brandDescription ?: null,
            'is_featured_menu' => (bool) $this->brandIsFeaturedMenu,
            'sort_order' => (int) $this->brandSortOrder,
            'is_active' => (bool) $this->brandActive,
        ];

        if ($this->selectedId) {
            $brand = Brand::findOrFail($this->selectedId);
            $brand->update($data);
            $msg = "Marca '{$brand->name}' actualizada correctamente.";
        } else {
            $data['slug'] = Str::slug($this->brandName);
            $brand = Brand::create($data);
            $msg = "Marca '{$brand->name}' agregada con éxito.";
        }

        ActivityLog::log('brand_management', "Gestión de marca: {$brand->name}", $brand);
        $this->closeModal();
        $this->notify($msg);
    }

    public function saveCategory()
    {
        $this->validate([
            'categoryName' => 'required|min:2|max:50',
        ]);

        if ($this->selectedId) {
            $cat = VehicleCategory::findOrFail($this->selectedId);
            $cat->update([
                'name' => $this->categoryName,
                'icon' => $this->categoryIcon,
                'description' => $this->categoryDescription,
                'is_active' => $this->categoryActive,
            ]);
            $msg = 'Categoría actualizada.';
        } else {
            $cat = VehicleCategory::create([
                'name' => $this->categoryName,
                'icon' => $this->categoryIcon,
                'description' => $this->categoryDescription,
                'is_active' => $this->categoryActive,
            ]);
            $msg = 'Categoría agregada.';
        }

        ActivityLog::log('category_management', "Gestión de categoría: {$cat->name}", $cat);
        $this->closeModal();
        $this->notify($msg);
    }

    public function editBrand(int $id)
    {
        $this->resetInputFields();
        $brand = Brand::findOrFail($id);
        $this->selectedId = $brand->id;
        $this->brandName = $brand->name;
        $this->brandTagline = $brand->tagline ?? '';
        $this->brandLogo = $brand->logo_url ?? '';
        $this->brandBanner = $brand->banner_image ?? '';
        $this->brandCustomUrl = $brand->custom_url ?? '';
        $this->brandDescription = $brand->description ?? '';
        $this->brandIsFeaturedMenu = (bool) $brand->is_featured_menu;
        $this->brandSortOrder = (int) $brand->sort_order;
        $this->brandActive = (bool) $brand->is_active;

        $this->activeTab = 'brands';
        $this->isOpen = true;
    }

    public function editCategory(int $id)
    {
        $this->resetInputFields();
        $cat = VehicleCategory::findOrFail($id);
        $this->selectedId = $cat->id;
        $this->categoryName = $cat->name;
        $this->categoryIcon = $cat->icon ?? '';
        $this->categoryDescription = $cat->description ?? '';
        $this->categoryActive = (bool) $cat->is_active;
        $this->activeTab = 'categories';
        $this->isOpen = true;
    }

    public function toggleBrandActive(int $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->is_active = !$brand->is_active;
        $brand->save();

        $status = $brand->is_active ? 'activada' : 'desactivada';
        $this->notify("La marca '{$brand->name}' ha sido {$status}.", 'info');
    }

    public function toggleFeaturedMenu(int $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->is_featured_menu = !$brand->is_featured_menu;
        $brand->save();

        $status = $brand->is_featured_menu ? 'ahora se muestra' : 'ya no se muestra';
        $this->notify("La marca '{$brand->name}' {$status} en el Mega Menú.", 'info');
    }

    public function deleteBrand(int $id)
    {
        $brand = Brand::withCount('vehicles')->findOrFail($id);
        if ($brand->vehicles_count > 0) {
            $this->notify("No se puede eliminar '{$brand->name}' porque tiene vehículos asociados.", 'danger');
            return;
        }
        $brand->delete();
        $this->notify("Marca eliminada.", 'warning');
    }

    public function deleteCategory(int $id)
    {
        $cat = VehicleCategory::withCount('vehicles')->findOrFail($id);
        if ($cat->vehicles_count > 0) {
            $this->notify("No se puede eliminar '{$cat->name}' porque tiene vehículos asociados.", 'danger');
            return;
        }
        $cat->delete();
        $this->notify("Categoría eliminada.", 'warning');
    }

    public function render()
    {
        $brands = Brand::withCount('vehicles')->orderBy('sort_order', 'asc')->get();
        $categories = VehicleCategory::withCount('vehicles')->orderBy('sort_order', 'asc')->get();

        return view('livewire.admin.brands-manager', compact('brands', 'categories'));
    }
}
