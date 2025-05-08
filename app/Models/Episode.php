<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'video_url',
        'episode_number',
        'duration',
        'season_id',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'episode_number' => 'integer',
        'duration' => 'integer'
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
