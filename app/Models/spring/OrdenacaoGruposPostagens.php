<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenacaoGruposPostagens extends Model
{
    use HasFactory;

    protected $fillable = ['grupo_id', 'ordenavel_type', 'ordenavel_id', 'ordem'];

    protected $table = 'spring.ordenacao_grupos_postagens';

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function ordenavel()
    {
        return $this->morphTo();
    }
}
