<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\OrdenacaoTextosResource\Pages;
use App\Filament\Resources\Spring\OrdenacaoTextosResource\RelationManagers;
use App\Models\Spring\OrdenacaoTextos;
use App\Models\spring\Postagem;
use App\Models\spring\Texto;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdenacaoTextosResource extends Resource
{
    protected static ?string $model = OrdenacaoTextos::class;

    protected static ?int $navigationSort = 6;

    protected static ?string $breadcrumb = "Ordenação Textos";

    protected static ?string $label = "Ordenação Textos";
    
    protected static ?string $pluralLabel = "Ordenação Textos";

    protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

    protected static ?string $navigationGroup = "Spring";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ordem')
                    ->type('number'),
                Select::make('postagem_id')
                    ->reactive()
                    ->options(fn () => Postagem::pluck('titulo', 'id')->toArray()),
                Select::make('texto_id')
                    ->reactive()
                    ->hidden(fn ($get) => $get('postagem_id') === null || $get('postagem_id') === '')
                    ->options(function ($get) {
                        return Texto::where('postagem_id', $get('postagem_id'))->pluck('titulo', 'id')->toArray();
                    })
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('ordem'),
                TextColumn::make('postagem.titulo'),
                TextColumn::make('texto.titulo')
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
            'index' => Pages\ListOrdenacaoTextos::route('/'),
            'create' => Pages\CreateOrdenacaoTextos::route('/create'),
            'edit' => Pages\EditOrdenacaoTextos::route('/{record}/edit'),
        ];
    }
}
