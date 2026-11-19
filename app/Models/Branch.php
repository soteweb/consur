<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'address',
        'phone',
        'whatsapp',
        'email',
        'schedule_weekdays',
        'schedule_saturday',
        'google_maps_url',
        'image_url',
        'has_workshop',
        'has_mobile_workshop',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'has_workshop' => 'boolean',
        'has_mobile_workshop' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    /**
     * Devuelve siempre una URL válida para el <iframe src="..."> de Google Maps,
     * incluso si el usuario pega el código <iframe> completo o solo la dirección.
     */
    public function getEmbedMapUrlAttribute(): string
    {
        $raw = trim((string) $this->google_maps_url);

        if ($raw !== '') {
            if (preg_match('/src=["\']([^"\']+)["\']/i', $raw, $m)) {
                return $m[1];
            }
            if (str_contains($raw, 'google.com/maps/embed') || str_contains($raw, 'output=embed')) {
                return $raw;
            }
        }

        $query = urlencode(trim($this->name . ' ' . $this->address . ' ' . $this->city . ' Paraguay'));
        return "https://maps.google.com/maps?q={$query}&t=&z=16&ie=UTF8&iwloc=&output=embed";
    }
}
