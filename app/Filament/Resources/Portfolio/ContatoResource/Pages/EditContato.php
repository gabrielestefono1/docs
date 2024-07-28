<?php

namespace App\Filament\Resources\Portfolio\ContatoResource\Pages;

use App\Filament\Resources\Portfolio\ContatoResource;
use App\Models\Portfolio\Contato;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditContato extends EditRecord
{
    protected static string $resource = ContatoResource::class;

    public function mount(int | string $record = null): void
    {
        $contato = Contato::first();

        if (!isset($contato)) {
            abort(404);
        }
        $id = $contato->id;

        $this->record = $this->resolveRecord($id);

        $this->authorizeAccess();

        $this->fillForm();

        $this->previousUrl = url()->previous();
    }
}
