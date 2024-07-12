<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenacaoGeral extends Model
{
    use HasFactory;

    protected $fillable = ['ordem', 'ordenavel_type', 'ordenavel_id'];

    protected $table = 'spring.ordenacao_gerals';

    public function ordenavel()
    {
        return $this->morphTo();
    }
}
