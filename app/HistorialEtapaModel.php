<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialEtapaModel extends Model
{
    protected $table = 'tb_srd_historial_etapa';
    protected $primaryKey = 'PK_I_ID_HISTORIAL_ETAPA';
    protected $fillable = ['FK_I_ID_DEPORTISTA_H', 'FK_I_ID_ETAPA', 'I_SMMLV'];
}