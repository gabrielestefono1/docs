<?php

namespace App\Models\react;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;
    protected $table = 'react.textos';

    public function posts(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function grupos(){
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}
