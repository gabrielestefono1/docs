<?php

namespace App\Models\spring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'grupo_pai_id', 'tipo'];

    protected $table = 'spring.grupos';

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'grupo_pai_id');
    }

    public function grupos(){
        return $this->hasMany(Grupo::class, 'grupo_pai_id');
    }
}
