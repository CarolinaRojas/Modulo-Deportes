<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialDeportistaEntrenadorModel extends Model
{
    protected $table = 'tb_srd_h_deportista_entrenador';
    protected $primaryKey = 'PK_I_ID_HIST_DEP_ENT';
    protected $fillable = ['FK_I_ID_DEPORTISTA_HIST', 'FK_I_ID_ENTRENADOR_HIST'];
}