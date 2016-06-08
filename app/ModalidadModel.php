<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModalidadModel extends Model
{
    protected $table = 'TB_SRD_MODALIDAD';
    protected $primaryKey = 'PK_I_ID_MODALIDAD';
    protected $fillable = ['V_NOMBRE_MODALIDAD'];
}
