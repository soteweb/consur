<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
    ];

    protected static ?array $memoryCache = null;

    protected static function loadAll(): array
    {
        if (static::$memoryCache !== null) {
            return static::$memoryCache;
        }

        $cached = Cache::get('all_settings_map');
        if (is_array($cached)) {
            return static::$memoryCache = $cached;
        }

        $all = static::query()->pluck('value', 'key')->toArray();
        Cache::forever('all_settings_map', $all);
        return static::$memoryCache = $all;
    }

    public static function get(string $key, $default = null)
    {
        $all = static::loadAll();
        return array_key_exists($key, $all) && $all[$key] !== null ? $all[$key] : $default;
    }

    public static function set(string $key, $value, string $group = 'general', ?string $label = null): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'label' => $label ?? ucwords(str_replace('_', ' ', $key)),
            ]
        );
        static::$memoryCache = null;
        Cache::forget('all_settings_map');
        Cache::forget('setting_' . $key);
        return $setting;
    }
}
