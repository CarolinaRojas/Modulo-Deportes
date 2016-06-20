<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\EpsModel;
use App\LocalidadModel;
use App\Etnia;
use App\AgrupacionModel;
use App\DeporteModel;
use App\ModalidadModel;
use App\EtapaModel;
use App\EstadoCivilModel;
use App\DepartamentoModel;
use App\Pais;
use App\DeportistaModel;
use App\Persona;
use App\BarrioModel;
use App\Ciudad;
use App\Genero;
use App\BancoModel;
use App\EstratoModel;
use App\GrupoSanguineoModel;
use App\TipoDeportistaModel;
use App\SituacionMilitarModel;
use App\ClubDeportivoModel;
use App\EntrenadorModel;
use App\TallaModel; 

use App\Http\Requests\RegistroDeportistaRequest;
use App\Http\Requests\DeportivaRequest;




class DeportistaController extends Controller
{   
    public function index(){
        $eps = EpsModel::all();
        $localidad = LocalidadModel::all();
        $etnia = Etnia::all();
        $agrupacion = AgrupacionModel::all();
        $deporte = DeporteModel::all();
        $modalidad = ModalidadModel::all();
        $etapa = EtapaModel::all();
        $estadoCivil = EstadoCivilModel::all();
        $departamento = DepartamentoModel::all();
        $pais = Pais::all();
        $barrio = BarrioModel::all();
        $estrato = EstratoModel::all();
        $ciudad = Ciudad::all();
        $genero = Genero::all();
        $banco = BancoModel::all();
        $grupoSanguineo = GrupoSanguineoModel::all();
        $tipoDeportista = TipoDeportistaModel::all();
        $situacionMilitar = SituacionMilitarModel::all();
        $clubDeportivo = ClubDeportivoModel::all();        
                
        $QEntrenadores = EntrenadorModel::all();
        $entrenadores = Persona::with('entrenador')->whereIn('Id_Persona', $QEntrenadores->lists('FK_I_ID_PERSONA'))->get();
        
        $talla = TallaModel::all();
                
        $selected = array();
        $deportista = array();
        
        return view('deportista.index', 
                ['deportista' => $deportista])
                ->with(compact('selected'))
                ->with(compact('eps'))
                ->with(compact('localidad'))
                ->with(compact('etnia'))
                ->with(compact('agrupacion'))
                ->with(compact('deporte'))
                ->with(compact('modalidad'))
                ->with(compact('etapa'))
                ->with(compact('estadoCivil'))
                ->with(compact('departamento'))
                ->with(compact('pais'))
                ->with(compact('barrio'))
                ->with(compact('ciudad'))
                ->with(compact('genero'))
                ->with(compact('banco'))
                ->with(compact('estrato'))
                ->with(compact('grupoSanguineo'))
                ->with(compact('tipoDeportista'))
                ->with(compact('situacionMilitar'))
                ->with(compact('clubDeportivo'))
                ->with(compact('entrenadores'))
                ->with(compact('talla'));
    }
        
    public function datos($id){
        $persona = Persona::with('deportista')->find($id);        
        return $persona;
    }
    
    public function datosEntrenador($id){
        $entrenador = Persona::with('entrenador')->find($id);        
        return $entrenador;
    }


    public function show() {
        return response()->json(["Mensaje" => 'SHOW']);
    }
    
    public function store(RegistroDeportistaRequest $request) {        
        if ($request->ajax()) {     
            
            $deportista = new  DeportistaModel;
            $deportista->FK_I_ID_PERSONA = $request->Id_Persona;
            $deportista->FK_I_ID_ESTADO_CIVIL = $request->Estado_Civil;
            $deportista->FK_I_ID_ESTRATO = $request->Estrato;
            $deportista->FK_I_ID_GRUPO_SANGUINEO = $request->Grupo_Sanguineo;
            $deportista->FK_I_ID_AGRUPACION = $request->Agrupacion;            
            $deportista->FK_I_ID_DEPORTE = $request->Deporte;
            $deportista->FK_I_ID_MODALIDAD = $request->Modalidad;
            $deportista->FK_I_ID_ETAPA = $request->Etapa;
            $deportista->FK_I_ID_TIPO_DEPORTISTA = $request->Tipo_Deportista;
            $deportista->FK_I_ID_BANCO = $request->Banco;
            $deportista->FK_I_ID_DEPARTAMENTO = $request->Departamento;
            $deportista->FK_I_ID_EPS = $request->Eps;
            $deportista->FK_I_ID_LOCALIDAD = $request->Localidad;
            $deportista->FK_I_ID_BARRIO = $request->Barrio;
            $deportista->V_DIRECCION_RESIDENCIA = $request->Direccion_Residencia;
            $deportista->V_TELEFONO_FIJO = $request->Telefono_Fijo;
            $deportista->V_TELEFONO_CELULAR = $request->Telefono_Celular;
            $deportista->V_CORREO_ELECTRONICO = $request->Correo_Electronico;
            $deportista->V_CANTIDAD_HIJOS = $request->Hijos;
            $deportista->V_NUMERO_CUENTA = $request->Cuenta;      
            $deportista->FK_I_ID_SITUACION_MILITAR = $request->Situacion_Militar;
                        
            if($deportista->save()){
                return response()->json(["Mensaje" => "Deportista ingresado correctamente."]);
            }else{
                return response()->json(["Mensaje" => "No se ha registrado correctamente, por favor inténtelo más tarde."]);
            }
        }
    }
    
