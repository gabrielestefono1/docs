<?php

namespace App\Models\react;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'react.posts';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
