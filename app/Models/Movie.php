<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'price', 
        'cover_image', 'hosting_type', 'video_path',
        'external_id', 'streaming_url', 'trailer_url',
        'duration_minutes', 'release_date', 'is_published'
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function getVideoSourceAttribute()
    {
        return match($this->hosting_type) {
            'self' => asset("storage/{$this->video_path}"),
            'vimeo' => "https://player.vimeo.com/video/{$this->external_id}",
            'youtube' => "https://www.youtube.com/embed/{$this->external_id}",
            'aws' => $this->streaming_url,
            default => null
        };
    }
}
