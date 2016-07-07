<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeportistaEntrenadorModel extends Model
{
    protected $table = 'tb_srd_deportista_entrenador';
    protected $primaryKey = 'PK_I_ID_DEPORTISTA_ENTRENADOR';
    protected $fillable = [
        'FK_I_ID_DEPORTISTA',
        'FK_I_ID_ENTRENADOR'
        ];
}
