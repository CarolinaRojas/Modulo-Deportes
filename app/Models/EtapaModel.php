<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TipoEtapaModel;


class EtapaModel extends Model
{
    protected $table = 'tb_srd_etapa';
    protected $primaryKey = 'PK_I_ID_ETAPA';
    protected $fillable = ['FK_I_ID_TIPO_ETAPA', 'V_NOMBRE_ETAPA', 'V_POR_ESTIMULO'];
    
    public function tipoEtapa()
    {
        return $this->hasMany('App\Models\TipoEtapaModel', 'PK_I_ID_TIPO_ETAPA');
    }
    
    public function etapas()
    {
         return $this->belongsTo('App\Models\EtapaModel', 'FK_I_ID_TIPO_DEPORTISTA');
    }
    
    public static function getEtapasJSON($id_tipo_etapa){
        $etapas = EtapaModel::with('tipoEtapa')->find($id_tipo_etapa)->get();
        return $etapas;
    }
    
}