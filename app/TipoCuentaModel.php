<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuentaModel extends Model
{
    protected $table = 'tb_srd_tipo_cuenta';
    protected $primaryKey = 'PK_I_ID_TIPO_CUENTA';
    protected $fillable = ['V_NOMBRE_TIPO_CUENTA'];
}
