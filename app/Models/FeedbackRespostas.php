<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FeedbackRespostas extends Model
{
    use HasFactory;

    protected $table = 'feedback_respostas';

    protected $fillable = [
        'positivos',
        'negativos',
        'duvidas',
        'sugestoes',
        'id_etapa',
        'id_pessoa',   
    ];

    protected $attributes = [
        'id_etapa' => 1,
    ];

    public function etapa() 
    {
        return $this->belongsTo(FeedbackEtapas::class, 'id_etapa');
    }

    public function pessoa()
    {
        return $this->belongsTo(FeedbackPessoas::class, 'id_pessoa');
    }
}
