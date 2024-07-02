<?php

namespace App\Filament\Resources\React;

use App\Filament\Resources\React\PostResource\Pages;
use App\Filament\Resources\React\PostResource\RelationManagers;
use App\Models\react\Categoria;
use App\Models\react\Grupo;
use App\Models\React\Post;
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

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = "React";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title_aside'),
            TextInput::make('slug'),
            TextInput::make('ordenacao')
                    ->type('number'),
            Select::make('selection')
                ->options([
                    'categoria' => 'Categoria',
                    'grupo' => 'Grupo',
                ])
                ->label('Escolha entre Categoria ou Grupo')
                ->reactive()
                ->helperText("É necessário salvar, para que possa trocar entre categoria e grupo"),
            Select::make('categoria_id')
                ->options(Categoria::pluck('nome', 'id'))
                ->reactive()
                ->hidden(fn ($get) => !($get('selection') === 'categoria'))
                ->disableOptionWhen(fn ($get) => $get('grupo_id') !== null),
            Select::make('grupo_id')
                ->options(Grupo::pluck('title_aside', 'id'))
                ->reactive()
                ->hidden(fn ($get) => !($get('selection') === 'grupo'))
                ->disableOptionWhen(fn ($get) => $get('categoria_id') !== null)
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_aside'),
                TextColumn::make('slug'),
                TextColumn::make('categoria.nome'),
                TextColumn::make('grupo.title_aside')
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
