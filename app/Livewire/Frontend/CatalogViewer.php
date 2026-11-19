<?php

namespace App\Livewire\Frontend;

use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class CatalogViewer extends Component
{
    public string $pdfUrl;
    public string $title;
    public string $edition;
    public string $subtitle;
    public string $updatedAt;

    public function mount(): void
    {
        $rawUrl = Setting::get('catalog_pdf_url', '/catalogos/CATALOGO_CONSUR_TOYOTA_WEB_02.pdf');
        $this->pdfUrl = str_starts_with($rawUrl, 'http') ? $rawUrl : asset(ltrim($rawUrl, '/'));
        $this->title = Setting::get('catalog_title', 'Catálogo Digital Consur S.A.');
        $this->edition = Setting::get('catalog_edition', 'Edición Oficial Vigente');
        $this->subtitle = Setting::get(
            'catalog_subtitle',
            'Explorá nuestra revista interactiva con toda la gama de vehículos, fichas técnicas y beneficios exclusivos.'
        );
        $this->updatedAt = Setting::get('catalog_updated_at', now()->translatedFormat('F Y'));
    }

    public function render()
    {
        return view('livewire.frontend.catalog-viewer')
            ->layoutData([
                'title' => $this->title . ' | Consur S.A.',
                'description' => $this->subtitle,
            ]);
    }
}

