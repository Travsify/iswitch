<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tour::create([
            'name' => 'Safari Adventure, Masai Mara',
            'location' => 'Kenya',
            'description' => 'A 5-day adventure through the heart of the wild.',
            'duration_days' => 5,
            'price' => 1500.00,
            'currency' => 'USD',
            'itinerary' => json_encode([
                ['day' => 1, 'activity' => 'Arrival and evening game drive'],
                ['day' => 2, 'activity' => 'Full day game drive'],
                ['day' => 3, 'activity' => 'Visit to Masai village'],
            ]),
            'images' => json_encode(['https://images.unsplash.com/photo-1516422217105-2aa37d72390e']),
        ]);
    }
}
