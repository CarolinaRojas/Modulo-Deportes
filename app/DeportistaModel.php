<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DeportistaModel extends Model
{
    protected $table = 'TB_SRD_DEPORTISTA';
    protected $primaryKey = 'PK_I_ID_DEPORTISTA';
    protected $fillable = [
        'FK_I_ID_PERSONA',
        'FK_I_ID_ESTADO_CIVIL',
        'FK_I_ID_ESTRATO',
        'FK_I_ID_GRUPO',
        'FK_I_ID_AGRUPACION',
        'FK_I_ID_DEPORTE',
        'FK_I_ID_MODALIDAD',
        'FK_I_ID_ETAPA',
        'FK_I_ID_TIPO_DEPORTISTA',
        'FK_I_ID_BANCO',
        'FK_I_ID_DEPARTAMENTO',
        'FK_I_ID_EPS',
        'FK_I_ID_LOCALIDAD',
        'V_DIRECCION_RESIDENCIA',
        'V_BARRIO',
        'V_TELEFONO_FIJO',
        'V_TELEFONO_CELULAR',
        'V_CORREO_ELECTRONICO',
        'B_SITUACION_MILITAR',
        'V_CANTIDAD_HIJOS',
        'V_NUMERO_CUENTA',
        'V_URL_IMG'        
        ];
    
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'FK_I_ID_PERSONA');
    }
    

    public function entrenadores()
    {
        return $this->belongsToMany('App\EntrenadorModel', 'TB_SRD_DEPORTISTA_ENTRENADOR', 'FK_I_ID_DEPORTISTA', 'FK_I_ID_ENTRENADOR')->withTimestamps();
    }    
    
    public function historial() {
        return $this->belongsToMany('App\EtapaModel', 'TB_SRD_HISTORIAL_ETAPA', 'FK_I_ID_DEPORTISTA_H', 'FK_I_ID_ETAPA')->withTimestamps();
     }
}
