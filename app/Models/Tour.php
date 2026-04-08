<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Tour extends Model
{
    protected $casts = [
        'itinerary' => 'array',
        'images' => 'array',
    ];
}
