<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DeportistaModel extends Model
{
    protected $table = 'tb_srd_deportista';
    protected $primaryKey = 'PK_I_ID_DEPORTISTA';
    protected $fillable = [
        'FK_I_ID_PERSONA',
        'FK_I_ID_ESTADO_CIVIL',
        'FK_I_ID_SITUACION_MILITAR',
        'FK_I_ID_ESTRATO',
        'FK_I_ID_EPS',
        'FK_I_ID_GRUPO_SANGUINEO',
        'FK_I_ID_BANCO',
        'FK_I_ID_TIPO_CUENTA',
        'FK_I_ID_TIPO_DEPORTISTA',
        'FK_I_ID_AGRUPACION',
        'FK_I_ID_DEPORTE',
        'FK_I_ID_MODALIDAD',       
        'FK_I_ID_ETAPA_NACIONAL',   
        'FK_I_ID_ETAPA_INTERNACIONAL',  
        'FK_I_ID_CLUB_DEPORTIVO',   
        'FK_I_ID_TALLA_CAMISA',   
        'FK_I_ID_TALLA_ZAPATOS',   
        'FK_I_ID_TALLA_PANTALON',   
        'FK_I_ID_TALLA_CHAQUETA',   
        'V_LOCALIDAD',
        'V_BARRIO',
        'V_DIRECCION_RESIDENCIA',
        'V_TELEFONO_FIJO',
        'V_TELEFONO_CELULAR',
        'V_CORREO_ELECTRONICO',
        'V_CANTIDAD_HIJOS',
        'V_NUMERO_CUENTA',
        'V_URL_IMG',
        'D_FECHA_INGRESO',
        'D_FECHA_RETIRO',        
        
        ];
    
    public function persona()
    {
        return $this->belongsTo('App\Models\Persona', 'FK_I_ID_PERSONA');
    }
    

    public function entrenadores()
    {
        return $this->belongsToMany('App\Models\EntrenadorModel', 'tb_srd_deportista_entrenador', 'FK_I_ID_DEPORTISTA', 'FK_I_ID_ENTRENADOR')->withTimestamps();
    }    
    
    public function historialEtapas() {
        return $this->belongsToMany('App\Models\EtapaModel', 'tb_srd_historial_etapa', 'FK_I_ID_DEPORTISTA_H', 'FK_I_ID_ETAPA')->withTimestamps()->withPivot('I_SMMLV');
    }
    
    
    public function historialEstimulos() {
        return $this->belongsToMany('App\Models\TipoEstimuloModel', 'tb_srd_deportista_estimulo', 'FK_I_ID_DEPORTISTA_E', 'FK_I_ID_TIPO_ESTIMULO')->withTimestamps()
                ->withPivot('V_VALOR_ESTIMULO', 'I_SMMLV');
    }
        
    public function agrupacion(){
        return $this->belongsTo('App\Models\AgrupacionModel', 'FK_I_ID_AGRUPACION');
    }
    
    public function deporte(){
        return $this->belongsTo('App\Models\DeporteModel', 'FK_I_ID_DEPORTE');
    }
    
    public function modalidad(){
        return $this->belongsTo('App\Models\ModalidadModel', 'FK_I_ID_MODALIDAD');
    }
    
    public function etapa_nal(){
        return $this->belongsTo('App\Models\EtapaModel', 'FK_I_ID_ETAPA_NACIONAL');
    }
    
    public function etapa_inter(){
        return $this->belongsTo('App\Models\EtapaModel', 'FK_I_ID_ETAPA_INTERNACIONAL');
    }
 
    public function departamento(){        
        return $this->belongsTo('App\Models\DepartamentoModel', 'FK_I_ID_DEPARTAMENTO');
    }
    
    
    public function situacionMilitar(){
        return $this->belongsTo('App\Models\SituacionMilitarModel', 'FK_I_ID_SITUACION_MILITAR');
    }
    
    public function banco(){
        return $this->belongsTo('App\Models\BancoModel', 'FK_I_ID_BANCO');
    }
    
    public function tipoCuenta(){
        return $this->belongsTo('App\Models\TipoCuentaModel', 'FK_I_ID_TIPO_CUENTA');
    }    
    
    public function localidad(){
        return $this->belongsTo('App\Models\Localidad', 'FK_I_ID_LOCALIDAD');
    }    
    
    public function Historialentrenadores(){
        return $this->belongsToMany('App\Models\EntrenadorModel', 'tb_srd_h_deportista_entrenador', 'FK_I_ID_DEPORTISTA_HIST', 'FK_I_ID_ENTRENADOR_HIST')->withPivot('created_at');
    }
    
    public function eps(){
        return $this->belongsTo('App\Models\EpsModel', 'FK_I_ID_EPS');
    }
    
    public function estadoCivil(){
        return $this->belongsTo('App\Models\EstadoCivilModel', 'FK_I_ID_ESTADO_CIVIL');
    }
    
    public function grupoSanguineo(){
        return $this->belongsTo('App\Models\GrupoSanguineoModel', 'FK_I_ID_GRUPO_SANGUINEO');
    }
    
    public function tipoDeportista(){
        return $this->belongsTo('App\Models\TipoDeportistaModel', 'FK_I_ID_TIPO_DEPORTISTA');
    }
    
    public function clubDeportivo(){
        return $this->belongsTo('App\Models\ClubDeportivoModel', 'FK_I_ID_CLUB_DEPORTIVO');
    }
}