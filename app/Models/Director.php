<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Director extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'biography',
        'birth_date',
        'birth_place',
        'photo',
        'gender',
        'is_active'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_active' => 'boolean'
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'director_movie');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class, 'director_series');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($director) {
            $director->slug = Str::slug($director->name);
        });

        static::updating(function ($director) {
            $director->slug = Str::slug($director->name);
        });
    }
}
