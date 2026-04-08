<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Booking;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class FlightController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }
    public function index(Request $request)
    {
        $query = Flight::query();

        if ($request->has('departure_airport')) {
            $query->where('departure_airport', $request->departure_airport);
        }

        if ($request->has('arrival_airport')) {
            $query->where('arrival_airport', $request->arrival_airport);
        }

        if ($request->has('departure_date')) {
            $query->whereDate('departure_time', $request->departure_date);
        }

        return response()->json($query->get());
    }

    public function show($id)
    {
        return response()->json(Flight::findOrFail($id));
    }

    public function book(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);
        $user = $request->user();
        $currency = $request->input('currency', 'NGN');
        $amount = $flight->price; // Assuming Flight model has a price attribute

        try {
            return DB::transaction(function () use ($user, $flight, $amount, $currency) {
                $reference = 'BK-FLT-' . strtoupper(bin2hex(random_bytes(4)));

                // Try paying with wallet
                try {
                    $this->walletService->pay($user, $amount, $currency, 'flight', $reference);
                    
                    $booking = Booking::create([
                        'user_id' => $user->id,
                        'service_type' => 'flight',
                        'service_id' => $flight->id,
                        'amount' => $amount,
                        'currency' => $currency,
                        'status' => 'confirmed',
                        'payment_method' => 'wallet',
                        'payment_reference' => $reference,
                    ]);

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Flight booked successfully using wallet.',
                        'data' => $booking
                    ]);
                } catch (Exception $e) {
                    // Wallet failed (likely insufficient balance), fallback to gateway
                    $booking = Booking::create([
                        'user_id' => $user->id,
                        'service_type' => 'flight',
                        'service_id' => $flight->id,
                        'amount' => $amount,
                        'currency' => $currency,
                        'status' => 'pending',
                        'payment_method' => 'gateway',
                        'payment_reference' => $reference,
                    ]);

                    return response()->json([
                        'status' => 'redirect',
                        'message' => 'Insufficient wallet balance. Please complete payment via gateway.',
                        'payment_url' => '/api/payments/initialize?reference=' . $reference, // Placeholder
                        'data' => $booking
                    ]);
                }
            });
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
