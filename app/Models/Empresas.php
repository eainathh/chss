<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Empresas extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $fillable = [
        'nome'
    ];
    public function colaboradores(){
        return $this->hasMany(User::class,'id_empresa','id')->where('id_empresa',Auth::user()->id_empresa);
    }
    public function mediaSalarial($nivel){
        $colaboradores = User::where('id_empresa',Auth::user()->id_empresa)->whereHas('dados',function($q) use ($nivel){
            $q->where('funcao',$nivel);
        })->get();
        if( $colaboradores->count() > 0){
        return $colaboradores->sum('dados.valor_hora') / $colaboradores->count();
        }
        return 0;
    }
}
