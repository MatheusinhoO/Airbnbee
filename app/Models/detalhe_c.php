<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalhe_c extends Model
{
    protected $table = 'detalhes_c';

    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descricao',
        'destaques',
        'comodidades_oferecidadas',
        'permite_fumar',
        'permite_festa',
        'permite_animais',
        'horario_check_in',
        'horario_check_out',
    ];
}
