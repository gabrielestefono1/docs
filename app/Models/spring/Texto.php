<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'postagem_id', 'slug'];

    protected $table = 'spring.textos';

    public function postagem()
    {
        return $this->belongsTo(Postagem::class, 'postagem_id');
    }

    public function ordenacao_textos(){
        return $this->hasOne(OrdenacaoTextos::class, 'texto_id');
    }
}
