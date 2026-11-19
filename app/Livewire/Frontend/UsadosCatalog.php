<?php

namespace App\Livewire\Frontend;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class UsadosCatalog extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    #[Url(history: true)]
    public array $selectedBrands = [];

    #[Url(history: true)]
    public array $selectedCategories = [];

    #[Url(history: true)]
    public array $selectedFuels = [];

    #[Url(history: true)]
    public ?string $selectedTransmission = null;

    #[Url(history: true)]
    public ?int $selectedBranch = null;

    #[Url(history: true)]
    public ?int $minPrice = null;

    #[Url(history: true)]
    public ?int $maxPrice = null;

    #[Url(history: true)]
    public bool $onlyCertified = false;

    #[Url(history: true)]
    public string $sortBy = 'newest';

    public string $viewMode = 'grid'; // 'grid' | 'list'

    public function updatingSearch() { $this->resetPage(); }
    public function updatingSelectedBrands() { $this->resetPage(); }
    public function updatingSelectedCategories() { $this->resetPage(); }
    public function updatingSelectedFuels() { $this->resetPage(); }
    public function updatingSelectedTransmission() { $this->resetPage(); }
    public function updatingSelectedBranch() { $this->resetPage(); }
    public function updatingMinPrice() { $this->resetPage(); }
    public function updatingMaxPrice() { $this->resetPage(); }
    public function updatingOnlyCertified() { $this->resetPage(); }
    public function updatingSortBy() { $this->resetPage(); }

    public function clearFilters()
    {
        $this->reset([
            'search',
            'selectedBrands',
            'selectedCategories',
            'selectedFuels',
            'selectedTransmission',
            'selectedBranch',
            'minPrice',
            'maxPrice',
            'onlyCertified',
            'sortBy',
        ]);
        $this->resetPage();
    }

    public function render()
    {
        $brands = Brand::where('is_active', true)
            ->whereHas('vehicles', fn($q) => $q->available()->usedVehicles())
            ->withCount(['vehicles' => fn($q) => $q->available()->usedVehicles()])
            ->orderBy('name')
            ->get();

        $categories = VehicleCategory::where('is_active', true)
            ->whereHas('vehicles', fn($q) => $q->available()->usedVehicles())
            ->withCount(['vehicles' => fn($q) => $q->available()->usedVehicles()])
            ->orderBy('name')
            ->get();

        $branches = Branch::where('is_active', true)
            ->whereHas('vehicles', fn($q) => $q->available()->usedVehicles())
            ->orderBy('city')
            ->get();

        $availableFuels = Vehicle::available()
            ->usedVehicles()
            ->whereNotNull('fuel_type')
            ->where('fuel_type', '!=', '')
            ->distinct()
            ->pluck('fuel_type')
            ->filter()
            ->sort()
            ->values();

        $query = Vehicle::with(['brand', 'category', 'branch', 'images'])
            ->available()
            ->usedVehicles();

        // Filtro de búsqueda
        if (!empty(trim($this->search))) {
            $searchTerm = '%' . trim($this->search) . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('model', 'LIKE', $searchTerm)
                  ->orWhere('version', 'LIKE', $searchTerm)
                  ->orWhere('description', 'LIKE', $searchTerm)
                  ->orWhereHas('brand', function ($b) use ($searchTerm) {
                      $b->where('name', 'LIKE', $searchTerm);
                  });
            });
        }

        // Filtro por marcas seleccionadas
        if (!empty($this->selectedBrands)) {
            $query->whereIn('brand_id', $this->selectedBrands);
        }

        // Filtro por categorías seleccionadas
        if (!empty($this->selectedCategories)) {
            $query->whereIn('vehicle_category_id', $this->selectedCategories);
        }

        // Filtro por combustible
        if (!empty($this->selectedFuels)) {
            $query->whereIn('fuel_type', $this->selectedFuels);
        }

        // Filtro por transmisión
        if (!empty($this->selectedTransmission)) {
            $query->where('transmission', 'LIKE', '%' . $this->selectedTransmission . '%');
        }

        // Filtro por sucursal
        if (!empty($this->selectedBranch)) {
            $query->where('branch_id', $this->selectedBranch);
        }

        // Filtro por precio
        if ($this->minPrice) {
            $query->where('price_usd', '>=', $this->minPrice);
        }
        if ($this->maxPrice) {
            $query->where('price_usd', '<=', $this->maxPrice);
        }

        // Ordenamiento
        match($this->sortBy) {
            'price_asc' => $query->orderBy('price_usd', 'asc'),
            'price_desc' => $query->orderBy('price_usd', 'desc'),
            'year_desc' => $query->orderBy('year', 'desc'),
            'mileage_asc' => $query->orderBy('mileage_km', 'asc'),
            default => $query->orderBy('sort_order', 'asc')->latest(),
        };

        $vehicles = $query->paginate(12);

        return view('livewire.frontend.usados-catalog', compact('vehicles', 'brands', 'categories', 'branches', 'availableFuels'));
    }
}
