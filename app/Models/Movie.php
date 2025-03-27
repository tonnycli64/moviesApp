<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes; // Add this line

    protected $fillable = [
        'title', 'slug', 'description', 'price', 
        'cover_image', 'hosting_type', 'video_path',
        'external_id', 'streaming_url', 'trailer_url',
        'duration_minutes', 'release_date', 'is_published'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }


    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
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
