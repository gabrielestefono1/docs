<?php

namespace App\Filament\Resources\Spring\OrdenacaoGruposPostagensResource\Pages;

use App\Filament\Resources\Spring\OrdenacaoGruposPostagensResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrdenacaoGruposPostagens extends ListRecords
{
    protected static string $resource = OrdenacaoGruposPostagensResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
