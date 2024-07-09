<?php

namespace App\Filament\Resources\Spring\GrupoResource\Pages;

use App\Filament\Resources\Spring\GrupoResource;
use App\Models\spring\Ordem;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGrupo extends CreateRecord
{
    protected static string $resource = GrupoResource::class;
}
