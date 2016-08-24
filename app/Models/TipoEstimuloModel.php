<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstimuloModel extends Model
{
    protected $table = 'tb_srd_tipo_estimulo';
    protected $primaryKey = 'PK_I_ID_TIPO_ESTIMULO';
    protected $fillable = ['V_NOMBRE_ESTIMULO'];
}
