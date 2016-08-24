<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstratoModel extends Model
{
    protected $table = 'tb_srd_estrato';
    protected $primaryKey = 'PK_I_ID_ESTRATO';
    protected $fillable = ['V_NOMBRE_ESTRATO'];
}
