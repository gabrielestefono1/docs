<?php

namespace App\Filament\Resources\Portfolio\ContatoResource\Pages;

use App\Filament\Resources\Portfolio\ContatoResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageContatos extends ManageRecords
{
    protected static string $resource = ContatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
