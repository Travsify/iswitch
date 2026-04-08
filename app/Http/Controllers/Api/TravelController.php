<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Travel\IntegrationHub;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    protected $hub;

    public function __construct(IntegrationHub $hub)
    {
        $this->hub = $hub;
    }

    /**
     * Live Flight Search
     */
    public function searchFlights(Request $request)
    {
        $results = $this->hub->searchFlights($request->all());
        return response()->json($results);
    }

    /**
     * Live Hotel Search
     */
    public function searchHotels(Request $request)
    {
        $results = $this->hub->searchHotels($request->input('city', 'PAR'));
        return response()->json($results);
    }

    /**
     * Visa Probability Check
     */
    public function checkVisa(Request $request)
    {
        $results = $this->hub->checkVisaEligibility(
            $request->input('passport'),
            $request->input('destination')
        );
        return response()->json($results);
    }
}
