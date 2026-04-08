<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin exists
        $admin = User::where('email', 'admin@iswitch.app')->first();
        
        if (!$admin) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@iswitch.app',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}
