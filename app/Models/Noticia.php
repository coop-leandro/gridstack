<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = ['titulo', 'conteudo', 'position'];
    
    protected $casts = [
        'position' => 'array',
    ];
}
