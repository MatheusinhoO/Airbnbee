<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informacoes_basicas extends Model
{
    protected $table = 'informacoes_basicas';

    public $timestamps = false;

    protected $fillable = [
        'propriedade_tipo',
        'acomodacoes_tipo',
        'capacidade_hospedes',
        'quartos_quantidade',
        'camas_quantidade',
        'banheiros_quantidade',
        'preco_noite',
        'politica_cancelamento',
    ];
}
