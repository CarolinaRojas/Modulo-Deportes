<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarrioModel extends Model
{
    protected $table = 'TB_SRD_BARRIO';
    protected $primaryKey = 'PK_I_ID_BARRIO';
    protected $fillable = ['V_NOMBRE_BARRIO', 'I_COD_UPZ'];
}
