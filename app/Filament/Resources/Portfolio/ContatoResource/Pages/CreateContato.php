<?php

namespace App\Filament\Resources\Portfolio\ContatoResource\Pages;

use App\Filament\Resources\Portfolio\ContatoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContato extends CreateRecord
{
    protected static string $resource = ContatoResource::class;

    public function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

}
