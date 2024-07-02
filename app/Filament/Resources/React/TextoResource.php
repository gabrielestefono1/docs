<?php

namespace App\Filament\Resources\React;

use App\Filament\Resources\React\TextoResource\Pages;
use App\Filament\Resources\React\TextoResource\RelationManagers;
use App\Models\react\Grupo;
use App\Models\react\Post;
use App\Models\React\Texto;
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

    protected static ?string $navigationGroup = "React";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("titulo"),
                MarkdownEditor::make('corpo'),
                TextInput::make('ordenacao')
                    ->type('number'),
                Select::make('selection')
                    ->options([
                        'post' => 'Post',
                        'grupo' => 'Grupo',
                    ])
                    ->label('Escolha entre Post ou Grupo')
                    ->reactive()
                    ->helperText("É necessário salvar, para que possa trocar entre post e grupo"),
                Select::make('post_id')
                    ->options(Post::pluck('title_aside', 'id'))
                    ->reactive()
                    ->hidden(fn ($get) => !($get('selection') === 'post'))
                    ->disableOptionWhen(fn ($get) => $get('grupo_id') !== null),
                Select::make('grupo_id')
                    ->options(Grupo::pluck('title_aside', 'id'))
                    ->reactive()
                    ->hidden(fn ($get) => !($get('selection') === 'grupo'))
                    ->disableOptionWhen(fn ($get) => $get('post_id') !== null)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('titulo'),
                TextColumn::make('posts.title_aside'),
                TextColumn::make('grupos.title_aside'),
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
