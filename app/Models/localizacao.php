<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class localizacao extends Model
{
     protected $table = 'localizacao';

    public $timestamps = false;

    protected $fillable = [
    'endereco',
    'entrega_chave_metodo',
    'informacao_estacionamento',
    'calendario_disponibilidade',
    'duracao_estadia',
    ];   
}
