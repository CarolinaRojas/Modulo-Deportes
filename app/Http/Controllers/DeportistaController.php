<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EpsModel;
use App\Models\Etnia;
use App\Models\AgrupacionModel;
use App\Models\DeporteModel;
use App\Models\ModalidadModel;
use App\Models\EstadoCivilModel;
use App\Models\Pais;
use App\Models\DeportistaModel;
use App\Models\Persona;
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\BancoModel;
use App\Models\EstratoModel;
use App\Models\GrupoSanguineoModel;
use App\Models\TipoDeportistaModel;
use App\Models\SituacionMilitarModel;
use App\Models\ClubDeportivoModel;
use App\Models\EntrenadorModel;
use App\Models\TallaModel; 
use App\Models\HistorialEtapaModel;
use App\Models\TipoEstimuloModel;
use App\Models\DeportistaEstimuloModel;
use App\Models\TipoCuentaModel;
use App\Models\TipoEtapaModel;
use App\Models\Localidad;
use App\Models\TipoTallaModel;
//use App\HistorialDeportistaEntrenadorModel;
use App\Http\Requests\RegistroDeportistaRequest;
use App\Http\Requests\DeportivaRequest;
use App\Http\Requests\EstimuloRequest;
use Validator;
use Idrd\Usuarios\Repo\PersonaInterface;
use Session;
//use Carbon\Carbon;

class DeportistaController extends Controller{
    protected $Usuario;
    protected $repositorio_personas;    

    public function __construct(PersonaInterface $repositorio_personas){
        if (isset($_SESSION['Usuario']))
            $this->Usuario = $_SESSION['Usuario'];
            $this->repositorio_personas = $repositorio_personas;
    }
    
    public function index(){
        $eps = EpsModel::all();
        $etnia = Etnia::all();
        $agrupacion = AgrupacionModel::all();
        $deporte = DeporteModel::all();
        $modalidad = ModalidadModel::all();
        $etapaNacional = array();
        $etapaInternacional = array();
        $estadoCivil = EstadoCivilModel::all();
        $pais = Pais::all();
        $estrato = EstratoModel::all();
        $ciudad = Ciudad::all();
        $genero = Genero::all();
        $banco = BancoModel::all();
        $grupoSanguineo = GrupoSanguineoModel::all();
        $tipoDeportista = TipoDeportistaModel::all();
        $situacionMilitar = SituacionMilitarModel::all();
        $clubDeportivo = ClubDeportivoModel::all();      
        $tipoEstimulo = TipoEstimuloModel::all();
        $tipocuenta = TipoCuentaModel::all();
        $localidad = Localidad::all();

        $QEntrenadores = EntrenadorModel::all();
        $entrenadores = Persona::with('entrenador')->whereIn('Id_Persona', $QEntrenadores->lists('FK_I_ID_PERSONA'))->get();

        $selected = array();
        $deportista = array();

        return view('deportista.index', 
                ['deportista' => $deportista])
                ->with(compact('selected'))
                ->with(compact('eps'))
                ->with(compact('etnia'))
                ->with(compact('agrupacion'))
                ->with(compact('deporte'))
                ->with(compact('modalidad'))
                ->with(compact('etapaNacional'))
                ->with(compact('etapaInternacional'))
                ->with(compact('estadoCivil'))
                ->with(compact('pais'))
                ->with(compact('ciudad'))
                ->with(compact('genero'))
                ->with(compact('banco'))
                ->with(compact('estrato'))
                ->with(compact('grupoSanguineo'))
                ->with(compact('tipoDeportista'))
                ->with(compact('situacionMilitar'))
                ->with(compact('clubDeportivo'))
                ->with(compact('entrenadores'))
                ->with(compact('tipoEstimulo'))
                ->with(compact('tipocuenta'))
                ->with(compact('localidad'));
    }

    public function datos($id){
        $persona = Persona::with('deportista')->find($id);        
        return $persona;
    }

    public function datosEntrenador($id){
        $entrenador = Persona::with('entrenador')->find($id);
        return $entrenador;
    }

