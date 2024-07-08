<?php

namespace App\Filament\Resources\Spring\GrupoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConteudoRelationManager extends RelationManager
{
    protected static string $relationship = 'conteudo';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ordem')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ordem')
            ->columns([
                Tables\Columns\TextColumn::make('ordem')
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->visible($this->ownerRecord->conteudo_id == null && $this->ownerRecord->grupo_id == null)
            ])
            ->actions([
                Tables\Actions\EditAction::make()
            ]);
    }
}
