<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetosDocumentos extends Model
{
    use HasFactory;
    protected $table = 'projetos_documentos';
    protected $fillable = [
        'id_projeto',
        'tipo_documento',
        'arquivo',
    ];
}
