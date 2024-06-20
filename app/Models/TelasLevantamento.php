<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelasLevantamento extends Model
{
    use HasFactory;
    protected $table = 'telas_levantamento';
    protected $fillable = [
        'id_projeto',
        'markup',
        'custo_hora_front_end',
        'total_hora_front_end',
        'sub_total_front_end',
        'total_front_end',
        'custo_hora_back_end',
        'total_hora_back_end',
        'sub_total_back_end',
        'total_back_end',
        'custo_hora_ux',
        'total_hora_ux',
        'sub_total_ux',
        'total_ux',
        'custo_hora_gerenciamento',
        'total_hora_gerenciamento',
        'sub_total_gerenciamento',
        'total_gerenciamento',
        'total_horas',
        'sub_total',
        'total',
    ];

    public function grupos(){
        return $this->hasMany(TelasGrupos::class,'id_levantamento','id');
    }
}
