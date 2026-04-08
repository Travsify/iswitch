<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Flight::create([
            'flight_number' => 'IS101',
            'airline' => 'iswitch Air',
            'departure_airport' => 'LOS',
            'arrival_airport' => 'ABV',
            'departure_time' => now()->addDays(1)->setHour(8)->setMinute(0),
            'arrival_time' => now()->addDays(1)->setHour(9)->setMinute(15),
            'price' => 45000.00,
            'currency' => 'NGN',
            'available_seats' => 42,
        ]);

        \App\Models\Flight::create([
            'flight_number' => 'IS202',
            'airline' => 'iswitch Air',
            'departure_airport' => 'LHR',
            'arrival_airport' => 'DXB',
            'departure_time' => now()->addDays(2)->setHour(22)->setMinute(30),
            'arrival_time' => now()->addDays(3)->setHour(9)->setMinute(45),
            'price' => 850.00,
            'currency' => 'USD',
            'available_seats' => 15,
        ]);
    }
}
