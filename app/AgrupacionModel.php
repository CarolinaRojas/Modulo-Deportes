<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgrupacionModel extends Model
{
    protected $table = 'TB_SRD_AGRUPACION';
    protected $primaryKey = 'PK_I_ID_AGRUPACION';
    protected $fillable = ['V_NOMBRE_AGRUPACION'];    
}
