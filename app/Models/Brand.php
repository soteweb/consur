<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'logo_url',
        'custom_url',
        'description',
        'banner_image',
        'is_active',
        'is_featured_menu',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured_menu' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($brand) {
            if (empty($brand->slug)) {
                $brand->slug = Str::slug($brand->name);
            }
        });
        static::saved(fn () => Cache::forget('featured_menu_brands'));
        static::deleted(fn () => Cache::forget('featured_menu_brands'));
    }

    protected static mixed $featuredCache = null;

    public static function getFeaturedForMenu()
    {
        if (static::$featuredCache !== null) {
            return static::$featuredCache;
        }

        return static::$featuredCache = static::where('is_active', true)
            ->where('is_featured_menu', true)
            ->orderBy('sort_order', 'asc')
            ->get();
    }

    public function getEffectiveUrlAttribute(): string
    {
        if (!empty($this->custom_url)) {
            return $this->custom_url;
        }
        return route('marca.show', $this->slug);
    }

    public function getLogoSrcAttribute(): ?string
    {
        if (empty($this->logo_url)) {
            return null;
        }
        if (str_starts_with($this->logo_url, 'http://') || str_starts_with($this->logo_url, 'https://')) {
            return $this->logo_url;
        }
        $cleanPath = ltrim($this->logo_url, '/');
        if (str_starts_with($cleanPath, 'images/')) {
            return asset($cleanPath);
        }
        if (str_starts_with($cleanPath, 'storage/')) {
            return asset($cleanPath);
        }
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }
        return asset('storage/' . $cleanPath);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
