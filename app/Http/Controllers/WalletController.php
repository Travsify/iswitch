<?php

namespace App\Http\Controllers;

use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class WalletController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    /**
     * Get user balances.
     */
    public function index(Request $request)
    {
        $wallets = $request->user()->wallets;
        
        // Ensure all major currencies exist for the user (lazy creation)
        $currencies = ['NGN', 'USD', 'EUR', 'GBP'];
        $balances = [];
        
        foreach ($currencies as $currency) {
            $wallet = $this->walletService->getWallet($request->user(), $currency);
            $balances[] = [
                'id' => $wallet->id,
                'currency' => $wallet->currency,
                'balance' => (float) $wallet->balance,
                'status' => $wallet->status,
            ];
        }

        return response()->json([
            'status' => 'success',
            'data' => $balances
        ]);
    }

    /**
     * Get transaction history.
     */
    public function history(Request $request)
    {
        $transactions = $request->user()->transactions()
            ->with('wallet')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json([
            'status' => 'success',
            'data' => $transactions
        ]);
    }

    /**
     * Fund wallet (Simulated).
     */
    public function fund(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string|in:NGN,USD,EUR,GBP',
            'reference' => 'required|string|unique:transactions,reference',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 400);
        }

        try {
            $transaction = $this->walletService->fund(
                $request->user(),
                $request->amount,
                $request->currency,
                $request->reference
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Wallet funded successfully.',
                'data' => $transaction
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Swap currency.
     */
    public function swap(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'from_currency' => 'required|string|in:NGN,USD,EUR,GBP',
            'to_currency' => 'required|string|in:NGN,USD,EUR,GBP|different:from_currency',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 400);
        }

        try {
            $transactions = $this->walletService->swap(
                $request->user(),
                $request->from_currency,
                $request->to_currency,
                $request->amount
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Currency swapped successfully.',
                'data' => $transactions
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Send money.
     */
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string|in:NGN,USD,EUR,GBP',
            'recipient_email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 400);
        }

        try {
            $transactions = $this->walletService->send(
                $request->user(),
                $request->recipient_email,
                $request->amount,
                $request->currency
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Money sent successfully.',
                'data' => $transactions
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Withdraw money.
     */
    public function withdraw(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string|in:NGN,USD,EUR,GBP',
            'reference' => 'required|string|unique:transactions,reference',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 400);
        }

        try {
            $transaction = $this->walletService->withdraw(
                $request->user(),
                $request->amount,
                $request->currency,
                $request->reference
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Withdrawal processed successfully.',
                'data' => $transaction
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }
}
