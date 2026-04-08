<?php

namespace App\Filament\Agent\Resources\TransactionResource\Pages;

use App\Filament\Agent\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
}
