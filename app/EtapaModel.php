<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EtapaModel extends Model
{
    protected $table = 'TB_SRD_ETAPA';
    protected $primaryKey = 'PK_I_ID_ETAPA';
    protected $fillable = ['FK_I_ID_TIPO_DEPORTISTA', 'V_NOMBRE_ETAPA', 'V_POR_ESTIMULO'];
    
     public function etapas()
    {
        return $this->hasMany('App\EtapaModel', 'FK_I_ID_TIPO_DEPORTISTA');
         //return $this->belongsTo('App\EtapaModel', 'FK_I_ID_TIPO_DEPORTISTA');
    }
    
      public static function getEtapasJSON($id){
        return EtapaModel::where('FK_I_ID_TIPO_DEPORTISTA', '=', $id)
                ->get();
    }
    
}