    public function show(Request $request) {
/*
    if ($request->has('vector_modulo'))
        {   
            $vector = urldecode($request->input('vector_modulo'));
            $user_array = unserialize($vector);

        
            $_SESSION['Usuario'] = $user_array;
            $persona = $this->repositorio_personas->obtener($_SESSION['Usuario'][0]);
            $_SESSION['Usuario']['Persona'] = $persona;
            $this->Usuario = $_SESSION['Usuario'];
        } else {
            if(!isset($_SESSION['Usuario']))
                $_SESSION['Usuario'] = '';
        }
        
        if ($_SESSION['Usuario'] == '')
            return redirect()->away('http://www.idrd.gov.co/SIM_Prueba/Presentacion/');


        $deportista = $_SESSION['Usuario']['Persona'];

        return view('welcome' 
               , ['deportista' => $deportista])
                ->with(compact('selected'));

        */
        //$vector = urldecode("a%3A4%3A%7Bi%3A0%3Bs%3A4%3A%221307%22%3Bi%3A1%3Bs%3A1%3A%221%22%3Bi%3A2%3Bs%3A1%3A%221%22%3Bi%3A3%3Bs%3A1%3A%221%22%3B%7D");
        $vector = urldecode("a%3A5%3A%7Bi%3A0%3Bs%3A4%3A%221307%22%3Bi%3A1%3Bs%3A1%3A%221%22%3Bi%3A2%3Bs%3A1%3A%221%22%3Bi%3A3%3Bs%3A1%3A%221%22%3Bi%3A4%3Bs%3A1%3A%221%22%3B%7D");
            
            $user_array = unserialize($vector);

        
            $_SESSION['Usuario'] = $user_array;
            $persona = $this->repositorio_personas->obtener($_SESSION['Usuario'][0]);
            $_SESSION['Usuario']['Persona'] = $persona;
            $this->Usuario = $_SESSION['Usuario'];
      ///////////////////////
        
        if ($_SESSION['Usuario'] == '')
            return redirect()->away('http://www.idrd.gov.co/SIM_Prueba/Presentacion/');


        $deportista = $_SESSION['Usuario']['Persona'];

        return view('welcome' 
               , ['deportista' => $deportista])
                ->with(compact('selected'));

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
            $deportista->FK_I_ID_ETAPA_NACIONAL = $request->EtapaNacional;
            $deportista->FK_I_ID_ETAPA_INTERNACIONAL = $request->EtapaInternacional;
            $deportista->FK_I_ID_TIPO_DEPORTISTA = $request->Tipo_Deportista;
            if($request->Tipo_Cuenta != 3){
                $deportista->FK_I_ID_BANCO = $request->Banco;
                $deportista->V_NUMERO_CUENTA = $request->Cuenta;  
            }
            $deportista->FK_I_ID_TIPO_CUENTA = $request->Tipo_Cuenta;
            $deportista->FK_I_ID_EPS = $request->Eps;
            $deportista->FK_I_ID_LOCALIDAD = $request->Localidad;
            $deportista->V_BARRIO = $request->Barrio;
            $deportista->V_DIRECCION_RESIDENCIA = $request->Direccion_Residencia;
            $deportista->V_TELEFONO_FIJO = $request->Telefono_Fijo;
            $deportista->V_TELEFONO_CELULAR = $request->Telefono_Celular;
            $deportista->V_CORREO_ELECTRONICO = $request->Correo_Electronico;
            $deportista->V_CANTIDAD_HIJOS = $request->Hijos;
                
            $deportista->FK_I_ID_SITUACION_MILITAR = $request->Situacion_Militar;
            $deportista->D_FECHA_INGRESO = $request->Fecha_Ingreso;
            $deportista->created_at = $request->Fecha_Ingreso;
            $deportista->D_FECHA_RETIRO = $request->Fecha_Retiro;
            
            if($deportista->save()){
                $pivotPersona = Persona::find($request->Id_Persona);
                $pivotPersona->tipo()->attach(49);
                $pivotPersona->save();

                if($request->EtapaNacional){
                    $historialEtapaNacional = new HistorialEtapaModel;
                    $historialEtapaNacional->FK_I_ID_DEPORTISTA_H = $deportista->PK_I_ID_DEPORTISTA;
                    $historialEtapaNacional->FK_I_ID_ETAPA = $request->EtapaNacional;
                    $historialEtapaNacional->I_SMMLV = $request->SMMLV;      
                    $historialEtapaNacional->created_at = $request->Fecha_Ingreso;      
                    if(!$historialEtapaNacional->save()){      
                        return response()->json(["Mensaje" => "La etapa nacional del deportista no se ha ingresado correctamente, intentelo más tarde."]);
                    }
                }

                if($request->EtapaInternacional){
                    $historialEtapaInternacional  = new HistorialEtapaModel;
                    $historialEtapaInternacional->FK_I_ID_DEPORTISTA_H = $deportista->PK_I_ID_DEPORTISTA;
                    $historialEtapaInternacional->FK_I_ID_ETAPA = $request->EtapaInternacional;
                    $historialEtapaInternacional->I_SMMLV = $request->SMMLV;   
                    $historialEtapaInternacional->created_at = $request->Fecha_Ingreso;      
                    if(!$historialEtapaInternacional->save()){      
                        return response()->json(["Mensaje" => "La etapa nacional del deportista no se ha ingresado correctamente, intentelo más tarde."]);
                    }
                }
                return response()->json(["Mensaje" => "Deportista ingresado correctamente"]);                
            }else{
                return response()->json(["Mensaje" => "No se ha registrado correctamente, por favor inténtelo más tarde"]);
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

             if((int)$deportista->FK_I_ID_ETAPA_NACIONAL != (int)$request->EtapaNacional){
                $historialEtapaNal = new HistorialEtapaModel;
                $historialEtapaNal->FK_I_ID_DEPORTISTA_H = $deportista->PK_I_ID_DEPORTISTA;
                $historialEtapaNal->FK_I_ID_ETAPA = $request->EtapaNacional;
                $historialEtapaNal->I_SMMLV = $request->SMMLV;              
                $historialEtapaNal->save();
            }

            if((int)$deportista->FK_I_ID_ETAPA_INTERNACIONAL != (int)$request->EtapaInternacional){
                $historialEtapaInter = new HistorialEtapaModel;
                $historialEtapaInter->FK_I_ID_DEPORTISTA_H = $deportista->PK_I_ID_DEPORTISTA;
                $historialEtapaInter->FK_I_ID_ETAPA = $request->EtapaInternacional;
                $historialEtapaInter->I_SMMLV = $request->SMMLV;                 
                $historialEtapaInter->save();
            }

            $deportista->FK_I_ID_PERSONA = $request->Id_Persona;
            $deportista->FK_I_ID_ESTADO_CIVIL = $request->Estado_Civil;
            $deportista->FK_I_ID_ESTRATO = $request->Estrato;
            $deportista->FK_I_ID_GRUPO_SANGUINEO = $request->Grupo_Sanguineo;
            $deportista->FK_I_ID_AGRUPACION = $request->Agrupacion;          
            $deportista->FK_I_ID_DEPORTE = $request->Deporte;
            $deportista->FK_I_ID_MODALIDAD = $request->Modalidad;
            $deportista->FK_I_ID_ETAPA_NACIONAL = $request->EtapaNacional;
            $deportista->FK_I_ID_ETAPA_INTERNACIONAL = $request->EtapaInternacional;
            $deportista->FK_I_ID_TIPO_DEPORTISTA = $request->Tipo_Deportista;
            $deportista->FK_I_ID_BANCO = $request->Banco;
            $deportista->FK_I_ID_TIPO_CUENTA = $request->Tipo_Cuenta;
            $deportista->FK_I_ID_EPS = $request->Eps;
            $deportista->FK_I_ID_LOCALIDAD = $request->Localidad;
            $deportista->V_BARRIO = $request->Barrio;
            $deportista->V_DIRECCION_RESIDENCIA = $request->Direccion_Residencia;
            $deportista->V_TELEFONO_FIJO = $request->Telefono_Fijo;
            $deportista->V_TELEFONO_CELULAR = $request->Telefono_Celular;
            $deportista->V_CORREO_ELECTRONICO = $request->Correo_Electronico;
            $deportista->V_CANTIDAD_HIJOS = $request->Hijos;
            $deportista->V_NUMERO_CUENTA = $request->Cuenta;
            $deportista->FK_I_ID_SITUACION_MILITAR = $request->Situacion_Militar;
            $deportista->D_FECHA_INGRESO = $request->Fecha_Ingreso;
            $deportista->D_FECHA_RETIRO = $request->Fecha_Retiro;

            if($deportista->save()){   
                return response()->json(["Mensaje" => "Deportista actualizado correctamente"]);
            }else{
                return response()->json(["Mensaje" => "No se ha actualizado correctamente, por favor inténtelo más tarde"]);
            }
        }    
    }    

