<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telas extends Model
{
    use HasFactory;
    protected $table = 'telas';
    protected $fillable = [
        'id_grupo',
        'descricao',
        'tipo',
        'front_end',
        'back_end',
        'ux',
        'gerenciamento',
        'status',
    ];
}
