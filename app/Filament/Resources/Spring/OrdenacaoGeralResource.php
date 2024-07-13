<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\OrdenacaoGeralResource\Pages;
use App\Filament\Resources\Spring\OrdenacaoGeralResource\RelationManagers;
use App\Models\spring\Grupo;
use App\Models\Spring\OrdenacaoGeral;
use App\Models\spring\Postagem;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdenacaoGeralResource extends Resource
{
    protected static ?string $model = OrdenacaoGeral::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = "Spring";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ordem')
                    ->type('number'),
                Select::make('ordenavel_type')
                    ->reactive()
                    ->options([
                        '\App\Models\spring\Grupo' => 'Grupo',
                        '\App\Models\spring\Postagem' => 'Postagem',
                    ]),
                Select::make('ordenavel_id')
                    ->reactive()
                    ->options(function ($get) {
                        if ($get('ordenavel_type') === '\App\Models\spring\Grupo') {
                            return Grupo::where('is_grupo', '!=', true)->pluck('titulo', 'id')->toArray();
                        } elseif ($get('ordenavel_type') === '\App\Models\spring\Postagem') {
                            return Postagem::where('is_grupo', '!=', true)->pluck('titulo', 'id')->toArray();
                        }
                    })
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('ordem'),
                TextColumn::make('ordenavel_type')
                    ->state(fn ($record) => $record->ordenavel_type === "\App\Models\spring\Grupo" ? 'Grupo' : 'Postagem'),
                TextColumn::make('ordenavel_id'),
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
            'index' => Pages\ListOrdenacaoGerals::route('/'),
            'create' => Pages\CreateOrdenacaoGeral::route('/create'),
            'edit' => Pages\EditOrdenacaoGeral::route('/{record}/edit'),
        ];
    }
}
