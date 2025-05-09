<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster',
        'trailer_url',
        'duration',
        'release_year',
        'category_id',
        'is_active'
    ];

    protected $casts = [
        'release_year' => 'integer',
        'duration' => 'integer',
        'is_active' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(MovieCategory::class);
    }

    public function genres()
    {
        return $this->belongsToMany(MovieGenre::class, 'movie_movie_genre');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, 'director_movie');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function isFavorite()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
}
