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
        'whatsapp_icon',
        'whatsapp_link',
        'email',
        'email_icon',
        'email_link',
        'linkedin',
        'linkedin_icon',
        'linkedin_link'
    ];

    protected $casts = [
        'whatsapp_icon' => 'array',
        'email_icon' => 'array',
        'linkedin_icon' => 'array',
    ];
    
}
