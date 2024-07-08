<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $table = "spring.postagens";

    protected $fillable = ['grupo_id', 'titulo', 'descricao', 'slug', 'conteudo_id'];

    public function conteudo() {
        return $this->morphOne(Conteudo::class, 'conteudable');
    }

    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }

    public function textos() {
        return $this->hasMany(Texto::class);
    }
    
}
