<?php

namespace App\Filament\Resources\Spring\OrdenacaoTextosResource\Pages;

use App\Filament\Resources\Spring\OrdenacaoTextosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrdenacaoTextos extends ListRecords
{
    protected static string $resource = OrdenacaoTextosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
