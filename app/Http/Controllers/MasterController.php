<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Idrd\Usuarios\Repo\PersonaInterface;
use Session;

use App\Models\EstadoCivilModel;
use App\Models\EstratoModel;
use App\Models\BancoModel;
use App\Models\SituacionMilitarModel;

use App\Models\EpsModel;
use App\Models\Etnia;
use App\Models\Pais;
use App\Models\Ciudad;
use App\Models\Genero;
use App\Models\GrupoSanguineoModel;

class MasterController extends Controller{
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
        $estadoCivil = EstadoCivilModel::all();
        $pais = Pais::all();
        $estrato = EstratoModel::all();
        $ciudad = Ciudad::all();
        $genero = Genero::all();
        $banco = BancoModel::all();
        $grupoSanguineo = GrupoSanguineoModel::all();
        
        $situacionMilitar = SituacionMilitarModel::all();
        
        $tipoEstimulo = TipoEstimuloModel::all();
        $tipocuenta = TipoCuentaModel::all();
        $localidad = Localidad::all();

        $QEntrenadores = EntrenadorModel::all();
        $entrenadores = Persona::with('entrenador')->whereIn('Id_Persona', $QEntrenadores->lists('FK_I_ID_PERSONA'))->get();

        $selected = array();
        $deportista = array();

        $agrupacion = array();
        $deporte = array();
        $modalidad = array();
        $etapaNacional = array();
        $etapaInternacional = array();
        $tipoDeportista = array();
        $clubDeportivo = array();

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
    

    public function logout(){
        $_SESSION['Usuario'] = '';
        Session::set('Usuario', ''); 
        return redirect()->to('/');
    }

  
}