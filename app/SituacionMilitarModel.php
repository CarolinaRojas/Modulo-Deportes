<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacionMilitarModel extends Model
{
    protected $table = 'TB_SRD_SITUACION_MILITAR';
    protected $primaryKey = 'PK_I_ID_SITUACION_MILITAR';
    protected $fillable = ['V_NOMBRE_SITUACION_MILITAR'];
}