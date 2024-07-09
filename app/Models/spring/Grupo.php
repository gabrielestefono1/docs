<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'spring.grupos';

    protected $fillable = ['descricao', 'titulo', 'slug', 'grupo_pai_id', 'ordem_id'];

    public function grupoPai()
    {
        return $this->belongsTo(Grupo::class, 'grupo_pai_id');
    }

    public function gruposFilhos()
    {
        return $this->hasMany(Grupo::class, 'grupo_pai_id');
    }

    public function postagens()
    {
        return $this->hasMany(Postagem::class, 'grupo_id');
    }

    public function ordem()
    {
        return $this->hasOne(Postagem::class, 'grupo_id');
    }
}
