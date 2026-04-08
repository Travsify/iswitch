<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AncillaryBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ancillary_service_id',
        'amount',
        'currency',
        'status', // pending, confirmed, processed
        'payment_method', // wallet, gateway
        'payment_reference',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    /**
     * Get the user that made the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ancillary service being booked.
     */
    public function ancillaryService(): BelongsTo
    {
        return $this->belongsTo(AncillaryService::class);
    }
}
