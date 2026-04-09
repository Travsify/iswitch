<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_approved',
        'kyb_status',
        'api_key',
        'balance',
        'webhook_url',
        'otp',
    ];

    /**
     * Check if the user is an agent.
     */
    public function isAgent(): bool
    {
        return $this->role === 'agent';
    }

    /**
     * Check if the user is a customer.
     */
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }

    /**
     * Check if the user is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->isAdmin();
        }
        if ($panel->getId() === 'agent') {
            return $this->isAgent();
        }
        if ($panel->getId() === 'user') {
            return $this->isCustomer();
        }
        
        return false;
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_key',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_approved' => 'boolean',
            'balance' => 'decimal:2',
        ];
    }

    /**
     * Get the visa documents for the user.
     */
    public function visaDocuments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(VisaDocument::class);
    }

    /**
     * Get the wallets for the user.
     */
    public function wallets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Wallet::class);
    }

    /**
     * Get the transactions for the user.
     */
    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get the business profile for the user.
     */
    public function businessProfile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(BusinessProfile::class);
    }
}
