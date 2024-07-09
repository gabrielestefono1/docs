<?php

namespace App\Filament\Resources\Spring\GrupoResource\Pages;

use App\Filament\Resources\Spring\GrupoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrupo extends EditRecord
{
    protected static string $resource = GrupoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
