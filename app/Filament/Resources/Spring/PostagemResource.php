<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\PostagemResource\Pages;
use App\Filament\Resources\Spring\PostagemResource\RelationManagers;
use App\Filament\Resources\Spring\PostagemResource\RelationManagers\ConteudoRelationManager;
use App\Models\spring\Grupo;
use App\Models\Spring\Postagem;
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

class PostagemResource extends Resource
{
    protected static ?string $model = Postagem::class;

    protected static ?string $navigationGroup = "Spring";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo'),
                MarkdownEditor::make('descricao'),
                TextInput::make('slug'),
                Select::make('grupo_id')
                    ->options(function(){
                        return Grupo::all()->pluck('id');
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
            ConteudoRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPostagems::route('/'),
            'create' => Pages\CreatePostagem::route('/create'),
            'edit' => Pages\EditPostagem::route('/{record}/edit'),
        ];
    }
}
