<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeporteParalimpicoModel extends Model
{
    protected $table = 'tb_srd_deporte_paralimpico';
    protected $primaryKey = 'PK_I_ID_DEPORTE_PARALIMPICO';
    protected $fillable = ['FK_I_ID_DIVISION', 'FK_I_ID_TIPO_DISCAPACIDAD','V_FUNCIONALIDAD'];
}
