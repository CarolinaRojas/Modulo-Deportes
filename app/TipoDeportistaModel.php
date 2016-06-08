<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeportistaModel extends Model
{
    protected $table = 'TB_SRD_TIPO_DEPORTISTA';
    protected $primaryKey = 'PK_I_ID_TIPO_DEPORTISTA';
    protected $fillable = ['V_NOMBRE_TIPO_DEPORTISTA'];
}
