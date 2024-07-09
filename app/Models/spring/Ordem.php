<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    use HasFactory;

    protected $table = 'spring.ordems';

    protected $fillable = ['ordem', 'ordenacao_type', 'ordenacao_id'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'ordenacao_id');
    }

    public function postagens()
    {
        return $this->belongsTo(Postagem::class, 'ordenacao_id');
    }
}
