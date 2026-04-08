<?php

namespace App\Filament\Agent\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class AgentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();

        // Agents typically earn a commission. Assuming we represent this via wallet balance or just show dummy data if unassociated
        $ngnWallet = $user->wallets()->where('currency', 'NGN')->first()?->balance ?? 0;
        $usdWallet = $user->wallets()->where('currency', 'USD')->first()?->balance ?? 0;
        
        $activeBookings = Booking::where('user_id', $user->id)->where('status', 'confirmed')->count();

        return [
            Stat::make('Total Commissions (USD)', '$' . number_format($usdWallet, 2))
                ->description('32% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Commissions (NGN)', '₦' . number_format($ngnWallet, 2))
                ->description('Available for payout')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('primary'),
            Stat::make('Active Client Bookings', $activeBookings)
                ->description('Manage client trips')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),
        ];
    }
}
