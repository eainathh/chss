<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackPessoas extends Model
{
    use HasFactory;

    protected $table = 'feedback_pessoas';

    protected $fillable= [
        'nome',
        'email',
        'telefone'
    ];

    public function FeedbackRespostas()
    {
        return $this->hasMany(FeedbackRespostas::class, 'id_pessoa');
    }
}
