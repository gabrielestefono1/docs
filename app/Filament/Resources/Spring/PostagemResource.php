<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\PostagemResource\Pages;
use App\Filament\Resources\Spring\PostagemResource\RelationManagers;
use App\Models\Spring\Postagem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostagemResource extends Resource
{
    protected static ?string $model = Postagem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
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
            'index' => Pages\ListPostagems::route('/'),
            'create' => Pages\CreatePostagem::route('/create'),
            'edit' => Pages\EditPostagem::route('/{record}/edit'),
        ];
    }
}
