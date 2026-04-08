<?php

namespace App\Http\Controllers;

use App\Models\AncillaryService;
use App\Models\AncillaryBooking;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class AncillaryServiceController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    /**
     * List all active ancillary services.
     */
    public function index()
    {
        $services = AncillaryService::where('status', 'active')->get();
        return response()->json([
            'status' => 'success',
            'data' => $services
        ]);
    }

    /**
     * Book an ancillary service.
     */
    public function book(Request $request, $id)
    {
        $service = AncillaryService::findOrFail($id);
        $user = $request->user();
        $currency = $request->input('currency', $service->currency);
        $amount = $service->base_price;

        try {
            return DB::transaction(function () use ($user, $service, $amount, $currency, $request) {
                $reference = 'BK-ANC-' . strtoupper(bin2hex(random_bytes(4)));

                try {
                    // Attempt wallet payment
                    $this->walletService->pay($user, $amount, $currency, 'ancillary', $reference);
                    
                    $booking = AncillaryBooking::create([
                        'user_id' => $user->id,
                        'ancillary_service_id' => $service->id,
                        'amount' => $amount,
                        'currency' => $currency,
                        'status' => 'confirmed',
                        'payment_method' => 'wallet',
                        'payment_reference' => $reference,
                        'metadata' => $request->input('metadata', []),
                    ]);

                    return response()->json([
                        'status' => 'success',
                        'message' => "{$service->name} purchased successfully using wallet.",
                        'data' => $booking
                    ]);
                } catch (Exception $e) {
                    // Fallback to gateway
                    $booking = AncillaryBooking::create([
                        'user_id' => $user->id,
                        'ancillary_service_id' => $service->id,
                        'amount' => $amount,
                        'currency' => $currency,
                        'status' => 'pending',
                        'payment_method' => 'gateway',
                        'payment_reference' => $reference,
                        'metadata' => $request->input('metadata', []),
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
