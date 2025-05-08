<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster',
        'trailer_url',
        'release_year',
        'category_id',
        'genre_id',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'release_year' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(MovieCategory::class, 'category_id');
    }

    public function genre()
    {
        return $this->belongsTo(MovieGenre::class, 'genre_id');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
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
