<?php

namespace App\Models;

use App\Models\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        'id_empresa',
        'nome',
        'razao_social',
        'cnpj',
        'email',
        'telefone',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'status',
        'observacoes',
    ];
    protected static function boot()
    {
        parent::boot();
        return static::addGlobalScope(new EmpresaScope);
    }
    public function contatos(){
        return $this->hasMany(ClientesContatos::class,'id_cliente','id');
    }
    public function projetos(){
        return $this->hasMany(Projetos::class,'id_cliente','id');
    }
}
