<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Tour;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Unified Semantic Search Mock
     * In a real app, this would use an LLM or vector search.
     * For Greenville, it intelligently bundles our services.
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

        // Simple Keyword-based "Semantic" logic
        if (str_contains($query, 'paris')) {
            $results['flight'] = Flight::where('arrival_airport', 'like', '%CDG%')->first();
            $results['hotel'] = Hotel::where('location', 'like', '%Paris%')->first();
            $results['visa_status'] = 'E-Visa Eligible';
            $results['readiness_score'] = 90;
        } elseif (str_contains($query, 'kenya') || str_contains($query, 'safari')) {
            $results['tour'] = Tour::where('location', 'like', '%Kenya%')->first();
            $results['visa_status'] = 'Visa on Arrival';
            $results['readiness_score'] = 50; 
        } else {
            // Default: just return some general list
            return response()->json([
                'type' => 'list',
                'flights' => Flight::limit(2)->get(),
                'hotels' => Hotel::limit(2)->get(),
            ]);
        }

        return response()->json($results);
    }
}
