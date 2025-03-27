<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MovieResource\Pages;
use App\Filament\Resources\MovieResource\RelationManagers;
use App\Models\Movie;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovieResource extends Resource
{
    protected static ?string $model = Movie::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('slug')->unique()->required(),
                Textarea::make('description')->required(),
                TextInput::make('price')->numeric()->required(),
                TextInput::make('cover_image')->required(),
                Select::make('hosting_type')
                    ->options([
                        'self' => 'Self-Hosted',
                        'vimeo' => 'Vimeo',
                        'youtube' => 'YouTube',
                        'aws' => 'AWS S3'
                    ])
                    ->searchable()
                    ->required(),
                TextInput::make('video_path'),
                TextInput::make('external_id'),
                TextInput::make('streaming_url'),
                TextInput::make('trailer_url'),
                TextInput::make('duration_minutes')->numeric()->required(),
                DatePicker::make('release_date')->required(),
                Radio::make('is_published')->label('Publish this video?')->boolean(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('title')
                    ->searchable(),
               TextColumn::make('slug')
                    ->searchable(),
               TextColumn::make('price')
                    ->money()
                    ->sortable(),
               ImageColumn::make('cover_image'),
               TextColumn::make('hosting_type')
                    ->sortable()
                    ->searchable(),
               TextColumn::make('video_path')
                    ->searchable(),
               TextColumn::make('external_id')
                    ->searchable(),
               TextColumn::make('streaming_url')
                    ->searchable(),
               TextColumn::make('trailer_url')
                    ->searchable(),
               TextColumn::make('duration_minutes')
                    ->numeric()
                    ->sortable(),
               TextColumn::make('release_date')
                    ->date()
                    ->sortable(),

               IconColumn::make('is_published')->boolean(),
               TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
               TextColumn::make('updated_at')
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
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
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
