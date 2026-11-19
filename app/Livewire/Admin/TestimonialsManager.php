<?php

namespace App\Livewire\Admin;

use App\Livewire\BaseCrudComponent;
use App\Models\ActivityLog;
use App\Models\SiteSection;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class TestimonialsManager extends BaseCrudComponent
{
    public string $podcast_badge = '';
    public string $podcast_title = '';
    public string $podcast_desc = '';
    public string $spotify_show_url = '';
    public bool $is_visible = true;

    public function mount()
    {
        $sec = SiteSection::getSection('podcast_section');
        $content = $sec->content ?? [];
        $this->podcast_badge = $content['podcast_badge'] ?? 'Conecta con Consur • Podcast Oficial';
        $this->podcast_title = $content['podcast_title'] ?? 'Último Episodio en Spotify';
        $this->podcast_desc = $content['podcast_desc'] ?? 'Escuchá o mirá automáticamente nuestro episodio más reciente sobre novedades automotrices, tecnología Toyota y consejos de posventa, o visitá nuestro canal oficial con todos los capítulos.';
        $this->spotify_show_url = $content['spotify_show_url'] ?? 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2?si=50dea64677714274';
        $this->is_visible = (bool) $sec->is_visible;
    }

    protected function resetInputFields(): void
    {
        // No modal needed
    }

    public function saveChannelConfig()
    {
        $this->validate([
            'podcast_title' => 'required|min:3|max:150',
            'spotify_show_url' => 'required|url',
        ]);

        $sec = SiteSection::getSection('podcast_section');
        $content = $sec->content ?? [];
        $content['podcast_badge'] = $this->podcast_badge;
        $content['podcast_title'] = $this->podcast_title;
        $content['podcast_desc'] = $this->podcast_desc;
        $content['spotify_show_url'] = $this->spotify_show_url;

        $sec->update([
            'name' => 'Podcast Oficial en Spotify',
            'content' => $content,
            'is_visible' => $this->is_visible,
        ]);

        ActivityLog::log('podcast_manage', "Actualizó configuración del canal de Podcast en Spotify", $sec);
        $this->notify('Configuración del Podcast en Spotify actualizada correctamente.');
    }

    public function render()
    {
        $spotifyShowId = '2c7HzcDvLF5XXMPbOckJn2';
        if (preg_match('/show\/([a-zA-Z0-9]+)/', $this->spotify_show_url, $m)) {
            $spotifyShowId = $m[1];
        }
        $spotifyEmbedUrl = "https://open.spotify.com/embed/show/{$spotifyShowId}/video?utm_source=generator";

        return view('livewire.admin.testimonials-manager', compact('spotifyEmbedUrl'));
    }
}
