<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster',
        'season_number',
        'release_year',
        'series_id',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'season_number' => 'integer',
        'release_year' => 'integer'
    ];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
