<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Tour;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $hub;

    public function __construct(\App\Services\Travel\IntegrationHub $hub)
    {
        $this->hub = $hub;
    }

    /**
     * Unified Semantic Search
     * Now integrates with live global travel engines.
     */
    public function search(Request $request)
    {
        $query = strtolower($request->input('q', ''));
        
        $results = [
            'type' => 'bundled',
            'query' => $query,
            'flight' => null,
            'hotel' => null,
            'tour' => null,
            'visa_status' => 'Check Required',
            'readiness_score' => 70,
        ];

        // Fetch live flight data if query seems to be a destination
        $flights = $this->hub->searchFlights(['destination' => $query]);
        if (count($flights) > 0) {
            $results['flight'] = $flights[0]; // Take the top offer
        }

        // Fetch live hotel data
        $hotels = $this->hub->searchHotels($query);
        if (count($hotels) > 0) {
            $results['hotel'] = $hotels[0];
        }

        // Simple Keyword-based Visa logic
        if (str_contains($query, 'paris') || str_contains($query, 'france')) {
            $results['visa_status'] = 'Schengen Visa Required';
            $results['readiness_score'] = 85;
        } elseif (str_contains($query, 'kenya') || str_contains($query, 'safari')) {
            $results['visa_status'] = 'E-Visa Available';
            $results['readiness_score'] = 95; 
        }

        return response()->json($results);
    }
}
