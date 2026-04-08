<?php

namespace Database\Seeders;

use App\Models\AncillaryService;
use Illuminate\Database\Seeder;

class AncillaryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Dummy Flight Booking',
                'description' => 'A confirmed flight reservation for visa purposes without ticket issuance.',
                'type' => 'dummy_ticket',
                'base_price' => 15.00,
                'currency' => 'USD',
                'status' => 'active',
            ],
            [
                'name' => 'Dummy Hotel Booking',
                'description' => 'A verifiable hotel reservation for visa application proof of accommodation.',
                'type' => 'hotel_booking',
                'base_price' => 10.00,
                'currency' => 'USD',
                'status' => 'active',
            ],
            [
                'name' => 'Travel Insurance',
                'description' => 'Comprehensive travel medical insurance required for Schengen and other visas.',
                'type' => 'insurance',
                'base_price' => 25.00,
                'currency' => 'USD',
                'status' => 'active',
            ],
            [
                'name' => 'Proof of Funds Service',
                'description' => 'Verified financial statement assistance for visa sponsorship requirements.',
                'type' => 'proof_of_funds',
                'base_price' => 50.00,
                'currency' => 'USD',
                'status' => 'active',
            ],
            [
                'name' => 'Car Transfer (Premium)',
                'description' => 'Private chauffeur-driven car transfer for seamless airport or inter-city travel.',
                'type' => 'car_transfer',
                'base_price' => 45.00,
                'currency' => 'USD',
                'status' => 'active',
            ],
            [
                'name' => 'Airport Pickup (Standard)',
                'description' => 'Professional airport pickup service with a comfortable sedan.',
                'type' => 'pickup',
                'base_price' => 20.00,
                'currency' => 'USD',
                'status' => 'active',
            ],
            [
                'name' => 'Airport Pickup (VIP)',
                'description' => 'Luxury airport pickup service with a premium SUV and meet-and-greet.',
                'type' => 'pickup',
                'base_price' => 60.00,
                'currency' => 'USD',
                'status' => 'active',
            ],
        ];

        foreach ($services as $service) {
            AncillaryService::updateOrCreate(['name' => $service['name']], $service);
        }
    }
}
