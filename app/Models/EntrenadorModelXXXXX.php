<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrenadorModel extends Model
{
    protected $table = 'tb_srd_entrenador';
    protected $primaryKey = 'PK_I_ID_ENTRENADOR';
    protected $fillable = [
        'FK_I_ID_PERSONA',
        'FK_I_ID_AGRUPACION',
        'FK_I_ID_DEPORTE',
        'V_TELEFONO_FIJO',
        'V_TELEFONO_CELULAR',        
        'V_CORREO_ELECTRONICO',
        'V_URL_IMG',
        ];
    
    public function persona()
    {
        return $this->belongsTo('App\Models\Persona', 'FK_I_ID_PERSONA');
    }
    
    public function EntrenadorEtapaEnt() {
        return $this->belongsToMany('App\Models\EtapaEntrenamientoModel', 'tb_srd_entrenador_etapa', 'FK_I_ID_ENTRENADOR_E', 'FK_I_ID_ETAPA_ENTRENAMIENTO')->withTimestamps();
    }
    
    public function EntrenadorModalidad() {
        return $this->belongsToMany('App\Models\ModalidadModel', 'tb_srd_entrenador_modalidad', 'FK_I_ID_ENTRENADOR_M', 'FK_I_ID_MODALIDAD_E')->withTimestamps();
    }    
    
    public function Agrupacion(){
        return $this->belongsTo('App\Models\AgrupacionModel', 'FK_I_ID_AGRUPACION');
    }
    
    public function Deporte(){
        return $this->belongsTo('App\Models\DeporteModel', 'FK_I_ID_DEPORTE');
    }
    public function etapasEntrenador() {
        return $this->belongsToMany('App\Models\EtapaEntrenamientoModel', 'tb_srd_entrenador_etapa', 'FK_I_ID_ENTRENADOR_E', 'FK_I_ID_ETAPA_ENTRENAMIENTO');
    }
    
    public function modalidadesEntrenador() {
        return $this->belongsToMany('App\Models\ModalidadModel', 'tb_srd_entrenador_modalidad', 'FK_I_ID_ENTRENADOR_M', 'FK_I_ID_MODALIDAD_E');
    }
    
    public function Historialdeportistas()
    {
        return $this->belongsToMany('App\Models\DeportistaModel', 'tb_srd_deportista_entrenador', 'FK_I_ID_ENTRENADOR', 'FK_I_ID_DEPORTISTA');
    }
}
