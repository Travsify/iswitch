<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\AncillaryBooking;

class DashboardController extends Controller
{
    /**
     * Handle the dashboard request and redirect to the appropriate role dashboard.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->isAgent()) {
            return $this->agentDashboard($request);
        }

        return $this->customerDashboard($request);
    }

    /**
     * Data for the customer dashboard.
     */
    protected function customerDashboard(Request $request)
    {
        $user = $request->user();
        
        $stats = [
            'wallet_balances' => $user->wallets()->select('currency', 'balance')->get(),
            'recent_bookings' => Booking::where('user_id', $user->id)->latest()->take(5)->get(),
            'total_bookings' => Booking::where('user_id', $user->id)->count(),
        ];

        return response()->json([
            'status' => 'success',
            'role' => 'customer',
            'data' => $stats
        ]);
    }

    /**
     * Data for the agent dashboard.
     */
    protected function agentDashboard(Request $request)
    {
        $user = $request->user();

        // Agent specific stats (Placeholder logic)
        $stats = [
            'wallet_balances' => $user->wallets()->select('currency', 'balance')->get(),
            'total_commissions' => 0.00, // Placeholder
            'managed_bookings_count' => Booking::where('user_id', $user->id)->count(),
            'ancillary_sales' => AncillaryBooking::where('user_id', $user->id)->count(),
            'business_summary' => [
                'active_clients' => 0,
                'monthly_revenue' => 0.00
            ]
        ];

        return response()->json([
            'status' => 'success',
            'role' => 'agent',
            'data' => $stats
        ]);
    }
}
