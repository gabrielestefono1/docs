<?php

namespace App\Filament\Resources\Spring\OrdenacaoGruposPostagensResource\Pages;

use App\Filament\Resources\Spring\OrdenacaoGruposPostagensResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrdenacaoGruposPostagens extends EditRecord
{
    protected static string $resource = OrdenacaoGruposPostagensResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
