<?php

namespace App\Filament\Resources\Spring\OrdemResource\Pages;

use App\Filament\Resources\Spring\OrdemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrdem extends EditRecord
{
    protected static string $resource = OrdemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
