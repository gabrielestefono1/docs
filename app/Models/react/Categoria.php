<?php

namespace App\Models\react;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'react.categorias';

    protected $fillable = ['nome', 'ordenacao'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'categoria_id');
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'categoria_id');
    }
}
