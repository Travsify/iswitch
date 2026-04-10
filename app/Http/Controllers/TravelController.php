<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Tour;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Unified search for Flights
     */
    public function searchFlights(Request $request)
    {
        $query = Flight::query();
        if ($request->has('q')) {
            $q = $request->q;
            $query->where('arrival_airport', 'like', "%$q%")
                  ->orWhere('departure_airport', 'like', "%$q%")
                  ->orWhere('airline', 'like', "%$q%");
        }
        return response()->json($query->limit(10)->get());
    }

    /**
     * Unified search for Hotels
     */
    public function searchHotels(Request $request)
    {
        $query = Hotel::query();
        if ($request->has('q')) {
            $q = $request->q;
            $query->where('location', 'like', "%$q%")
                  ->orWhere('name', 'like', "%$q%");
        }
        return response()->json($query->limit(10)->get());
    }

    /**
     * Search for Tours
     */
    public function searchTours(Request $request)
    {
        $query = Tour::query();
        if ($request->has('q')) {
            $q = $request->q;
            $query->where('location', 'like', "%$q%")
                  ->orWhere('name', 'like', "%$q%");
        }
        return response()->json($query->limit(10)->get());
    }

    /**
     * Check Visa requirements (Mock logic matching Chatbot)
     */
    public function checkVisa(Request $request)
    {
        $destination = strtolower($request->input('destination', ''));
        
        $visaData = [
            'uk' => ['status' => 'Visa Required', 'type' => 'Standard Visitor Visa', 'cost' => '$135'],
            'usa' => ['status' => 'Visa Required', 'type' => 'B1/B2 Tourist Visa', 'cost' => '$185'],
            'canada' => ['status' => 'Visa Required', 'type' => 'Temporary Resident Visa', 'cost' => '$100'],
            'dubai' => ['status' => 'Visa on Arrival', 'type' => '30-Day Tourist Visa', 'cost' => 'Free'],
            'kenya' => ['status' => 'E-Visa Available', 'type' => 'Single Entry e-Visa', 'cost' => '$51'],
        ];

        foreach ($visaData as $key => $data) {
            if (str_contains($destination, $key)) {
                return response()->json(['success' => true, 'destination' => ucfirst($key), 'data' => $data]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Destination info not found. Contact support for manual check.']);
    }

    /**
     * Get Insurance quotes
     */
    public function getInsurance(Request $request)
    {
        return response()->json([
            'success' => true,
            'plans' => [
                ['name' => 'Basic Travel Guard', 'price' => 25, 'coverage' => 50000],
                ['name' => 'Premium Shield', 'price' => 55, 'coverage' => 250000],
                ['name' => 'Platinum Cover', 'price' => 95, 'coverage' => 1000000],
            ]
        ]);
    }

    /**
     * Get Airport Transfers / Logistics
     */
    public function getTransfers(Request $request)
    {
        return response()->json([
            'success' => true,
            'options' => [
                ['type' => 'Private Sedan', 'price' => 30, 'capacity' => 3],
                ['type' => 'Luxury SUV', 'price' => 75, 'capacity' => 5],
                ['type' => 'Airport Shuttle', 'price' => 10, 'capacity' => 15],
            ]
        ]);
    }
}
