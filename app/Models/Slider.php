<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'tag',
        'title',
        'description',
        'button_text',
        'button_url',
        'button_secondary_text',
        'button_secondary_url',
        'image_desktop',
        'image_mobile',
        'video_url',
        'content_position',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeGroup(Builder $query, string $group = 'home'): Builder
    {
        return $query->where('group', $group);
    }

    public function getHasVideoAttribute(): bool
    {
        return !empty($this->video_url);
    }

    public function getVideoSrcAttribute(): ?string
    {
        if (empty($this->video_url)) {
            return null;
        }

        if (str_starts_with($this->video_url, 'http://') || str_starts_with($this->video_url, 'https://')) {
            return $this->video_url;
        }

        $clean = ltrim($this->video_url, '/');
        if (str_starts_with($clean, 'storage/')) {
            return asset($clean);
        }

        if (file_exists(public_path($clean))) {
            return asset($clean);
        }

        return asset('storage/' . $clean);
    }

    public function getDesktopImageUrlAttribute(): string
    {
        if (empty($this->image_desktop)) {
            return '';
        }

        if (str_starts_with($this->image_desktop, 'http')) {
            return $this->image_desktop;
        }

        $clean = ltrim($this->image_desktop, '/');
        if (str_starts_with($clean, 'images/') || file_exists(public_path($clean))) {
            return asset($clean);
        }

        return asset('storage/' . $clean);
    }

    public function getMobileImageUrlAttribute(): string
    {
        if (!empty($this->image_mobile)) {
            if (str_starts_with($this->image_mobile, 'http')) {
                return $this->image_mobile;
            }

            $clean = ltrim($this->image_mobile, '/');
            if (str_starts_with($clean, 'images/') || file_exists(public_path($clean))) {
                return asset($clean);
            }

            return asset('storage/' . $clean);
        }

        return $this->desktop_image_url;
    }
}
