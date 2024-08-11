<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'destination',
        'price',
        'duration',
        'start_date',
        'end_date',
        'inclusions',
        'exclusions',
        'itinerary',
        'max_participants',
        'image_url',
        'is_featured',
    ];

    protected $casts = [
        'inclusions' => 'array',
        'exclusions' => 'array',
        'itinerary' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
    ];
}
