<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntrenadorModel extends Model
{
    protected $table = 'tb_srd_entrenador';
    protected $primaryKey = 'PK_I_ID_ENTRENADOR';
    protected $fillable = [
        'FK_I_ID_PERSONA',
        'V_TELEFONO_FIJO',
        'V_TELEFONO_CELULAR',
        'V_CORREO_ELECTRONICO',
        'V_URL_IMG',
        ];
    
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'FK_I_ID_PERSONA');
    }
    
    public function EntrenadoEtapaEnt() {
        return $this->belongsToMany('App\EtapaEntrenamientoModel', 'tb_srd_entrenador_etapa', 'FK_I_ID_ENTRENADOR_E', 'FK_I_ID_ETAPA_ENTRENAMIENTO')->withTimestamps();
    }
    
    public function EntrenadoModalidad() {
        return $this->belongsToMany('App\ModalidadModel', 'tb_srd_entrenador_modalidad', 'FK_I_ID_ENTRENADOR_M', 'FK_I_ID_MODALIDAD_E')->withTimestamps();
    }    
}
