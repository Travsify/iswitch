<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Hotel::create([
            'name' => 'The Ritz-Carlton, Paris',
            'location' => 'Paris, France',
            'description' => 'Experience the height of luxury in the heart of Paris.',
            'rating' => 5,
            'price_per_night' => 1200.00,
            'currency' => 'USD',
            'amenities' => json_encode(['Pool', 'Spa', 'Free WiFi', 'Gym', 'Restaurant']),
            'images' => json_encode(['https://images.unsplash.com/photo-1541975040043-3487effbc0bb']),
        ]);

        \App\Models\Hotel::create([
            'name' => 'Eko Hotel & Suites',
            'location' => 'Lagos, Nigeria',
            'description' => 'The most preferred hotel in West Africa.',
            'rating' => 5,
            'price_per_night' => 250.00,
            'currency' => 'USD',
            'amenities' => json_encode(['Conference Hall', 'Pool', 'Free Parking', 'Bar']),
            'images' => json_encode(['https://images.unsplash.com/photo-1566073771259-6a8506099945']),
        ]);
    }
}
