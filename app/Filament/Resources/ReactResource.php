<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReactResource\Pages;
use App\Filament\Resources\ReactResource\RelationManagers;
use App\Models\React;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReactResource extends Resource
{
    protected static ?string $model = React::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('max_items_input')->live(onBlur: true),

                Select::make('technologies')
                ->multiple()
                ->options([
                    'tailwind' => 'Tailwind CSS',
                    'alpine' => 'Alpine.js',
                    'laravel' => 'Laravel',
                    'livewire' => 'Laravel Livewire',
                ])
                ->maxItems(fn (Get $get): int => $get('max_items_input') ?? 1) // It doesn't work.
                ->helperText(fn (Get $get): string => $get('max_items_input') ?? 1) // It works.

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListReacts::route('/'),
            'create' => Pages\CreateReact::route('/create'),
            'edit' => Pages\EditReact::route('/{record}/edit'),
        ];
    }    
}
