<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    use HasFactory;

    protected $table = 'spring.conteudos';

    protected $fillable = ['ordem', 'conteudable_type', 'conteudable_id'];

    public function conteudable() {
        return $this->morphTo();
    }
}
