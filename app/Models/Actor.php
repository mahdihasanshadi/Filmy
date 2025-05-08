<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Actor extends Model
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
        return $this->belongsToMany(Movie::class);
    }

    public function series()
    {
        return $this->belongsToMany(Series::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($actor) {
            $actor->slug = Str::slug($actor->name);
        });

        static::updating(function ($actor) {
            $actor->slug = Str::slug($actor->name);
        });
    }
}
