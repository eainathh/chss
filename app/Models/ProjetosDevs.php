<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetosDevs extends Model
{
    use HasFactory;
    protected $table = 'projetos_devs';
    protected $fillable = [
        'id_projeto',
        'id_dev'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','id_dev');
    }
}
