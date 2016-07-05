<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuentaModel extends Model
{
    protected $table = 'TB_SRD_TIPO_CUENTA';
    protected $primaryKey = 'PK_I_ID_TIPO_CUENTA';
    protected $fillable = ['V_NOMBRE_TIPO_CUENTA'];
}
