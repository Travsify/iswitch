<?php

namespace App\Filament\Agent\Resources;

use App\Filament\Agent\Resources\BusinessProfileResource\Pages;
use App\Filament\Agent\Resources\BusinessProfileResource\RelationManagers;
use App\Models\BusinessProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BusinessProfileResource extends Resource
{
    protected static ?string $model = BusinessProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Business KYC Info';
    
    protected static ?string $modelLabel = 'KYC Document';
    
    protected static ?string $pluralModelLabel = 'Agent KYC Profile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Corporate Information')
                    ->description('Please provide your corporate details for platform verification.')
                    ->schema([
                        Forms\Components\Hidden::make('user_id')
                            ->default(fn () => auth()->id()),
                        Forms\Components\TextInput::make('company_registration_name')
                            ->required()
                            ->label('Legal Company Name'),
                        Forms\Components\TextInput::make('business_name')
                            ->required()
                            ->label('Business / Trade Name'),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),
                    
                Forms\Components\Section::make('Supporting Documents')
                    ->description('Upload clear JPG or PDF files.')
                    ->schema([
                        Forms\Components\FileUpload::make('registration_document_path')
                            ->label('Certificate of Incorporation')
                            ->directory('kyc-docs')
                            ->required(),
                        Forms\Components\FileUpload::make('utility_bill_path')
                            ->label('Utility Bill (Proof of Address)')
                            ->directory('kyc-docs')
                            ->required(),
                        Forms\Components\FileUpload::make('passport_photo_path')
                            ->label('Director/Owner Passport Photo')
                            ->directory('kyc-docs')
                            ->image()
                            ->required(),
                        Forms\Components\FileUpload::make('government_id_path')
                            ->label('Government Issued ID')
                            ->directory('kyc-docs')
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_registration_name')
                    ->label('Company Legal Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('business_name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('passport_photo_path')
                    ->label('Photo')
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted On')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    public static function getPages(): array
    {
        return [
            'create' => Pages\CreateBusinessProfile::route('/create'),
            'edit' => Pages\EditBusinessProfile::route('/{record}/edit'),
        ];
    }
}
