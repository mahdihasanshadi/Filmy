<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_movie_genre');
    }

    public function series()
    {
        return $this->hasMany(Series::class, 'genre_id');
    }
}
