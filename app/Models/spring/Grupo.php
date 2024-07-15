<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'grupo_pai_id', 'is_grupo', 'slug'];

    protected $table = 'spring.grupos';

    protected $casts = [
        'is_grupo' => 'boolean',
    ];

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'grupo_pai_id');
    }

    public function grupos(){
        return $this->hasMany(Grupo::class, 'grupo_pai_id');
    }

    public function postagem(){
        return $this->hasMany(Postagem::class, 'grupo_id');
    }

    public function ordenacoes()
    {
        return $this->morphOne(OrdenacaoGeral::class, 'ordenavel');
    }

    public function ordenacao()
    {
        return $this->morphMany(OrdenacaoGruposPostagens::class, 'ordenavel');
    }

    public function ordenacaoGrupo()
    {
        return $this->hasMany(OrdenacaoGruposPostagens::class, 'grupo_id');
    }
}
