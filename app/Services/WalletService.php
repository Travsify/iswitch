<?php

namespace App\Services;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Exception;

class WalletService
{
    protected $exchangeRateService;

    public function __construct(ExchangeRateService $exchangeRateService)
    {
        $this->exchangeRateService = $exchangeRateService;
    }

    /**
     * Get or create a wallet for a user.
     */
    public function getWallet(User $user, string $currency): Wallet
    {
        return Wallet::firstOrCreate(
            ['user_id' => $user->id, 'currency' => strtoupper($currency)],
            ['balance' => 0, 'status' => 'active']
        );
    }

    /**
     * Fund a wallet.
     */
    public function fund(User $user, float $amount, string $currency, string $reference): Transaction
    {
        return DB::transaction(function () use ($user, $amount, $currency, $reference) {
            $wallet = $this->getWallet($user, $currency);

            $wallet->increment('balance', $amount);

            return Transaction::create([
                'user_id' => $user->id,
                'wallet_id' => $wallet->id,
                'type' => 'fund',
                'amount' => $amount,
                'currency' => $currency,
                'reference' => $reference,
                'status' => 'completed',
            ]);
        });
    }

    /**
     * Swap balance between wallets.
     */
    public function swap(User $user, string $fromCurrency, string $toCurrency, float $amount): array
    {
        return DB::transaction(function () use ($user, $fromCurrency, $toCurrency, $amount) {
            $fromWallet = $this->getWallet($user, $fromCurrency);
            $toWallet = $this->getWallet($user, $toCurrency);

            if ($fromWallet->balance < $amount) {
                throw new Exception("Insufficient balance in {$fromCurrency} wallet.");
            }

            $convertedAmount = $this->exchangeRateService->convert($amount, $fromCurrency, $toCurrency);

            $fromWallet->decrement('balance', $amount);
            $toWallet->increment('balance', $convertedAmount);

            $reference = 'SWP-' . strtoupper(bin2hex(random_bytes(4)));

            $outgoing = Transaction::create([
                'user_id' => $user->id,
                'wallet_id' => $fromWallet->id,
                'type' => 'swap',
                'amount' => -$amount,
                'currency' => $fromCurrency,
                'reference' => "{$reference}-OUT",
                'status' => 'completed',
                'metadata' => ['to_currency' => $toCurrency, 'converted_amount' => $convertedAmount]
            ]);

            $incoming = Transaction::create([
                'user_id' => $user->id,
                'wallet_id' => $toWallet->id,
                'type' => 'swap',
                'amount' => $convertedAmount,
                'currency' => $toCurrency,
                'reference' => "{$reference}-IN",
                'status' => 'completed',
                'metadata' => ['from_currency' => $fromCurrency, 'original_amount' => $amount]
            ]);

            return [$outgoing, $incoming];
        });
    }

    /**
     * Pay for a service from wallet.
     */
    public function pay(User $user, float $amount, string $currency, string $serviceType, string $reference): Transaction
    {
        return DB::transaction(function () use ($user, $amount, $currency, $serviceType, $reference) {
            $wallet = $this->getWallet($user, $currency);

            if ($wallet->balance < $amount) {
                throw new Exception("Insufficient balance.");
            }

            $wallet->decrement('balance', $amount);

            return Transaction::create([
                'user_id' => $user->id,
                'wallet_id' => $wallet->id,
                'type' => 'payment',
                'amount' => -$amount,
                'currency' => $currency,
                'reference' => $reference,
                'status' => 'completed',
                'metadata' => ['service_type' => $serviceType]
            ]);
        });
    }

    /**
     * Send money to another user.
     */
    public function send(User $sender, string $recipientEmail, float $amount, string $currency): array
    {
        return DB::transaction(function () use ($sender, $recipientEmail, $amount, $currency) {
            $recipient = User::where('email', $recipientEmail)->first();
            if (!$recipient) {
                throw new Exception("Recipient not found.");
            }

            $senderWallet = $this->getWallet($sender, $currency);
            if ($senderWallet->balance < $amount) {
                throw new Exception("Insufficient balance.");
            }

            $recipientWallet = $this->getWallet($recipient, $currency);

            $senderWallet->decrement('balance', $amount);
            $recipientWallet->increment('balance', $amount);

            $reference = 'TRF-' . strtoupper(bin2hex(random_bytes(4)));

            $outgoing = Transaction::create([
                'user_id' => $sender->id,
                'wallet_id' => $senderWallet->id,
                'type' => 'send',
                'amount' => -$amount,
                'currency' => $currency,
                'reference' => "{$reference}-SND",
                'status' => 'completed',
                'metadata' => ['recipient_email' => $recipientEmail]
            ]);

            $incoming = Transaction::create([
                'user_id' => $recipient->id,
                'wallet_id' => $recipientWallet->id,
                'type' => 'receive',
                'amount' => $amount,
                'currency' => $currency,
                'reference' => "{$reference}-RCV",
                'status' => 'completed',
                'metadata' => ['sender_email' => $sender->email]
            ]);

            return [$outgoing, $incoming];
        });
    }

    /**
     * Withdraw money from wallet.
     */
    public function withdraw(User $user, float $amount, string $currency, string $reference): Transaction
    {
        return DB::transaction(function () use ($user, $amount, $currency, $reference) {
            $wallet = $this->getWallet($user, $currency);

            if ($wallet->balance < $amount) {
                throw new Exception("Insufficient balance.");
            }

            $wallet->decrement('balance', $amount);

            return Transaction::create([
                'user_id' => $user->id,
                'wallet_id' => $wallet->id,
                'type' => 'withdraw',
                'amount' => -$amount,
                'currency' => $currency,
                'reference' => $reference,
                'status' => 'completed',
            ]);
        });
    }
}
