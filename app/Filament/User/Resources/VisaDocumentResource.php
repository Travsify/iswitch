<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\VisaDocumentResource\Pages;
use App\Filament\User\Resources\VisaDocumentResource\RelationManagers;
use App\Models\VisaDocument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisaDocumentResource extends Resource
{
    protected static ?string $model = VisaDocument::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationLabel = 'The Vault';
    
    protected static ?string $modelLabel = 'Vault Document';
    
    protected static ?string $pluralModelLabel = 'The Secure Vault';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Secure Document Upload')
                    ->description('Upload your passport or visa securely.')
                    ->schema([
                        Forms\Components\Hidden::make('user_id')
                            ->default(fn () => auth()->id()),
                        Forms\Components\Select::make('document_type')
                            ->options([
                                'passport' => 'International Passport',
                                'visa' => 'Travel Visa',
                                'health' => 'Health/Vaccination Record',
                                'id' => 'National ID',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('document_number')
                            ->required()
                            ->label('Document ID / Passport Number'),
                        Forms\Components\DatePicker::make('expiry_date')
                            ->required(),
                        Forms\Components\Hidden::make('status')
                            ->default('pending'),
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Upload Document (PDF, JPG)')
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                            ->maxSize(5120)
                            ->directory('vault-documents')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('document_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'passport' => 'info',
                        'visa' => 'success',
                        'health' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('document_number')
                    ->searchable()
                    ->copyable()
                    ->label('ID Number'),
                Tables\Columns\TextColumn::make('expiry_date')
                    ->date()
                    ->sortable()
                    ->color(fn ($record) => $record->expiry_date < now() ? 'danger' : 'success'),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'create' => Pages\CreateVisaDocument::route('/create'),
            'edit' => Pages\EditVisaDocument::route('/{record}/edit'),
        ];
    }
}
