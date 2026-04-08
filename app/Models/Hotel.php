<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Hotel extends Model
{
    protected $casts = [
        'amenities' => 'array',
        'images' => 'array',
    ];
}
