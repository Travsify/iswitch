<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class WalletOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        $baseCurrencies = ['USD' => '$', 'GBP' => '£', 'EUR' => '€', 'NGN' => '₦'];
        $stats = [];
        
        if ($user) {
            $wallets = $user->wallets->pluck('balance', 'currency')->toArray();

            foreach ($baseCurrencies as $currency => $symbol) {
                $balance = $wallets[$currency] ?? 0.00;
                $stats[] = Stat::make($currency . ' Balance', $symbol . number_format($balance, 2))
                    ->description('Available ' . $currency)
                    ->descriptionIcon('heroicon-m-wallet')
                    ->color('primary');
            }
        }

        return $stats;
    }
}
