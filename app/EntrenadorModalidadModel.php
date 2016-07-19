<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntrenadorModalidadModel extends Model
{
    protected $table = 'tb_srd_entrenador_modalidad';
    protected $primaryKey = 'PK_I_ID_ENTRENADOR_MODALIDAD';
    protected $fillable = [
        'FK_I_ID_ENTRENADOR_M',
        'FK_I_ID_MODALIDAD_E',
        ];
}
