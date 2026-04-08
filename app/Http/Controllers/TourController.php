<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class TourController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }
    public function index(Request $request)
    {
        $query = Tour::query();
        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        return response()->json($query->get());
    }

    public function show($id)
    {
        return response()->json(Tour::findOrFail($id));
    }

    public function book(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $user = $request->user();
        $currency = $request->input('currency', 'NGN');
        $amount = $tour->price; // Assuming Tour model has a price attribute

        try {
            return DB::transaction(function () use ($user, $tour, $amount, $currency) {
                $reference = 'BK-TR-' . strtoupper(bin2hex(random_bytes(4)));

                try {
                    $this->walletService->pay($user, $amount, $currency, 'tour', $reference);
                    
                    $booking = Booking::create([
                        'user_id' => $user->id,
                        'service_type' => 'tour',
                        'service_id' => $tour->id,
                        'amount' => $amount,
                        'currency' => $currency,
                        'status' => 'confirmed',
                        'payment_method' => 'wallet',
                        'payment_reference' => $reference,
                    ]);

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Tour booked successfully using wallet.',
                        'data' => $booking
                    ]);
                } catch (Exception $e) {
                    $booking = Booking::create([
                        'user_id' => $user->id,
                        'service_type' => 'tour',
                        'service_id' => $tour->id,
                        'amount' => $amount,
                        'currency' => $currency,
                        'status' => 'pending',
                        'payment_method' => 'gateway',
                        'payment_reference' => $reference,
                    ]);

                    return response()->json([
                        'status' => 'redirect',
                        'message' => 'Insufficient wallet balance. Please complete payment via gateway.',
                        'payment_url' => '/api/payments/initialize?reference=' . $reference,
                        'data' => $booking
                    ]);
                }
            });
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
