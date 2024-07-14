<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\TextoResource\Pages;
use App\Filament\Resources\Spring\TextoResource\RelationManagers;
use App\Models\spring\Postagem;
use App\Models\Spring\Texto;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TextoResource extends Resource
{
    protected static ?string $model = Texto::class;

    protected static ?int $navigationSort = 5;

    protected static ?string $breadcrumb = "Textos";

    protected static ?string $label = "Textos";

    protected static ?string $pluralLabel = "Textos";

    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-rays';

    protected static ?string $navigationGroup = "Spring";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->label("Título do novo texto"),
                MarkdownEditor::make('descricao')
                    ->label("Descrição do texto"),
                Select::make('postagem_id')
                    ->options(fn()=>Postagem::pluck('titulo', 'id')->toArray())
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('titulo'),
                TextColumn::make('descricao'),
                TextColumn::make('postagem.titulo')
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
            'index' => Pages\ListTextos::route('/'),
            'create' => Pages\CreateTexto::route('/create'),
            'edit' => Pages\EditTexto::route('/{record}/edit'),
        ];
    }
}
