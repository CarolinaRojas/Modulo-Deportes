<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEtapaModel extends Model
{
    protected $table = 'tb_srd_tipo_etapa';
    protected $primaryKey = 'PK_I_ID_TIPO_ETAPA';
    protected $fillable = ['V_NOMBRE_TIPO_ETAPA', 'FK_I_ID_TIPO_DEPORTISTA'];
    
     public function tipoDeportista()
    {
        return $this->hasMany('App\TipoEtapaModel', 'FK_I_ID_TIPO_DEPORTISTA');
    }
    
     public function etapas()
    {
        return $this->hasMany('App\EtapaModel', 'FK_I_ID_TIPO_ETAPA');
    }
}
