<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoEtapaModel;


class EtapaModel extends Model
{
    protected $table = 'tb_srd_etapa';
    protected $primaryKey = 'PK_I_ID_ETAPA';
    protected $fillable = ['FK_I_ID_TIPO_ETAPA', 'V_NOMBRE_ETAPA', 'V_POR_ESTIMULO'];
    
    public function tipoEtapa()
    {
        return $this->hasMany('App\TipoEtapaModel', 'PK_I_ID_TIPO_ETAPA');
    }
    
    public function etapas()
    {
    //    return $this->hasMany('App\EtapaModel', 'FK_I_ID_TIPO_DEPORTISTA');
         return $this->belongsTo('App\EtapaModel', 'FK_I_ID_TIPO_DEPORTISTA');
    }
    
    public static function getEtapasJSON($id_tipo_etapa){
        //$tipo_etapa = TipoEtapaModel::with('tipoDeportista')->find($id_tipo_deportista);
        $etapas = EtapaModel::with('tipoEtapa')->find($id_tipo_etapa)->get();
        return $etapas;
        
        //$etapas = EtapaModel::with('tipoEtapa')->find($id);
        //return EtapaModel::where('FK_I_ID_TIPO_ETAPA', '=', $id)
    //            ->get();
    }
    
}
/* $persona = Tipo::with('personas', 
                                     'personas.genero',
                                     'personas.pais',
                                     'personas.tipoDocumento',
                                     'personas.deportista', 
                                     'personas.deportista.banco',
                                     'personas.deportista.tipoCuenta',
                                     'personas.deportista.situacionMilitar',
                                     'personas.deportista.departamento',
                                     'personas.deportista.historial', 
                                     'personas.deportista.historialEstimulos',
                                     'personas.deportista.agrupacion',
                                     'personas.deportista.deporte',
                                     'personas.deportista.modalidad',
                                     'personas.deportista.etapa'
                       )->find(49);            */