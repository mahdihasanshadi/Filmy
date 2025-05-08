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
        'genre_id',
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

    public function genre()
    {
        return $this->belongsTo(MovieGenre::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