    public function destroy($id) {
        return response()->json(["Mensaje" => 'DESTROY']);
    }

    public static function getDeporte(Request $request, $id, $id_tipo_deportista) {      
        if ($request->ajax()) {
            $deportes = DeporteModel::getDeportesJSON($id, $id_tipo_deportista);            
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

            $ArrayEntrenadores=array_values(array_diff($request->ArrayEntrenador, array('')));
            $deportista = DeportistaModel::find($id);            
            $deportista->entrenadores()->sync($ArrayEntrenadores);            

            $deportista->Historialentrenadores()->attach($ArrayEntrenadores);

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

    public function deportistaEntrenadores($id){
        $deportistaE = DeportistaModel::with('entrenadores', 'entrenadores.persona')->find($id);
        return $deportistaE;
    }

    public static function getEtapasNac(Request $request, $id_tipo_etapa) {
        if ($request->ajax()) {
            $etapas = TipoEtapaModel::with('etapas')->find($id_tipo_etapa);
        }
        return($etapas->etapas);
    }

    public static function getEtapasInter(Request $request, $id_tipo_etapa) {      
        if ($request->ajax()) {
            $etapas = TipoEtapaModel::with('etapas')->find($id_tipo_etapa);
        }
        return($etapas->etapas);
    }

    public function AgregarImagen(Request $request, $idPersona){
        $validator = Validator:: make($request->all(),['Fotografia' => 'image|mimes:jpeg,png,bmp|max:1000',]);
        if ($validator->fails()) {
            return ", pero ocurrio un error en la validación de la imagen o su tamaño.";
        }else{        
            if ($request->hasFile('Fotografia')){            
                $persona = Persona::with('deportista')->find($idPersona);
                $persona->deportista['V_URL_IMG'] = '../Modulo-Deportes/storage/app/fotografias/'.$nombre = $idPersona.'_deportista.png';
                $persona->deportista->save();
                $file = $request->file('Fotografia'); 
                $nombre = $idPersona.'_deportista.png';         
                \Storage::disk('fotografias')->put($nombre,  \File::get($file));
                return " y la imagen ha sido actualizada correctamente.";
            }
            else{
                return ", la imagen no ha sido actualizada.";
            }
        }
    }    

    public function HistorialEtapa($id) {
        $deportistaH = Persona::with('deportista', 'deportista.historialEtapas')->find($id);          
        return $deportistaH;
    }

    public function AgregarEstimulo(EstimuloRequest $request) {
        if ($request->ajax()){
            $deportistaEstimulo = new DeportistaEstimuloModel;
            $deportistaEstimulo->FK_I_ID_DEPORTISTA_E = $request->Id_Deportista;
            $deportistaEstimulo->FK_I_ID_TIPO_ESTIMULO = $request->Tipo_Estimulo;
            $deportistaEstimulo->V_VALOR_ESTIMULO = $request->Valor_Estimulo;
            $deportistaEstimulo->I_SMMLV = $request->Valor_SMMLV;
            if($deportistaEstimulo->save()){
                return response()->json(["Mensaje" => "Estímulo almacenado correctamente."]);
            }else{
                return response()->json(["Mensaje" => "No se ha actualizado correctamente el estímulo, por favor inténtelo más tarde."]);
            }
        }
    }

    public function logout(){
        $_SESSION['Usuario'] = '';
        Session::set('Usuario', ''); 
        return redirect()->to('/');
    }

    public function getTallas(Request $request, $id_genero, $id_tipo) {
        if ($request->ajax()) {
            $tallas = TipoTallaModel::with('tipo_talla', 'tipo_talla.genero')->find($id_tipo);
            $talla_genero = $tallas->tipo_talla->whereIn('FK_I_ID_GENERO', [(int)$id_genero]);
        }
        return($talla_genero);
    }

    public function getOnlyTalla(Request $request, $id) {
        if ($request->ajax()) {
            $talla = TallaModel::find($id);
        }
        return($talla);
    }

    public function EntrenadorDeporte(Request $request, $id){
        $entrenadoresDeporte = EntrenadorModel::with('deporte', 'persona')->where('FK_I_ID_DEPORTE', '=', $id)->get();    
        return $entrenadoresDeporte;
    }
}