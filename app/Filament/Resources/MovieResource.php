<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Filament\Resources\MovieResource\RelationManagers;
use App\Models\Movie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MovieResource extends Resource
{
    protected static ?string $model = Movie::class;
    protected static ?string $navigationIcon = 'heroicon-o-film';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section 1: Basic Info
                Forms\Components\Section::make('Basic Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                            
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                            
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\Select::make('genres')
                            ->relationship('genres', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->columnSpanFull(),
                    ]),
                    
                // Section 2: Media & Pricing
                Forms\Components\Section::make('Media & Pricing')
                    ->columns(2)
                    ->schema([
                        Forms\Components\FileUpload::make('cover_image')
                            ->image()
                            ->directory('movie-covers')
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->prefix('$')
                            ->required(),
                            
                        Forms\Components\Select::make('hosting_type')
                            ->options([
                                'self' => 'Self-Hosted',
                                'vimeo' => 'Vimeo',
                                'youtube' => 'YouTube',
                                'aws' => 'AWS S3'
                            ])
                            ->required()
                            ->live()
                            ->columnSpanFull(),
                            
                        // Conditional Fields
                        Forms\Components\FileUpload::make('video_path')
                            ->label('Video File')
                            ->directory('movie-videos')
                            ->acceptedFileTypes(['video/mp4', 'video/quicktime'])
                            ->visible(fn (Forms\Get $get): bool => $get('hosting_type') === 'self')
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('external_id')
                            ->label('Video ID')
                            ->visible(fn (Forms\Get $get): bool => in_array($get('hosting_type'), ['vimeo', 'youtube']))
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('streaming_url')
                            ->label('Streaming URL')
                            ->url()
                            ->visible(fn (Forms\Get $get): bool => $get('hosting_type') === 'aws')
                            ->columnSpanFull(),
                    ]),
                    
                // Section 3: Additional Info
                Forms\Components\Section::make('Additional Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('trailer_url')
                            ->label('Trailer URL')
                            ->url(),
                            
                        Forms\Components\TextInput::make('duration_minutes')
                            ->numeric()
                            ->suffix('minutes')
                            ->required(),
                            
                        Forms\Components\DatePicker::make('release_date')
                            ->required(),
                            
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->size(40),
                    
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('genres.name')
                    ->badge()
                    ->separator(','),
                    
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('hosting_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'self' => 'info',
                        'vimeo' => 'blue',
                        'youtube' => 'danger',
                        'aws' => 'warning',
                        default => 'gray',
                    }),
                    
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('release_date')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('hosting_type')
                    ->options([
                        'self' => 'Self-Hosted',
                        'vimeo' => 'Vimeo',
                        'youtube' => 'YouTube',
                        'aws' => 'AWS S3'
                    ]),
                    
                Tables\Filters\Filter::make('is_published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true))
                    ->label('Only Published'),
                    
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PurchasesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
            'view' => Pages\ViewMovie::route('/{record}'),
            'edit' => Pages\EditMovie::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}