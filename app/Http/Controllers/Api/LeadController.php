<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'type' => 'nullable|string',
            'payload' => 'nullable|array'
        ]);

        $lead = Lead::create([
            'email' => $request->email,
            'type' => $request->type ?? 'newsletter',
            'payload' => $request->payload
        ]);

        return response()->json([
            'message' => 'Success! We will be in touch.',
            'lead' => $lead
        ]);
    }
}
