<?php

namespace App\Filament\Resources\Portfolio;

use App\Filament\Resources\Portfolio\ContatoResource\Pages;
use App\Filament\Resources\Portfolio\ContatoResource\RelationManagers;
use App\Models\Portfolio\Contato;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\PageRegistration;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Exception;
use Filament\Clusters\Cluster;
use Filament\Forms\Components\TextInput;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Page as BasePage;
use Filament\Pages\SubNavigationPosition;
use Filament\Panel;
use Filament\Resources\Pages\Concerns\CanAuthorizeResourceAccess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as RouteFacade;

class ContatoResource extends Resource
{
    protected static ?string $model = Contato::class;

    public Model $record;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public function mount($record): void
    {
        $this->record = static::getModel()::findOrFail($record);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('mensagem_inicial'),
                TextInput::make('whatsapp'),
                TextInput::make('email'),
                TextInput::make('linkedin'),
            ])->columns(1);
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        $nullSafety = Contato::first() !== null;
        if ($nullSafety) {
            return [
                'index' => Pages\EditContato::route('/'),
            ];
        }
        return [
            'index' => Pages\CreateContato::route('/')
        ];
    }
}
