<?php

namespace App\Filament\Resources\Spring\OrdenacaoTextosResource\Pages;

use App\Filament\Resources\Spring\OrdenacaoTextosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrdenacaoTextos extends EditRecord
{
    protected static string $resource = OrdenacaoTextosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
