<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDiscapacidadModel extends Model
{
    protected $table = 'tb_srd_tipo_discapacidad';
    protected $primaryKey = 'PK_I_ID_TIPO_DISCAPACIDAD';
    protected $fillable = ['V_NOMBRE_DISCAPACIDAD'];
}
