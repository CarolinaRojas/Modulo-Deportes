<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EtapaModel extends Model
{
    protected $table = 'TB_SRD_ETAPA';
    protected $primaryKey = 'PK_I_ID_ETAPA';
    protected $fillable = ['V_NOMBRE_ETAPA'];
}
