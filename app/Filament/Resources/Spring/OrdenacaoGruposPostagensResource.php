<?php

namespace App\Filament\Resources\Spring;

use App\Filament\Resources\Spring\OrdenacaoGruposPostagensResource\Pages;
use App\Models\spring\Grupo;
use App\Models\Spring\OrdenacaoGruposPostagens;
use App\Models\spring\Postagem;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdenacaoGruposPostagensResource extends Resource
{
    protected static ?string $model = OrdenacaoGruposPostagens::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $breadcrumb = "Ordenação Subgrupos Postagens";

    protected static ?string $label = "Ordenação Subgrupos Postagens";

    protected static ?string $pluralLabel = "Ordenação Subgrupos Postagens";

    protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

    protected static ?string $navigationGroup = "Spring";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('grupo_id')
                    ->label('Grupo "Pai"')
                    ->reactive()
                    ->options(fn () => Grupo::pluck('titulo', 'id')->toArray()),
                Select::make('ordenavel_type')
                    ->label("É associado à:")
                    ->reactive()
                    ->options([
                        '\App\Models\spring\Grupo' => 'Grupo',
                        '\App\Models\spring\Postagem' => 'Postagem'
                    ]),
                Select::make('ordenavel_id')
                    ->reactive()
                    ->options(function ($get) {
                        if ($get('ordenavel_type') == '\App\Models\spring\Grupo' && ($get('grupo_id') !== null && $get('grupo_id') !== '')) {
                            return Grupo::where('is_grupo', true)->where('id', '!=', $get('grupo_id'))->pluck('titulo', 'id')->toArray();
                        } elseif ($get('ordenavel_type') == '\App\Models\spring\Postagem' && ($get('grupo_id') !== null && $get('grupo_id') !== '')) {
                            return Postagem::where('is_grupo', true)->pluck('titulo', 'id')->toArray();
                        }
                        return [];
                    })->searchable()
                    ->hint("Escolha um Grupo e uma associação para que os valores aqui fiquem disponíveis"),
                TextInput::make('ordem')
                    ->type('number')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('grupo.titulo'),
                TextColumn::make('ordenavel_type')
                    ->state(fn ($record) => $record->ordenavel_type === "\App\Models\spring\Grupo" ? 'Grupo' : 'Postagem'),
                TextColumn::make('ordenavel.titulo'),
                TextColumn::make('ordem')
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
            'index' => Pages\ListOrdenacaoGruposPostagens::route('/'),
            'create' => Pages\CreateOrdenacaoGruposPostagens::route('/create'),
            'edit' => Pages\EditOrdenacaoGruposPostagens::route('/{record}/edit'),
        ];
    }
}
