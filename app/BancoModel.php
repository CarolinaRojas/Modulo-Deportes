<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BancoModel extends Model
{
    protected $table = 'TB_SRD_BANCO';
    protected $primaryKey = 'PK_I_ID_BANCO';
    protected $fillable = ['V_NOMBRE_BANCO'];
}
