<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosColaboradores extends Model
{
    use HasFactory;
    protected $table = 'dados_colaborador';
    protected $casts  = ['data_contratacao'=>'date'];
    protected $fillable = [
        'id_user',
        'salario',
        'horas_mes',
        'valor_hora',
        'funcao',
        'nivel',
        'foto',
        'observacoes',
        'data_contratacao',
        'regime',
    ];
}
