<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'is_visible',
        'sort_order',
        'content',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'sort_order' => 'integer',
        'content' => 'array', // PostgreSQL JSONB
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($section) {
            static::$memorySections = null;
            Cache::forget('site_section_' . $section->key);
            Cache::forget('all_site_sections');
        });

        static::deleted(function ($section) {
            static::$memorySections = null;
            Cache::forget('site_section_' . $section->key);
            Cache::forget('all_site_sections');
        });
    }

    protected static mixed $memorySections = null;

    public static function getSection(string $key, array $defaults = [])
    {
        if (static::$memorySections === null) {
            static::$memorySections = static::orderBy('sort_order', 'asc')->get()->keyBy('key');
        }

        $section = static::$memorySections->get($key);
        if (!$section) {
            return (object) [
                'is_visible' => true,
                'content' => $defaults,
            ];
        }
        return $section;
    }

    public static function getAllSections()
    {
        return static::orderBy('sort_order', 'asc')->get()->keyBy('key');
    }
}
