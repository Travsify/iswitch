<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string|in:customer,agent',
            // Agent (B2B) specific fields
            'company_registration_name' => 'required_if:role,agent|string|max:255',
            'business_name' => 'required_if:role,agent|string|max:255',
            'address' => 'required_if:role,agent|string',
            'registration_document' => 'required_if:role,agent|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'utility_bill' => 'required_if:role,agent|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'passport_photo' => 'required_if:role,agent|file|mimes:jpg,png,jpeg|max:5120',
            'government_id' => 'required_if:role,agent|file|mimes:pdf,jpg,png,jpeg|max:5120',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'customer',
            'is_approved' => ($request->role === 'agent') ? false : true, // Agents require admin vetting
            'kyb_status' => ($request->role === 'agent') ? 'pending' : 'none',
        ]);

        if ($user->isAgent()) {
            $regDocPath = $request->file('registration_document')->store('agent_docs', 'public');
            $utilityBillPath = $request->file('utility_bill')->store('agent_docs', 'public');
            $passportPath = $request->file('passport_photo')->store('agent_docs', 'public');
            $govIdPath = $request->file('government_id')->store('agent_docs', 'public');

            $user->businessProfile()->create([
                'company_registration_name' => $request->company_registration_name,
                'business_name' => $request->business_name,
                'address' => $request->address,
                'registration_document_path' => $regDocPath,
                'utility_bill_path' => $utilityBillPath,
                'passport_photo_path' => $passportPath,
                'government_id_path' => $govIdPath,
            ]);
        }

        $otp = (string) rand(100000, 999999);
        $user->update(['otp' => $otp]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user->load('businessProfile'),
            'message' => $user->isAgent() ? 'B2B Registration received. Your account is pending administrative approval.' : 'Registration successful.',
            'is_approved' => $user->is_approved,
            'otp' => $otp,
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        
        // Strict B2B Approval Check
        if ($user->isAgent() && !$user->is_approved) {
            return response()->json([
                'message' => 'Your B2B account is pending approval. Please contact iSwitch support.',
                'status' => 'pending_approval'
            ], 403);
        }

        $otp = (string) rand(100000, 999999);
        $user->update(['otp' => $otp]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'otp' => $otp,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Token deleted successfully'
        ]);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
