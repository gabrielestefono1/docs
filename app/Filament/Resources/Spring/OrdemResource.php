<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\OrdemResource\Pages;
use App\Models\spring\Grupo;
use App\Models\Spring\Ordem;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrdemResource extends Resource
{
    protected static ?string $model = Ordem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ordem')
                    ->type('number'),
                Select::make('ordenacao_type')
                    ->reactive()
                    ->options([
                        '\App\Models\spring\Grupo' => 'Grupo',
                        '\App\Models\spring\Postagem' => 'Postagem'
                    ]),
                Select::make('ordenacao_id')
                    ->hidden(fn ($get) => $get('ordenacao_type') == '' || $get('ordenacao_type') == null)
                    ->options(fn ($get) => $get('ordenacao_type') == '\App\Models\spring\Grupo' ? Grupo::pluck('titulo', 'id')->toArray() : [])
            ])->columns(1);
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
            'index' => Pages\ListOrdems::route('/'),
            'create' => Pages\CreateOrdem::route('/create'),
            'edit' => Pages\EditOrdem::route('/{record}/edit'),
        ];
    }
}
