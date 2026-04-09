<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Admin War Room Dashboard Stats
     */
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'pending_agents' => User::where('role', 'agent')->where('is_approved', false)->count(),
            'approved_agents' => User::where('role', 'agent')->where('is_approved', true)->count(),
            'total_balance' => User::sum('balance'),
            'total_leads' => DB::table('leads')->count(),
            'leads_today' => DB::table('leads')->whereDate('created_at', now()->toDateString())->count(),
            'recent_leads' => DB::table('leads')->latest()->limit(10)->get(),
            'recent_users' => User::where('role', 'customer')->latest()->limit(10)->get(['id', 'name', 'email', 'created_at']),
        ];

        return response()->json($stats);
    }

    /**
     * List Agents for Approval
     */
    public function listAgents(Request $request)
    {
        $status = $request->query('status', 'pending');
        $query = User::where('role', 'agent');

        if ($status === 'pending') {
            $query->where('is_approved', false);
        } elseif ($status === 'approved') {
            $query->where('is_approved', true);
        }

        return response()->json($query->latest()->get());
    }

    /**
     * Approve Agent & Generate Master API Key
     */
    public function approveAgent($id)
    {
        $agent = User::where('role', 'agent')->findOrFail($id);
        
        $agent->is_approved = true;
        $agent->kyb_status = 'approved';
        
        // Generate unique iSwitch Master API Key
        // Format: is_live_xxxx
        if (!$agent->api_key) {
            $agent->api_key = 'is_live_' . Str::random(40);
        }

        $agent->save();

        return response()->json([
            'message' => 'Agent approved and API key provisioned.',
            'agent' => $agent
        ]);
    }

    /**
     * Reject/Suspend Agent
     */
    public function suspendAgent($id)
    {
        $agent = User::where('role', 'agent')->findOrFail($id);
        $agent->is_approved = false;
        $agent->kyb_status = 'rejected';
        $agent->save();

        return response()->json(['message' => 'Agent suspended.']);
    }

    /**
     * Comprehensive User Management
     */
    public function listUsers()
    {
        return response()->json(User::where('role', 'customer')->latest()->get());
    }

    /**
     * List All Leads
     */
    public function listLeads()
    {
        $leads = DB::table('leads')->latest()->limit(50)->get();
        return response()->json($leads);
    }
}