    public function create() {  
         return response()->json(["Mensaje" => 'CREATE']);
    }
    
    public function edit($id) {
        return response()->json(["Mensaje" => 'EDIT']);
    }
    
    public function update(RegistroDeportistaRequest $request, $id) {
        if ($request->ajax()){
            $deportista = DeportistaModel::find($id);
            $deportista->FK_I_ID_PERSONA = $request->Id_Persona;
            $deportista->FK_I_ID_ESTADO_CIVIL = $request->Estado_Civil;
            $deportista->FK_I_ID_ESTRATO = $request->Estrato;
            $deportista->FK_I_ID_GRUPO_SANGUINEO = $request->Grupo_Sanguineo;
            $deportista->FK_I_ID_AGRUPACION = $request->Agrupacion;            
            $deportista->FK_I_ID_DEPORTE = $request->Deporte;
            $deportista->FK_I_ID_MODALIDAD = $request->Modalidad;
            $deportista->FK_I_ID_ETAPA = $request->Etapa;
            $deportista->FK_I_ID_TIPO_DEPORTISTA = $request->Tipo_Deportista;
            $deportista->FK_I_ID_BANCO = $request->Banco;
            $deportista->FK_I_ID_DEPARTAMENTO = $request->Departamento;
            $deportista->FK_I_ID_EPS = $request->Eps;
            $deportista->FK_I_ID_LOCALIDAD = $request->Localidad;
            $deportista->FK_I_ID_BARRIO = $request->Barrio;
            $deportista->V_DIRECCION_RESIDENCIA = $request->Direccion_Residencia;
            $deportista->V_TELEFONO_FIJO = $request->Telefono_Fijo;
            $deportista->V_TELEFONO_CELULAR = $request->Telefono_Celular;
            $deportista->V_CORREO_ELECTRONICO = $request->Correo_Electronico;
            $deportista->V_CANTIDAD_HIJOS = $request->Hijos;
            $deportista->V_NUMERO_CUENTA = $request->Cuenta;                   
            $deportista->FK_I_ID_SITUACION_MILITAR = $request->Situacion_Militar;
                        
            if($deportista->save()){
                return response()->json(["Mensaje" => "Deportista actualizado correctamente."]);
            }else{
                return response()->json(["Mensaje" => "No se ha actualizado correctamente, por favor inténtelo más tarde."]);
            }
        }        
    }
    
    public function destroy($id) {
        return response()->json(["Mensaje" => 'DESTROY']);
    }
    
    public static function getDeporte(Request $request, $id) {      
        if ($request->ajax()) {
            $deportes = DeporteModel::getDeportesJSON($id);            
        }
        return response()->json($deportes);
    }
    
    public static function getModalidad(Request $request, $id) {      
        if ($request->ajax()) {
            $modalidad = ModalidadModel::getModalidadesJSON($id);            
        }
        return response()->json($modalidad);
    }
    
    public function storeDeportiva(DeportivaRequest $request, $id) {          
        if ($request->ajax()){
            $deportista = DeportistaModel::find($id);
            $deportista->FK_I_ID_CLUB_DEPORTIVO = $request->Club_Deportivo;
            $deportista->FK_I_ID_TALLA_CAMISA = $request->Talla_Camisa;
            $deportista->FK_I_ID_TALLA_ZAPATOS = $request->Talla_Zapatos;
            $deportista->FK_I_ID_TALLA_CHAQUETA = $request->Talla_Chaqueta;
            $deportista->FK_I_ID_TALLA_PANTALON = $request->Talla_Pantalon;
            
            if($deportista->save()){
                return response()->json(["Mensaje" => "Deportista actualizado correctamente."]);
            }else{
                return response()->json(["Mensaje" => "No se ha actualizado correctamente, por favor inténtelo más tarde."]);
            }
        }
    }
    
    public function storeEntrenador(Request $request) {
        if ($request->ajax()) {
            //Buscar todos los datos que hayan de este deportista
        }
        return response()->json(["Mensaje" => "storeEntrenador"]);
    }
    
}