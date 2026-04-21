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

    /**
     * Live Insurance Quote
     */
    public function getInsurance(Request $request)
    {
        $results = $this->hub->getInsuranceQuote($request->input('region', 'worldwide'));
        return response()->json($results);
    }

    /**
     * Live Tours Search
     */
    public function searchTours(Request $request)
    {
        $results = $this->hub->searchExperiences($request->input('q', ''));
        return response()->json($results);
    }

    /**
     * Live Transfer Quote
     */
    public function getTransfers(Request $request)
    {
        $results = $this->hub->searchTransfers($request->all());
        return response()->json($results);
    }
    /**
     * Live Flight Booking (Order Creation)
     */
    public function bookFlight(Request $request)
    {
        $request->validate([
            'offer_id' => 'required|string',
            'passengers' => 'required|array',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
        ]);

        $results = $this->hub->createFlightOrder($request->all());

        if (isset($results['data']['id']) || (isset($results['status']) && $results['status'] === 'success')) {
            // Save to database
            \App\Models\Booking::create([
                'user_id' => $request->user()->id,
                'service_type' => 'flight',
                'service_id' => 0, // Placeholder
                'amount' => $request->input('amount'),
                'currency' => $request->input('currency'),
                'status' => 'confirmed',
                'payment_method' => 'wallet',
                'payment_reference' => $results['data']['id'] ?? $results['booking_id'],
            ]);
        }

        return response()->json($results);
    }
}
