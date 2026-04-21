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
            'recent_bookings' => Booking::where('user_id', $user->id)
                ->latest()
                ->take(5)
                ->get(),
            'recent_transactions' => $user->transactions()
                ->latest()
                ->take(10)
                ->get(),
            'total_bookings' => Booking::where('user_id', $user->id)->count(),
            'travel_readiness' => $user->visaDocuments()->count() > 0 ? 85 : 30,
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

        // Calculate actual commissions
        $totalCommissions = Booking::where('agent_id', $user->id)
            ->where('status', 'confirmed')
            ->sum('commission_amount');

        // Active clients: unique users booked by this agent
        $activeClientsCount = Booking::where('agent_id', $user->id)
            ->distinct('user_id')
            ->count('user_id');

        // Monthly revenue: total amount of confirmed bookings managed by agent this month
        $monthlyRevenue = Booking::where('agent_id', $user->id)
            ->where('status', 'confirmed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        $stats = [
            'wallet_balances' => $user->wallets()->select('currency', 'balance')->get(),
            'total_commissions' => (float) $totalCommissions,
            'managed_bookings_count' => Booking::where('agent_id', $user->id)->count(),
            'ancillary_sales' => AncillaryBooking::where('user_id', $user->id)->count(),
            'business_summary' => [
                'active_clients' => $activeClientsCount,
                'monthly_revenue' => (float) $monthlyRevenue
            ],
            'recent_managed_bookings' => Booking::with('user:id,name,email')
                ->where('agent_id', $user->id)
                ->latest()
                ->take(5)
                ->get()
        ];

        return response()->json([
            'status' => 'success',
            'role' => 'agent',
            'data' => $stats
        ]);
    }
}
