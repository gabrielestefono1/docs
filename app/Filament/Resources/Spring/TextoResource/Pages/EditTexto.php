<?php

namespace App\Filament\Resources\Spring\TextoResource\Pages;

use App\Filament\Resources\Spring\TextoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTexto extends EditRecord
{
    protected static string $resource = TextoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
