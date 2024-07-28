<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $table = 'portfolio.contatos';

    protected $fillable = [
        'mensagem_inicial',
        'whatsapp',
        'email',
        'linkedin',
    ];
    
}
