<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallaModel extends Model
{
    protected $table = 'tb_srd_talla';
    protected $primaryKey = 'PK_I_ID_TALLA';
    protected $fillable = ['V_NOMBRE_TALLA'];
}
