<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstimuloModel extends Model
{
    protected $table = 'TB_SRD_TIPO_ESTIMULO';
    protected $primaryKey = 'PK_I_ID_TIPO_ESTIMULO';
    protected $fillable = ['V_NOMBRE_ESTIMULO'];
}
