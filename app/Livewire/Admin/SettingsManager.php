<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class SettingsManager extends Component
{
    // Identidad & Logos
    public string $site_logo_type = 'text'; // 'text' | 'image'
    public string $site_logo_url = '';
    public string $site_logo_dark_url = '';
    public string $site_logo_text_prefix = 'CONSUR';
    public string $site_logo_text_suffix = '.';
    public string $site_logo_badge = 'TOYOTA';
    public string $site_favicon_url = '';

    // Datos Generales
    public string $company_name = '';
    public string $contact_phone = '';
    public string $contact_whatsapp = '';
    public string $contact_email = '';
    public string $schedule_info = '';
    public string $turnos_url = '';
    public string $facebook_url = '';
    public string $instagram_url = '';
    public string $tiktok_url = '';
    public string $spotify_url = '';
    public string $youtube_url = '';
    public string $linkedin_url = '';

    public function mount()
    {
        $this->site_logo_type = Setting::get('site_logo_type', 'text');
        $this->site_logo_url = Setting::get('site_logo_url', 'https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb.png');
        $this->site_logo_dark_url = Setting::get('site_logo_dark_url', 'https://consur.com.py/wp-content/uploads/2019/07/logoconsurweb-white.png');
        $this->site_logo_text_prefix = Setting::get('site_logo_text_prefix', 'CONSUR');
        $this->site_logo_text_suffix = Setting::get('site_logo_text_suffix', '.');
        $this->site_logo_badge = Setting::get('site_logo_badge', 'TOYOTA');
        $this->site_favicon_url = Setting::get('site_favicon_url', '');

        $this->company_name = Setting::get('company_name', 'Consur S.A. – Concesionaria Oficial Toyota');
        $this->contact_phone = Setting::get('contact_phone', '+595 985 804 106');
        $this->contact_whatsapp = Setting::get('contact_whatsapp', '595985204106');
        $this->contact_email = Setting::get('contact_email', 'contacto@consur.com.py');
        $this->schedule_info = Setting::get('schedule_info', 'Lunes a Viernes: 7:00 a 12:00 • 14:00 a 17:00 | Sábados: 7:30 a 12:00');
        $this->turnos_url = Setting::get('turnos_url', 'http://www.turnos365.com/turnos.aspx?con=131');
        $this->facebook_url = Setting::get('facebook_url', 'https://www.facebook.com/ConsurToyota/');
        $this->instagram_url = Setting::get('instagram_url', 'https://www.instagram.com/consur_toyota/');
        $this->tiktok_url = Setting::get('tiktok_url', 'https://www.tiktok.com/@consurtoyota');
        $this->spotify_url = Setting::get('spotify_url', 'https://open.spotify.com/show/2c7HzcDvLF5XXMPbOckJn2');
        $this->youtube_url = Setting::get('youtube_url', 'https://www.youtube.com/@Consurtoyota');
        $this->linkedin_url = Setting::get('linkedin_url', '');
    }

    public function save()
    {
        Setting::set('site_logo_type', $this->site_logo_type, 'branding');
        Setting::set('site_logo_url', $this->site_logo_url, 'branding');
        Setting::set('site_logo_dark_url', $this->site_logo_dark_url, 'branding');
        Setting::set('site_logo_text_prefix', $this->site_logo_text_prefix, 'branding');
        Setting::set('site_logo_text_suffix', $this->site_logo_text_suffix, 'branding');
        Setting::set('site_logo_badge', $this->site_logo_badge, 'branding');
        Setting::set('site_favicon_url', $this->site_favicon_url, 'branding');

        Setting::set('company_name', $this->company_name, 'general');
        Setting::set('contact_phone', $this->contact_phone, 'contact');
        Setting::set('contact_whatsapp', $this->contact_whatsapp, 'contact');
        Setting::set('contact_email', $this->contact_email, 'contact');
        Setting::set('schedule_info', $this->schedule_info, 'general');
        Setting::set('turnos_url', $this->turnos_url, 'general');
        Setting::set('facebook_url', $this->facebook_url, 'social');
        Setting::set('instagram_url', $this->instagram_url, 'social');
        Setting::set('tiktok_url', $this->tiktok_url, 'social');
        Setting::set('spotify_url', $this->spotify_url, 'social');
        Setting::set('youtube_url', $this->youtube_url, 'social');
        Setting::set('linkedin_url', $this->linkedin_url, 'social');

        ActivityLog::log('update_settings', 'Actualizó las configuraciones e identidad de marca.');

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => '¡Configuraciones e identidad actualizadas con éxito!',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.settings-manager');
    }
}
