<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelasGrupos extends Model
{
    use HasFactory; 
    protected $table = 'telas_grupos';
    protected $fillable = [
      'id_levantamento',
      'descricao'  
    ];

    public function telas(){
      return $this->hasMany(Telas::class,'id_grupo','id');
    }
}
