<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\GrupoResource\Pages;
use App\Filament\Resources\Spring\GrupoResource\RelationManagers;
use App\Models\Spring\Grupo;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GrupoResource extends Resource
{
    protected static ?string $model = Grupo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo'),
                MarkdownEditor::make('descricao'),
                // TextInput::make('tipo')
                //     ->hidden(false)
                //     ->readOnly()
                //     ->disabled()
                //     ->reactive()
                //     ->default(fn ($get) => $get('grupo_associado')),
                Toggle::make('grupo_associado')
                    ->default(true),
                // Select::make('grupo_pai_id')
                //     ->reactive()
                //     ->hidden(fn ($get) => $get('grupo_associado') !== true)
                //     ->options(function ($get) {
                //         if ($get('grupo_associado') === true) {
                //             return Grupo::pluck('titulo', 'id')->toArray();
                //         }
                //     })
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo'),
                TextColumn::make('tipo')
                    ->badge(),
                TextColumn::make('grupo_pai_id'),
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
