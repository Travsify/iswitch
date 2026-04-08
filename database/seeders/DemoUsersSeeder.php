<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DemoUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create a Customer User
        $customer = User::firstOrCreate(
            ['email' => 'customer@iswitch.app'],
            [
                'name' => 'Demo Customer',
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'email_verified_at' => Carbon::now(),
            ]
        );

        // Populate Wallets for Customer
        $this->seedWallets($customer, 12450.50, 400.00, 1500.25, 2500000.00);

        // 2. Create an Agent User
        $agent = User::firstOrCreate(
            ['email' => 'agent@iswitch.app'],
            [
                'name' => 'B2B Demo Agent',
                'password' => Hash::make('password123'),
                'role' => 'agent',
                'email_verified_at' => Carbon::now(),
            ]
        );

        // Populate Wallets for Agent
        $this->seedWallets($agent, 5400.00, 0, 0, 1850000.00);
    }

    private function seedWallets(User $user, $usd, $gbp, $eur, $ngn)
    {
        Wallet::updateOrCreate(['user_id' => $user->id, 'currency' => 'USD'], ['balance' => $usd, 'status' => 'active']);
        Wallet::updateOrCreate(['user_id' => $user->id, 'currency' => 'GBP'], ['balance' => $gbp, 'status' => 'active']);
        Wallet::updateOrCreate(['user_id' => $user->id, 'currency' => 'EUR'], ['balance' => $eur, 'status' => 'active']);
        Wallet::updateOrCreate(['user_id' => $user->id, 'currency' => 'NGN'], ['balance' => $ngn, 'status' => 'active']);
    }
}
