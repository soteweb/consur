<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'location',
        'title',
        'url',
        'route_name',
        'target',
        'icon',
        'badge_text',
        'badge_color',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            Cache::forget('header_menu_items');
            Cache::forget('footer_menu_items_footer_col_1');
            Cache::forget('footer_menu_items_footer_col_2');
        });

        static::deleted(function () {
            Cache::forget('header_menu_items');
            Cache::forget('footer_menu_items_footer_col_1');
            Cache::forget('footer_menu_items_footer_col_2');
        });
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('sort_order', 'asc');
    }

    public function activeChildren(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->where('is_active', true)->orderBy('sort_order', 'asc');
    }

    protected static mixed $headerCache = null;

    public static function getHeaderMenu()
    {
        if (static::$headerCache !== null) {
            return static::$headerCache;
        }

        return static::$headerCache = static::where('location', 'header')
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->with('activeChildren')
            ->orderBy('sort_order', 'asc')
            ->get();
    }

    public static function getFooterMenu(string $location = 'footer_col_1')
    {
        return static::where('location', $location)
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();
    }
}
