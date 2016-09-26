<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BancoModel extends Model
{
    protected $table = 'tb_srd_banco';
    protected $primaryKey = 'PK_I_ID_BANCO';
    protected $fillable = ['V_NOMBRE_BANCO'];
}
