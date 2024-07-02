<?php

namespace App\Models\react;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'react.grupos';

    protected $fillable = ['title_aside', 'slug', 'categoria_id', 'ordenacao'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'grupo_id');
    }

    public function textos(){
        return $this->hasMany(Texto::class, 'grupo_id');
    }
}
