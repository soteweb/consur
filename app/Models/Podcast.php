<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'episode_number',
        'title',
        'description',
        'guest_name',
        'spotify_url',
        'youtube_url',
        'cover_image',
        'duration',
        'published_date',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
