<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class FooterManager extends Component
{
    // Columna 1: Horarios y Redes Sociales
    public string $schedule_info = '';
    public bool $footer_show_facebook = true;
    public string $facebook_url = '';
    public bool $footer_show_instagram = true;
    public string $instagram_url = '';
    public bool $footer_show_tiktok = true;
    public string $tiktok_url = '';
    public bool $footer_show_spotify = true;
    public string $spotify_url = '';
    public bool $footer_show_linkedin = false;
    public string $linkedin_url = '';
    public bool $footer_show_youtube = true;
    public string $youtube_url = '';

    // Columna 2: Explorá CONSUR (Accesos Rápidos)
    public string $footer_col2_title = 'Explorá CONSUR';

    // Columna 3: NOSOTROS
    public string $footer_col3_title = 'NOSOTROS';

    // Barra Inferior: Copyright
    public string $footer_copyright = '';

    // Gestión de pestañas y enlaces de columnas (Columna 2 y Columna 3)
    public string $activeColumnTab = 'col1'; // 'col1' | 'col2' | 'col3' | 'copyright'
    public ?int $editingLinkId = null;
    public string $newLinkTitle = '';
    public string $newLinkUrl = '';
    public string $newLinkTarget = '_self';
    public int $newLinkOrder = 1;

    public function mount()
    {
        $this->loadSettings();
    }

    public function loadSettings()
    {
        $this->schedule_info = Setting::get('schedule_info', 'Lunes a Viernes: 7:00 a 12:00 • 14:00 a 17:00 | Sábados: 7:30 a 12:00');
        $this->footer_show_facebook = (bool) Setting::get('footer_show_facebook', 1);
        $this->facebook_url = Setting::get('facebook_url', 'https://www.facebook.com/ConsurToyota/');
        $this->footer_show_instagram = (bool) Setting::get('footer_show_instagram', 1);
        $this->instagram_url = Setting::get('instagram_url', 'https://www.instagram.com/consur_toyota/');
        $this->footer_show_tiktok = (bool) Setting::get('footer_show_tiktok', 1);
        $this->tiktok_url = Setting::get('tiktok_url', 'https://www.tiktok.com/@consurtoyota');
        $this->footer_show_spotify = (bool) Setting::get('footer_show_spotify', 1);
        $this->spotify_url = Setting::get('spotify_url', 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2');
        $this->footer_show_linkedin = (bool) Setting::get('footer_show_linkedin', 0);
        $this->linkedin_url = Setting::get('linkedin_url', 'https://www.linkedin.com/company/consur-toyota');
        $this->footer_show_youtube = (bool) Setting::get('footer_show_youtube', 1);
        $this->youtube_url = Setting::get('youtube_url', 'https://www.youtube.com/@Consurtoyota');

        $this->footer_col2_title = Setting::get('footer_col2_title', 'Explorá CONSUR');
        $this->footer_col3_title = Setting::get('footer_col3_title', 'NOSOTROS');

        $this->footer_copyright = Setting::get('footer_copyright', '© {year} CONSUR S.A. Todos los derechos reservados. Concesionaria Oficial Toyota Paraguay.');
    }

    public function saveSettings()
    {
        Setting::set('schedule_info', $this->schedule_info, 'general');
        Setting::set('footer_show_facebook', $this->footer_show_facebook ? '1' : '0', 'footer');
        Setting::set('facebook_url', $this->facebook_url, 'social');
        Setting::set('footer_show_instagram', $this->footer_show_instagram ? '1' : '0', 'footer');
        Setting::set('instagram_url', $this->instagram_url, 'social');
        Setting::set('footer_show_tiktok', $this->footer_show_tiktok ? '1' : '0', 'footer');
        Setting::set('tiktok_url', $this->tiktok_url, 'social');
        Setting::set('footer_show_spotify', $this->footer_show_spotify ? '1' : '0', 'footer');
        Setting::set('spotify_url', $this->spotify_url, 'social');
        Setting::set('footer_show_linkedin', $this->footer_show_linkedin ? '1' : '0', 'footer');
        Setting::set('linkedin_url', $this->linkedin_url, 'social');
        Setting::set('footer_show_youtube', $this->footer_show_youtube ? '1' : '0', 'footer');
        Setting::set('youtube_url', $this->youtube_url, 'social');

        Setting::set('footer_col2_title', $this->footer_col2_title, 'footer');
        Setting::set('footer_col3_title', $this->footer_col3_title, 'footer');
        Setting::set('footer_copyright', $this->footer_copyright, 'footer');

        ActivityLog::log('update_footer', 'Actualizó las opciones, horarios y redes del Footer corporativo.');

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => '¡Configuración del pie de página guardada y sincronizada con la web!',
        ]);
    }

    public function addLink()
    {
        $this->validate([
            'newLinkTitle' => 'required|min:2|max:100',
            'newLinkUrl' => 'required|min:1|max:255',
        ]);

        $targetLocation = ($this->activeColumnTab === 'col2') ? 'footer_col_2' : 'footer_col_3';
        $colLabel = ($this->activeColumnTab === 'col2') ? 'Columna 2' : 'Columna 3';

        if ($this->editingLinkId) {
            $link = MenuItem::findOrFail($this->editingLinkId);
            $link->update([
                'title' => $this->newLinkTitle,
                'url' => $this->newLinkUrl,
                'target' => $this->newLinkTarget,
                'sort_order' => $this->newLinkOrder,
            ]);
            $msg = "Enlace de la {$colLabel} actualizado.";
        } else {
            MenuItem::create([
                'location' => $targetLocation,
                'title' => $this->newLinkTitle,
                'url' => $this->newLinkUrl,
                'target' => $this->newLinkTarget,
                'sort_order' => (int) MenuItem::where('location', $targetLocation)->max('sort_order') + 1,
                'is_active' => true,
            ]);
            $msg = "Enlace agregado a la {$colLabel}.";
        }

        $this->resetLinkForm();
        $this->dispatch('notify', ['type' => 'success', 'message' => $msg]);
    }

    public function editLink(int $id)
    {
        $link = MenuItem::findOrFail($id);
        $this->editingLinkId = $link->id;
        $this->newLinkTitle = $link->title;
        $this->newLinkUrl = $link->url;
        $this->newLinkTarget = $link->target;
        $this->newLinkOrder = $link->sort_order;
    }

    public function resetLinkForm()
    {
        $this->editingLinkId = null;
        $this->newLinkTitle = '';
        $this->newLinkUrl = '';
        $this->newLinkTarget = '_self';
        $this->newLinkOrder = 1;
    }

    public function deleteLink(int $id)
    {
        MenuItem::findOrFail($id)->delete();
        $this->dispatch('notify', ['type' => 'warning', 'message' => 'Enlace eliminado correctamente.']);
    }

    public function toggleLinkActive(int $id)
    {
        $item = MenuItem::findOrFail($id);
        $item->update(['is_active' => !$item->is_active]);
        $this->dispatch('notify', ['type' => 'info', 'message' => 'Visibilidad del enlace actualizada.']);
    }

    public function render()
    {
        $col2Links = MenuItem::where('location', 'footer_col_2')
            ->orderBy('sort_order', 'asc')
            ->get();

        $col3Links = MenuItem::where('location', 'footer_col_3')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('livewire.admin.footer-manager', compact('col2Links', 'col3Links'));
    }
}
