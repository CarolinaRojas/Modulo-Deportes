<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DeportistaModel extends Model
{
    protected $table = 'tb_srd_deportista';
    protected $primaryKey = 'PK_I_ID_DEPORTISTA';
    protected $fillable = [
        'FK_I_ID_PERSONA',
        'FK_I_ID_ESTADO_CIVIL',
        'FK_I_ID_ESTRATO',
        'FK_I_ID_GRUPO',
        'FK_I_ID_AGRUPACION',
        'FK_I_ID_DEPORTE',
        'FK_I_ID_MODALIDAD',        
        'FK_I_ID_TIPO_DEPORTISTA',
        'FK_I_ID_BANCO',
        'FK_I_ID_DEPARTAMENTO',
        'FK_I_ID_EPS',
        'V_DIRECCION_RESIDENCIA',
        'V_TELEFONO_FIJO',
        'V_TELEFONO_CELULAR',
        'V_CORREO_ELECTRONICO',
        'B_SITUACION_MILITAR',
        'V_CANTIDAD_HIJOS',
        'V_NUMERO_CUENTA',
        'V_URL_IMG',
        'D_FECHA_INGRESO',
        'D_FECHA_RETIRO',
        'V_LOCALIDAD',
        'V_BARRIO',
        ];
    
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'FK_I_ID_PERSONA');
    }
    

    public function entrenadores()
    {
        return $this->belongsToMany('App\EntrenadorModel', 'tb_srd_deportista_entrenador', 'FK_I_ID_DEPORTISTA', 'FK_I_ID_ENTRENADOR')->withTimestamps();
    }    
    
    public function historialEtapas() {
        return $this->belongsToMany('App\EtapaModel', 'tb_srd_historial_etapa', 'FK_I_ID_DEPORTISTA_H', 'FK_I_ID_ETAPA')
                    ->withTimestamps()
                    ->withPivot('I_SMMLV')
                    //->with('FK_I_ID_TIPO_ETAPA');
                ;
    }
    
    
    public function historialEstimulos() {
        return $this->belongsToMany('App\TipoEstimuloModel', 'tb_srd_deportista_estimulo', 'FK_I_ID_DEPORTISTA_E', 'FK_I_ID_TIPO_ESTIMULO')->withTimestamps()
                ->withPivot('V_VALOR_ESTIMULO', 'I_SMMLV');
    }
    
    
    /*public function historialEtapas() {
        return $this->belongsToMany('App\EtapaModel', 'tb_srd_etapa', 'FK_I_ID_DEPORTISTA_H', 'FK_I_ID_ETAPA')->withTimestamps()
     //           ->withPivot('V_VALOR_ESTIMULO', 'I_SMMLV');
                ;
    }*/
    
    
    public function agrupacion(){
        return $this->belongsTo('App\AgrupacionModel', 'FK_I_ID_AGRUPACION');
    }
    
    public function deporte(){
        return $this->belongsTo('App\DeporteModel', 'FK_I_ID_DEPORTE');
    }
    
    public function modalidad(){
        return $this->belongsTo('App\ModalidadModel', 'FK_I_ID_MODALIDAD');
    }
    
    public function etapa_nal(){
        return $this->belongsTo('App\EtapaModel', 'FK_I_ID_ETAPA_NACIONAL');
    }
    
    public function etapa_inter(){
        return $this->belongsTo('App\EtapaModel', 'FK_I_ID_ETAPA_INTERNACIONAL');
    }
    
    
    /*public function etapa(){
        return $this->belongsTo('App\EtapaModel', 'FK_I_ID_ETAPA');
    }
    */
    public function departamento(){        
        return $this->belongsTo('App\DepartamentoModel', 'FK_I_ID_DEPARTAMENTO');
    }
    
    
    public function situacionMilitar(){
        return $this->belongsTo('App\SituacionMilitarModel', 'FK_I_ID_SITUACION_MILITAR');
    }
    
    public function banco(){
        return $this->belongsTo('App\BancoModel', 'FK_I_ID_BANCO');
    }
    
    public function tipoCuenta(){
        return $this->belongsTo('App\TipoCuentaModel', 'FK_I_ID_TIPO_CUENTA');
    }    
    
    public function localidad(){
        return $this->belongsTo('App\LocalidadModel', 'FK_I_ID_LOCALIDAD');
    }
}