<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenacaoGruposPostagens extends Model
{
    use HasFactory;

    protected $fillable = ['grupo_id', 'ordenavel_type', 'ordenavel_id'];

    protected $table = 'spring.ordenacao_grupos_postagens';
}
