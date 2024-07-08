<?php

namespace App\Filament\Resources\Spring\GrupoResource\Pages;

use App\Filament\Resources\Spring\GrupoResource;
use App\Models\spring\Conteudo;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;

class CreateGrupo extends CreateRecord
{
    protected static string $resource = GrupoResource::class;

    public function beforeCreate(){
        if(!isset($this->data['ordem'])){
            return;
        }
        $conteudo = new Conteudo();
        $conteudo->ordem = $this->data['ordem'];
        $conteudo->conteudable_type = '\App\Models\spring\Grupo';
        $conteudo->conteudable_id = 0;
        $conteudo->save();
    }

    public function afterCreate(){
        $conteudo = Conteudo::where('id', $this->record->id)->first();
        $conteudo->conteudable_id = $this->data['ordem'];
        $conteudo->save();
    }
}
