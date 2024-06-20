<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelasApontamento extends Model
{
    use HasFactory;
    protected $table = 'telas_apontamento';
    protected $fillable = [
        'id_tela',
        'id_dev',
        'tipo',
        'hora_inicio',
        'hora_final',
        'total_horas',
    ];
}
