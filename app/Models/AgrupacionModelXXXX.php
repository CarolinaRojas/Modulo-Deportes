<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgrupacionModel extends Model
{
    protected $table = 'tb_srd_agrupacion';
    protected $primaryKey = 'PK_I_ID_AGRUPACION';
    protected $fillable = ['V_NOMBRE_AGRUPACION'];    
}
