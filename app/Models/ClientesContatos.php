<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesContatos extends Model
{
    use HasFactory;
    protected $table = 'clientes_contatos';
    protected $fillable = [
        'id_cliente',
        'nome',
        'telefone',
        'celular',
        'email',
        'observacoes'
    ];
}

    