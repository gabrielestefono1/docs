<?php

namespace App\Filament\Resources\Portfolio;

use App\Filament\Resources\Portfolio\MensagemResource\Pages;
use App\Filament\Resources\Portfolio\MensagemResource\RelationManagers;
use App\Models\Portfolio\Mensagem;
use App\Models\Portfolio\Mensagens;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MensagemResource extends Resource
{
    protected static ?string $model = Mensagens::class;

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
            'index' => Pages\ListMensagems::route('/'),
            'create' => Pages\CreateMensagem::route('/create'),
            'edit' => Pages\EditMensagem::route('/{record}/edit'),
        ];
    }
}
