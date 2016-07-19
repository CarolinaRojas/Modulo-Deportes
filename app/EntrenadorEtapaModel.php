<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntrenadorEtapaModel extends Model
{
     protected $table = 'tb_srd_entrenador_etapa';
    protected $primaryKey = 'PK_I_ID_ENTRENADOR_ETAPA';
    protected $fillable = [
        'FK_I_ID_ENTRENADOR_E',
        'FK_I_ID_ETAPA_ENTRENAMIENTO',
        ];
}
