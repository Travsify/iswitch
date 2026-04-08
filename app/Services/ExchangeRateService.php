<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ExchangeRateService
{
    /**
     * Get the exchange rate from one currency to another.
     */
    public function getRate(string $from, string $to): float
    {
        if ($from === $to) {
            return 1.0;
        }

        // For a real app, use an API like Fixer.io or ExchangeRate-API
        // For now, we use a cached value or a hardcoded fallback
        $cacheKey = "exchange_rate_{$from}_{$to}";

        return Cache::remember($cacheKey, 3600, function () use ($from, $to) {
            // Placeholder rates (Base: USD)
            $rates = [
                'USD' => 1.0,
                'NGN' => 1600.0,
                'EUR' => 0.92,
                'GBP' => 0.79,
            ];

            if (isset($rates[$from]) && isset($rates[$to])) {
                // Convert to USD base then to target
                $usdAmount = 1.0 / $rates[$from];
                return $usdAmount * $rates[$to];
            }

            return 1.0; // Fallback
        });
    }

    /**
     * Convert an amount from one currency to another.
     */
    public function convert(float $amount, string $from, string $to): float
    {
        return $amount * $this->getRate($from, $to);
    }
}
