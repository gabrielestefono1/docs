<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\GrupoResource\Pages;
use App\Filament\Resources\Spring\GrupoResource\RelationManagers\ConteudoRelationManager;
use App\Models\spring\Conteudo;
use App\Models\Spring\Grupo;
use Filament\Actions\Action;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GrupoResource extends Resource
{
    protected static ?string $model = Grupo::class;

    protected static ?string $navigationGroup = "Spring";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $selectedTipo = null;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo'),
                MarkdownEditor::make('descricao'),
                TextInput::make('slug'),
                Select::make('tipo')
                    ->reactive()
                    ->options(['grupo' => 'Grupo', 'subgrupo' => 'Subgrupo']),
                Select::make('grupo_id')
                    ->options(fn () => Grupo::where("conteudo_id", "!=", null)->pluck('id', 'titulo'))
                    ->hidden(function ($get) {
                        return $get('tipo') !== 'subgrupo';
                    }),
                TextInput::make('ordem')
                    ->type('number')
                    ->default(fn($get) => Grupo::where('id', $get('id') ?? null)->first())
                    ->hidden(function ($get) {
                        return $get('tipo') !== 'grupo';
                    })

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('titulo'),
                TextColumn::make('slug'),
                TextColumn::make('conteudo.ordem'),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // ConteudoRelationManager::class
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrupos::route('/'),
            'create' => Pages\CreateGrupo::route('/create'),
            'edit' => Pages\EditGrupo::route('/{record}/edit'),
        ];
    }
}
