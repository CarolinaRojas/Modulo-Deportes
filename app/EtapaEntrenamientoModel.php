<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EtapaEntrenamientoModel extends Model
{
    protected $table = 'tb_srd_etapa_entrenamiento';
    protected $primaryKey = 'PK_I_ID_ETAPA_ENTRENAMIENTO';
    protected $fillable = ['V_NOMBRE_ETAPA_ENTRENAMIENTO'];
}
