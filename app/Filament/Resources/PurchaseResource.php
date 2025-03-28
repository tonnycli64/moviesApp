<?php

namespace App\Filament\Resources;

use App\Enums\PurchaseStatus;
use App\Filament\Exports\PurchaseExporter;
use App\Filament\Resources\PurchaseResource\Pages;
use App\Models\Purchase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class PurchaseResource extends Resource
{
    protected static ?string $model = Purchase::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Payment System';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Purchase Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->required(),
                            
                        Forms\Components\Select::make('movie_id')
                            ->relationship('movie', 'title')
                            ->searchable()
                            ->required(),
                            
                        Forms\Components\TextInput::make('amount')
                            ->numeric()
                            ->prefix('$')
                            ->required(),
                            
                        Forms\Components\Select::make('status')
                            ->options(PurchaseStatus::class)
                            ->enum(PurchaseStatus::class)
                            ->required(),
                    ]),
                    
                Forms\Components\Section::make('Refund Details')
                    ->schema([
                        Forms\Components\TextInput::make('refund_amount')
                            ->numeric()
                            ->prefix('$'),
                            
                        Forms\Components\Textarea::make('refund_reason'),
                    ])
                    ->visible(fn ($record) => $record?->status === 'refunded')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('movie.title')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('amount')
                    ->money()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (PurchaseStatus $state) => $state->label())
                    ->color(fn (PurchaseStatus $state) => match($state) {
                        PurchaseStatus::COMPLETED => 'success',
                        PurchaseStatus::PENDING => 'warning',
                        PurchaseStatus::FAILED => 'danger',
                        PurchaseStatus::REFUNDED => 'gray',
                }),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //RelationManagers\PaymentsRelationManager::class,
        ];
    }




    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchases::route('/'),
            'create' => Pages\CreatePurchase::route('/create'),
            'view' => Pages\ViewPurchase::route('/{record}'),
            'edit' => Pages\EditPurchase::route('/{record}/edit'),
        ];
    }
}