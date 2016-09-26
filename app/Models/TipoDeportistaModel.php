<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDeportistaModel extends Model
{
    protected $table = 'tb_srd_tipo_deportista';
    protected $primaryKey = 'PK_I_ID_TIPO_DEPORTISTA';
    protected $fillable = ['V_NOMBRE_TIPO_DEPORTISTA'];
    
       
}