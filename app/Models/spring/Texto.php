<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;

    protected $table = 'spring.ordems';

    protected $fillable = ['ordem'];

    public function postagem()
    {
        return $this->belongsTo(Postagem::class, 'postagem_id');
    }
}
