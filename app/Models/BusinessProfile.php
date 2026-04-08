<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    protected $fillable = [
        'user_id',
        'company_registration_name',
        'business_name',
        'registration_document_path',
        'utility_bill_path',
        'passport_photo_path',
        'government_id_path',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
