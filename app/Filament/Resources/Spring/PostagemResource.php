<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\PostagemResource\Pages;
use App\Models\spring\Grupo;
use App\Models\Spring\Postagem;
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

class PostagemResource extends Resource
{
    protected static ?string $model = Postagem::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $breadcrumb = "Postagens";

    protected static ?string $label = "Postagens";

    protected static ?string $pluralLabel = "Postagens";

    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-ripple';

    protected static ?string $navigationGroup = "Spring";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->label("Título do novo grupo"),
                MarkdownEditor::make('descricao')
                    ->label("Descrição do grupo"),
                TextInput::make('slug')
                    ->label("Slug da Postagem"),
                Toggle::make('is_grupo')
                    ->label("É associado a um grupo?")
                    ->reactive(),
                Select::make('grupo_id')
                    ->reactive()
                    ->hidden(fn ($get) => $get('is_grupo') !== true)
                    ->label("Qual grupo?")
                    ->options(function () {
                        return Grupo::pluck('titulo', 'id')->toArray();
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
            'index' => Pages\ListPostagems::route('/'),
            'create' => Pages\CreatePostagem::route('/create'),
            'edit' => Pages\EditPostagem::route('/{record}/edit'),
        ];
    }
}
