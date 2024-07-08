<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'spring.grupos';

    protected $fillable = ['titulo', 'descricao', 'slug', 'conteudo_id'];

    public function conteudo() {
        return $this->morphOne(Conteudo::class, 'conteudable');
    }

    public function grupos() {
        return $this->hasMany(Grupo::class);
    }

    public function postagens() {
        return $this->hasMany(Postagem::class);
    }
}
