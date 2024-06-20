<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetosPagamentos extends Model
{
    use HasFactory;
    protected $table = 'projetos_pagamento';
    protected $fillable = [
        'id_projeto',
        'valor',
        'vencimento',
        'status',
    ];
}
