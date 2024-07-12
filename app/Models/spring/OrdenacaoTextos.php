<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenacaoTextos extends Model
{
    use HasFactory;

    protected $fillable = ['postagem_id', 'texto_id', 'ordem'];

    protected $table = 'spring.ordenacao_textos';

    public function postagem(){
        return $this->belongsTo(Postagem::class, 'postagem_id');
    }

    public function texto(){
        return $this->belongsTo(Texto::class, 'texto_id');
    }
}
