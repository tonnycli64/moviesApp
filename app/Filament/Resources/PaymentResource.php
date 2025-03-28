<?php

namespace App\Filament\Resources;

use App\Enums\PaymentStatus;
use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Payment System';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'transaction_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Payment Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('purchase_id')
                            ->relationship('purchase', 'id')
                            ->searchable()
                            ->required(),
                            
                        Forms\Components\Select::make('gateway_id')
                            ->relationship('gateway', 'name')
                            ->searchable()
                            ->required(),
                            
                        Forms\Components\TextInput::make('transaction_id')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\TextInput::make('amount')
                            ->numeric()
                            ->prefix('$')
                            ->required(),
                            
                            Forms\Components\Select::make('status')
                            ->options(PaymentStatus::class)
                            ->enum(PaymentStatus::class)
                            ->required(),
                    ]),
                    
                Forms\Components\Section::make('Metadata')
                    ->schema([
                        Forms\Components\KeyValue::make('metadata')
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transaction_id')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('purchase.id')
                    ->numeric()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('gateway.name')
                    ->badge(),
                    
                Tables\Columns\TextColumn::make('amount')
                    ->money()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->formatStateUsing(fn (PaymentStatus $state) => $state->label())
                ->color(fn (PaymentStatus $state) => match($state) {
                    PaymentStatus::COMPLETED => 'success',
                    PaymentStatus::PENDING => 'warning',
                    PaymentStatus::FAILED => 'danger',
                    PaymentStatus::REFUNDED => 'gray',
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'view' => Pages\ViewPayment::route('/{record}'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}