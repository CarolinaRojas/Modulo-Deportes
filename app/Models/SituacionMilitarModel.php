<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituacionMilitarModel extends Model
{
    protected $table = 'tb_srd_situacion_militar';
    protected $primaryKey = 'PK_I_ID_SITUACION_MILITAR';
    protected $fillable = ['V_NOMBRE_SITUACION_MILITAR'];
}
