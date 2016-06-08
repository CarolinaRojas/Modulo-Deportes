<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeporteModel extends Model
{
    protected $table = 'TB_SRD_DEPORTE';
    protected $primaryKey = 'PK_I_ID_DEPORTE';
    protected $fillable = ['V_NOMBRE_DEPORTE'];
}
