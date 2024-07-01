<?php

namespace App\Filament\Resources\React\GrupoResource\Pages;

use App\Filament\Resources\React\GrupoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGrupos extends ListRecords
{
    protected static string $resource = GrupoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
