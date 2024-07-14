<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\GrupoResource\Pages;
use App\Models\Spring\Grupo;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GrupoResource extends Resource
{
    protected static ?string $model = Grupo::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $breadcrumb = "Grupos";

    protected static ?string $label = "Grupos";

    protected static ?string $pluralLabel = "Grupos";

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = "Spring";

    public static function form(Form $form): Form
    {
        $existeId = isset($form->model->id);

        return $form
            ->schema([
                TextInput::make('titulo')
                    ->label("Título do novo grupo"),
                MarkdownEditor::make('descricao')
                    ->label("Descrição do grupo"),
                Toggle::make('is_grupo')
                    ->label("É associado a um grupo?")
                    ->reactive(),
                Select::make('grupo_pai_id')
                    ->reactive()
                    ->hidden(fn ($get) => $get('is_grupo') !== true)
                    ->label("Qual grupo?")
                    ->options(function ($get) use ($existeId, $form) {
                        if ($get('is_grupo') === true) {
                            return Grupo::when($existeId , function($query) use ($form){
                                return $query->where('id', '!=', $form->model->id);
                            })->pluck('titulo', 'id')->toArray();
                        }
                    })
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('titulo')
                    ->label('Título do Grupo'),
                IconColumn::make('is_grupo')
                    ->label('Associado a um Grupo?')
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->alignCenter(),
                TextColumn::make('grupo.titulo')
                    ->label('Grupo Associado'),
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
            'index' => Pages\ListGrupos::route('/'),
            'create' => Pages\CreateGrupo::route('/create'),
            'edit' => Pages\EditGrupo::route('/{record}/edit'),
        ];
    }
}
