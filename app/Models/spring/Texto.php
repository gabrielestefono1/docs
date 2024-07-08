<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;

    protected $table = 'spring.textos';

    protected $fillable = ['postagem_id', 'titulo', 'descricao', 'slug'];

    public function postagem() {
        return $this->belongsTo(Postagem::class);
    }
}
