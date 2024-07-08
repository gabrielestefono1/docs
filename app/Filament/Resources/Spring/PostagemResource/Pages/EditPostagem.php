<?php

namespace App\Filament\Resources\Spring\PostagemResource\Pages;

use App\Filament\Resources\Spring\PostagemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostagem extends EditRecord
{
    protected static string $resource = PostagemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
