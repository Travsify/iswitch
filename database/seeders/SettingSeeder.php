<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'flight_markup_percentage',
                'value' => '5',
                'group' => 'pricing',
                'description' => 'Markup percentage applied to all flight bookings.'
            ],
            [
                'key' => 'hotel_markup_percentage',
                'value' => '10',
                'group' => 'pricing',
                'description' => 'Markup percentage applied to all hotel bookings.'
            ],
            [
                'key' => 'tour_markup_percentage',
                'value' => '8',
                'group' => 'pricing',
                'description' => 'Markup percentage applied to all tour bookings.'
            ],
            [
                'key' => 'platform_name',
                'value' => 'iSwitch',
                'group' => 'general',
                'description' => 'Global platform name.'
            ],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
