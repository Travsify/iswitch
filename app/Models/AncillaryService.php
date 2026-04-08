<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AncillaryService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'base_price',
        'currency',
        'type', // dummy_ticket, hotel_ticket, proof_of_funds, insurance, other
        'status', // active, inactive
    ];

    /**
     * Get the bookings for the ancillary service.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(AncillaryBooking::class);
    }
}
