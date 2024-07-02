<?php

namespace App\Models\react;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'react.posts';

    protected $fillable = ['title_aside', 'slug', 'categoria_id', 'grupo_id', 'ordenacao'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function textos(){
        return $this->hasMany(Texto::class, 'post_id');
    }
}
