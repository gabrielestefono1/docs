<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'grupo_id', 'is_grupo'];

    protected $table = 'spring.postagems';

    protected $casts = [
        'is_grupo' => 'boolean',
    ];

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function ordenacoes()
    {
        return $this->morphOne(OrdenacaoGeral::class, 'ordenavel');
    }
}
