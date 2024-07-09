<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    protected $table = 'spring.ordems';

    protected $fillable = ['ordem'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function ordem()
    {
        return $this->belongsTo(Ordem::class, 'ordem_id');
    }

    public function textos()
    {
        return $this->hasMany(Texto::class, 'postagem_id');
    }
}
