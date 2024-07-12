<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\OrdenacaoGruposPostagensResource\Pages;
use App\Filament\Resources\Spring\OrdenacaoGruposPostagensResource\RelationManagers;
use App\Models\spring\Grupo;
use App\Models\Spring\OrdenacaoGruposPostagens;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdenacaoGruposPostagensResource extends Resource
{
    protected static ?string $model = OrdenacaoGruposPostagens::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('grupo_id')
                    ->options(fn () => Grupo::pluck('titulo', 'id')->toArray()),
                Select::make('ordenavel_type')
                    ->reactive()
                    ->options([
                        '\App\Models\spring\Grupo' => 'Grupo',
                        '\App\Models\spring\Postagem' => 'Postagem'
                    ]),
                Select::make('ordenavel_id')
                    ->options(function($get){
                        if($get('\App\Models\spring\Grupo')){
                            
                        }
                    })->searchable()
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
            'index' => Pages\ListOrdenacaoGruposPostagens::route('/'),
            'create' => Pages\CreateOrdenacaoGruposPostagens::route('/create'),
            'edit' => Pages\EditOrdenacaoGruposPostagens::route('/{record}/edit'),
        ];
    }
}
