<?php

namespace App\Filament\User\Resources\VisaDocumentResource\Pages;

use App\Filament\User\Resources\VisaDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisaDocuments extends ListRecords
{
    protected static string $resource = VisaDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
