<?php

namespace App\Services\Travel;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * iSwitch Core Integration Hub
 * Centralized logic for Global Mobility APIs.
 */
class IntegrationHub
{
    /**
     * DUFFEL (Aviation Engine)
     * Search for live flights.
     */
    public function searchFlights(array $params)
    {
        $token = config('services.duffel.token');
        if (!$token) return $this->mockFlights();

        try {
            $response = Http::withToken($token)
                ->withHeaders(['Duffel-Version' => 'v1'])
                ->post('https://api.duffel.com/air/offer_requests', [
                    'data' => [
                        'slices' => [[
                            'origin' => $params['origin'] ?? 'LHR',
                            'destination' => $params['destination'] ?? 'JFK',
                            'departure_date' => $params['date'] ?? now()->addDays(7)->format('Y-m-d'),
                        ]],
                        'passengers' => [['type' => 'adult']],
                        'cabin_class' => $params['class'] ?? 'economy',
                    ]
                ]);

            return $response->json();
        } catch (\Exception $e) {
            Log::error("Duffel API Error: " . $e->getMessage());
            return $this->mockFlights();
        }
    }

    /**
     * AMADEUS (Hospitality & Safety Engine)
     * Search for luxury hotel inventory.
     */
    public function searchHotels(string $cityCode)
    {
        $apiKey = config('services.amadeus.key');
        $apiSecret = config('services.amadeus.secret');
        
        if (!$apiKey) return $this->mockHotels();

        // Note: Amadeus Requires an OAuth2 token first (Simplified for this integration version)
        return $this->mockHotels();
    }

    /**
     * ATLYS (Visa Intelligence & Processing)
     */
    public function checkVisaEligibility(string $passport, string $destination)
    {
        // Placeholder for Atlys Logic
        return [
            'eligible' => true,
            'estimated_days' => 5,
            'probability' => '98%',
            'document_required' => ['Passport', 'Photo', 'Bank Statement']
        ];
    }

    /**
     * VIATOR (Experiences & Tours)
     */
    public function searchExperiences(string $query)
    {
        $apiKey = config('services.viator.key');
        if (!$apiKey) return $this->mockTours();

        // Viator logic...
        return $this->mockTours();
    }

    /**
     * MOZIO (Logistics & Chauffeur)
     */
    public function searchTransfers(array $params)
    {
        $apiKey = config('services.mozio.key');
        if (!$apiKey) return $this->mockTransfers();

        // Mozio logic...
        return $this->mockTransfers();
    }

    /**
     * SAFETYWING (Nomad Insurance & Shield)
     */
    public function getInsuranceQuote(string $region = 'worldwide')
    {
        $apiId = config('services.safetywing.id');
        if (!$apiId) return $this->mockInsurance($region);

        // SafetyWing logic...
        return $this->mockInsurance($region);
    }

    /**
     * STRIPE (Global Payment Conduit)
     */
    public function createPaymentSession(float $amount, string $currency = 'usd')
    {
        // Placeholder for Stripe Logic
        return ['session_url' => 'https://checkout.stripe.com/pay/mock_session'];
    }

    /**
     * MOCK DATA (For instant frontend testing without keys)
     */
    private function mockFlights() {
        return [
            ['id' => 'fl_1', 'airline' => 'Virgin Atlantic', 'price' => 750, 'duration' => '6h 30m'],
            ['id' => 'fl_2', 'airline' => 'Qatar Airways', 'price' => 890, 'duration' => '14h 20m']
        ];
    }

    private function mockHotels() {
        return [
            ['id' => 'ht_1', 'name' => 'The Ritz Paris', 'rating' => 5, 'price' => 1100],
            ['id' => 'ht_2', 'name' => 'Burj Al Arab', 'rating' => 5, 'price' => 1850]
        ];
    }

    private function mockInsurance(string $region) {
        if ($region === 'schengen') {
            return [
                'name' => 'Schengen-Elite Shield',
                'price' => 45.00,
                'coverage' => '€30,000 Medical Limit + Repatriation',
                'compliance' => '100% Schengen Compliant'
            ];
        }
        return [
            'name' => 'Global Nomad Guard',
            'price' => 56.40,
            'coverage' => '$1M Crisis Support + Medical',
            'compliance' => 'Worldwide (Excl. USA)'
        ];
    }

    private function mockTours() {
        return [
            ['id' => 'tr_1', 'name' => 'Private Amalfi Yacht Charter', 'price' => 1375],
            ['id' => 'tr_2', 'name' => 'Maasai Mara Private Safari', 'price' => 3200]
        ];
    }

    private function mockTransfers() {
        return [
            ['id' => 'gr_1', 'vehicle' => 'Maybach S-Class', 'price' => 250],
            ['id' => 'gr_2', 'vehicle' => 'Tesla Model X Limo', 'price' => 180]
        ];
    }
}
