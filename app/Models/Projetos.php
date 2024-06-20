<?php

namespace App\Models;

use App\Models\Scopes\EmpresaScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;
    protected $table = 'projetos';
    protected $fillable = [
        'id_empresa',
        'nome',
        'codigo',
        'descricao',
        'id_cliente',
        'valor',
        'id_vendedor',
    ];

    protected static function boot()
    {
        parent::boot();
        return static::addGlobalScope(new EmpresaScope);
    }
    public function pagamentos(){
        return $this->hasMany(ProjetosPagamentos::class,'id_projeto','id');
    }
    public function levantamento(){
        return $this->hasOne(TelasLevantamento::class,'id_projeto','id');
    }
    public function projetosDevs(){
        return $this->hasMany(ProjetosDevs::class,'id_projeto','id');
    }
}
