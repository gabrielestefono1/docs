<?php

namespace App\Filament\Resources\Spring\OrdenacaoGeralResource\Pages;

use App\Filament\Resources\Spring\OrdenacaoGeralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrdenacaoGeral extends EditRecord
{
    protected static string $resource = OrdenacaoGeralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
