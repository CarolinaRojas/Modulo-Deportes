<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoCivilModel extends Model
{
    protected $table = 'tb_srd_estado_civil';
    protected $primaryKey = 'PK_I_ID_ESTADO_CIVIL';
    protected $fillable = ['V_NOMBRE_ESTADO_CIVIL'];
}
