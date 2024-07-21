<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'grupo_id',
        'is_grupo',
        'slug',
        'titulo_anterior',
        'slug_anterior',
        'titulo_proximo',
        'slug_proximo',
    ];

    protected $table = 'spring.postagems';

    protected $casts = [
        'is_grupo' => 'boolean',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function ordenacoes()
    {
        return $this->morphOne(OrdenacaoGeral::class, 'ordenavel');
    }

    public function ordenacao()
    {
        return $this->morphMany(OrdenacaoGruposPostagens::class, 'ordenavel');
    }

    public function textos()
    {
        return $this->hasMany(Texto::class, 'postagem_id');
    }

    public function ordenacao_textos()
    {
        return $this->hasOne(OrdenacaoTextos::class, 'postagem_id');
    }
}
