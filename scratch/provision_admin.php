<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Create Admin
User::updateOrCreate(
    ['email' => 'admin@iswitch.com'],
    [
        'name' => 'Super Admin',
        'password' => Hash::make('GodMode2026!'),
        'role' => 'admin',
        'is_approved' => true
    ]
);

// Create Pending Agent for Testing
User::updateOrCreate(
    ['email' => 'agency@test.com'],
    [
        'name' => 'Global Travel Agency',
        'password' => Hash::make('password123'),
        'role' => 'agent',
        'is_approved' => false,
        'kyb_status' => 'pending'
    ]
);

echo "Admin and Test Agent provisioned successfully.\n";
