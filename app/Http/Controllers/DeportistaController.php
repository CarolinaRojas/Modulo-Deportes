<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\EpsModel;
use App\Etnia;
use App\AgrupacionModel;
use App\DeporteModel;
use App\ModalidadModel;
use App\EtapaModel;
use App\EstadoCivilModel;
use App\Pais;
use App\DeportistaModel;
use App\Persona;
use App\Tipo;
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
use App\HistorialEtapaModel;
use App\TipoEstimuloModel;
use App\DeportistaEstimuloModel;
use App\TipoCuentaModel;

use App\Http\Requests\RegistroDeportistaRequest;
use App\Http\Requests\DeportivaRequest;
use App\Http\Requests\EstimuloRequest;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;

//use PHPExcel_Worksheet_PageSetup;
/*use PHPExcel_IOFactory;
use Maatwebsite\Excel\Classes\PHPExcel;*/


class DeportistaController extends Controller{
    
    public function index(){
        $eps = EpsModel::all();
      //  $localidad = LocalidadModel::all();
        $etnia = Etnia::all();
        $agrupacion = AgrupacionModel::all();
        $deporte = DeporteModel::all();
        $modalidad = ModalidadModel::all();
        $etapa = EtapaModel::all();
        $estadoCivil = EstadoCivilModel::all();
 //       $departamento = DepartamentoModel::all();
        $pais = Pais::all();
      //  $barrio = BarrioModel::all();
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
                
        $QEntrenadores = EntrenadorModel::all();
        $entrenadores = Persona::with('entrenador')->whereIn('Id_Persona', $QEntrenadores->lists('FK_I_ID_PERSONA'))->get();
        $talla = TallaModel::all();
                
        $selected = array();
        $deportista = array();
        
        return view('deportista.index', 
                ['deportista' => $deportista])
                ->with(compact('selected'))
                ->with(compact('eps'))
               // ->with(compact('localidad'))
                ->with(compact('etnia'))
                ->with(compact('agrupacion'))
                ->with(compact('deporte'))
                ->with(compact('modalidad'))
                ->with(compact('etapa'))
                ->with(compact('estadoCivil'))
          //      ->with(compact('departamento'))
                ->with(compact('pais'))
              // ->with(compact('barrio'))
                ->with(compact('ciudad'))
                ->with(compact('genero'))
                ->with(compact('banco'))
                ->with(compact('estrato'))
                ->with(compact('grupoSanguineo'))
                ->with(compact('tipoDeportista'))
                ->with(compact('situacionMilitar'))
                ->with(compact('clubDeportivo'))
                ->with(compact('entrenadores'))
                ->with(compact('talla'))
                ->with(compact('tipoEstimulo'))
                ->with(compact('tipocuenta'));
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
            $deportista->FK_I_ID_TIPO_CUENTA = $request->Tipo_Cuenta;
            //$deportista->FK_I_ID_DEPARTAMENTO = $request->Departamento;
            $deportista->FK_I_ID_EPS = $request->Eps;
            $deportista->V_LOCALIDAD = $request->Localidad;
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
                $pivotPersona = Persona::find($request->Id_Persona);
                $pivotPersona->tipo()->attach(47);
                $pivotPersona->save();
                
                $historialEtapa = new HistorialEtapaModel;
                $historialEtapa->FK_I_ID_DEPORTISTA_H = $deportista->PK_I_ID_DEPORTISTA;
                $historialEtapa->FK_I_ID_ETAPA = $deportista->FK_I_ID_ETAPA;
                $historialEtapa->I_SMMLV = $request->SMMLV;                 
                if($historialEtapa->save()){      
                    return response()->json(["Mensaje" => "Deportista ingresado correctamente."]);
                }else{
                    
                    return response()->json(["Mensaje" => "No se ha registrado correctamente, por favor inténtelo más tarde."]);
                }
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
            
            if((int)$deportista->FK_I_ID_ETAPA == (int)$request->Etapa){
            }else{
                $historialEtapa = new HistorialEtapaModel;
                $historialEtapa->FK_I_ID_DEPORTISTA_H = $deportista->PK_I_ID_DEPORTISTA;
                $historialEtapa->FK_I_ID_ETAPA = $deportista->FK_I_ID_ETAPA;
                $historialEtapa->I_SMMLV = $request->SMMLV;                 
                $historialEtapa->save();
            }
            
            
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
            $deportista->FK_I_ID_TIPO_CUENTA = $request->Tipo_Cuenta;
            $deportista->FK_I_ID_EPS = $request->Eps;
            $deportista->V_LOCALIDAD = $request->Localidad;
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
                return response()->json(["Mensaje" => "Deportista actualizado correctamente!!."]);
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
            
            $ArrayEntrenadores=array_values(array_diff($request->ArrayEntrenador, array('')));
            $deportista = DeportistaModel::find($id);
            $deportista->entrenadores()->sync($ArrayEntrenadores);
           
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
    
    public static function getEtapas(Request $request, $id) {      
        if ($request->ajax()) {
            $etapas = EtapaModel::getEtapasJSON($id);            
        }
        return response()->json($etapas);
    }
        
    public function AgregarImagen(Request $request, $idPersona){
        if ($request->hasFile('Fotografia')){            
            $persona = Persona::with('deportista')->find($idPersona);
            $persona->deportista['V_URL_IMG'] = '../Modulo-Deportes/storage/app/fotografias/'.$nombre = $idPersona.'_deportista.png';
            $persona->deportista->save();
            $file = $request->file('Fotografia'); 
            $nombre = $idPersona.'_deportista.png';         
            \Storage::disk('fotografias')->put($nombre,  \File::get($file));
            return "Archivo almacenado correctamente";
        }
        else{
            return "No se encontro archivo.";
        }
    }
    
    public function HistorialEtapa($id) {
        
        $deportistaH = Persona::with('deportista', 'deportista.historial')->find($id);          
        return $deportistaH;
    }
    
    public function HistorialIndividual(Request $request, $id, $inicio, $fin) {   
       
        $datos = array($id, $inicio, $fin);
    //    dd($datos);
        
        /*Excel::create('Historial Individual', function($excel) use($datos){
           $excel->sheet('Sheetname', function($sheet) use ($datos){               
               $persona = Persona::with('deportista', 'deportista.historial')->find($datos[0]);
               
               $historialResolucion = $persona->deportista->historial()
                                                        ->select('TB_SRD_ETAPA.V_NOMBRE_ETAPA', 'TB_SRD_ETAPA.V_POR_ESTIMULO', 'I_SMMLV', 'created_at')
                                                        ->whereBetween('created_at', array( $datos[1].' 00:00:00' , $datos[2].' 23:59:59'))
                                                        ->orderBy('TB_SRD_HISTORIAL_ETAPA.created_at', 'desc')
                                                        ->limit('1')
                                                        ->get();
               $historialEstimulos = $persona->deportista->historialEstimulos()
                                                        ->select('TB_SRD_TIPO_ESTIMULO.PK_I_ID_TIPO_ESTIMULO', 'TB_SRD_TIPO_ESTIMULO.V_NOMBRE_ESTIMULO', 'TB_SRD_DEPORTISTA_ESTIMULO.*')
                                                        ->whereBetween('created_at', array( $datos[1].' 00:00:00' , $datos[2].' 23:59:59'))
                                                        ->get();
               $j = 0;
               $mensual = 0;
               $educacion = 0;
               $resultados = 0;
               $alimenticios = 0;
               $hidratantes = 0;
               $multidisciplinarios = 0;
               $monitorias = 0;
               for($j = 0; $j < count($historialEstimulos); $j++){
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 1){
                     $mensual = $mensual + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 2){
                     $educacion = $educacion + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 3){
                     $resultados = $resultados + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 4){
                     $alimenticios = $alimenticios + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 5){
                     $hidratantes = $hidratantes + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 6){
                     $multidisciplinarios = $multidisciplinarios + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 6){
                     $monitorias = $monitorias + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }   
               }
               $i = 0; 
                for($i = 0; $i < count($historialResolucion); $i++){
                    
                    $transporte = ($historialResolucion[$i]['I_SMMLV']*$historialResolucion[$i]['V_POR_ESTIMULO']);
                    $nombre = $persona['Primer_Nombre'].' '.$persona['Segundo_Nombre'].' '.$persona['Primer_Apellido'].' '.$persona['Segundo_Apellido'];
                    
                    $mes = explode(' ', $historialResolucion[$i]['created_at']);                    
                    $fecha = explode('-', $mes[0]);
                    
                    
                    $a[$i] = ['N°' => $i+1,
                              'ATLETA'=> $nombre,
                              'MES'=> $fecha[0].'-'.$fecha[1],
                              'MODALIDAD'=> '',
                              'ETAPA'=> $historialResolucion[$i]['V_NOMBRE_ETAPA'],
                              'TRANSPORTE'=> $transporte,
                              'ESTÍMULO MENSUAL'=> $mensual,
                              'EDUCACIÓN'=> $educacion,
                              'ESTÍMULO POR RESULTADOS'=> $resultados,
                              'ALIMENTACIÓN'=> $alimenticios,
                              'HIDRATANTES AYUDAS Y COMPLEMENTOS'=> $hidratantes,
                              'INVERSIÓN MULTIDISCIPLINARIA'=> $multidisciplinarios,
                              'MONITORIAS'=> $monitorias,
                              'TOTAL'=> $transporte + $mensual + $educacion + $resultados + $alimenticios + $hidratantes + $multidisciplinarios + $monitorias
                        ];
                }                
                $info = collect($a);
                $sheet->fromArray($info);
           });
        })->download('xls');*/
        
        Excel::create('Historial Individual', function($excel) use($datos){
           $excel->sheet('Sheetname', function($sheet) use ($datos){               
               $persona = Persona::with( 
                                     'deportista', 
                                     'deportista.historial', 
                                     'deportista.historialEstimulos',
                                     'deportista.agrupacion',
                                     'deportista.deporte',
                                     'deportista.modalidad',
                                     'deportista.etapa'
                       )->find($datos[0]);            
               
                              
                   $nombre = $persona->Primer_Nombre.' '.$persona->Segundo_Nombre.' '.$persona->Primer_Apellido.' '.$persona->Segundo_Apellido;
                   $agrupacion = $persona->deportista->agrupacion['V_NOMBRE_AGRUPACION'];
                   $deporte = $persona->deportista->deporte['V_NOMBRE_DEPORTE'];
                   $modalidad = $persona->deportista->modalidad['V_NOMBRE_MODALIDAD'];
                   $etapa = $persona->deportista->etapa['V_NOMBRE_ETAPA'];                   
                   $mensual = 0;
                   $transporte = 0;
                   $educacion = 0;
                   $resultados = 0;
                   $alimentacion = 0;
                   $hidratantes = 0;
                   $multidisciplina =0;
                   $monitoria = 0;
                   $Htemp = $persona->deportista->historial()->whereBetween('created_at', array( $datos[1].'-01 00:00:00' , $datos[2].'-31 23:59:59'))
                                                        ->orderBy('TB_SRD_HISTORIAL_ETAPA.created_at', 'desc')
                                                        ->limit('1')
                                                        ->get();
                   
                   $HEst = $persona->deportista->historialEstimulos()->whereBetween('created_at', array( $datos[1].'-01 00:00:00' , $datos[2].'-31 23:59:59'))->get();
                   
                   foreach($Htemp as  $h){
                       $transporte = $h->pivot['I_SMMLV'] * $persona->deportista->etapa['V_POR_ESTIMULO'];
                   }
                   
                   foreach($HEst as  $hE){
                       if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 1){
                           $mensual = $mensual + $hE->pivot['V_VALOR_ESTIMULO'];
                       }
                       if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 2){
                           $educacion = $educacion + $hE->pivot['V_VALOR_ESTIMULO'];
                       }
                       if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 3){
                           $resultados = $resultados + $hE->pivot['V_VALOR_ESTIMULO'];
                       }
                       if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 4){
                           $alimentacion = $alimentacion + $hE->pivot['V_VALOR_ESTIMULO'];
                       }
                       if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 5){
                           $hidratantes = $hidratantes + $hE->pivot['V_VALOR_ESTIMULO'];
                       }
                       if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 6){
                           $multidisciplina = $multidisciplina + $hE->pivot['V_VALOR_ESTIMULO'];
                       }
                       if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 7){
                           $monitoria = $monitoria + $hE->pivot['V_VALOR_ESTIMULO'];
                       }
                   }
                   $total = $transporte + $educacion + $resultados + $alimentacion + $hidratantes + $multidisciplina + $monitoria;
                   
                   $per[0] = [
                        'PERÍODO' => 'ASA',
                        'ATLETA' => $nombre,
                        'AGRUPACIÓN'=> $agrupacion,
                        'DEPORTE'=> $deporte,
                        'MODALIDAD'=> $modalidad,
                        'ETAPA'=> $etapa,
                        'TRANSPORTE'=> $transporte,
                        'ESTÍMULO MENSUAL'=> $mensual,
                        'EDUCACIÓN'=> $educacion,
                        'ESTÍMULO POR RESULTADOS'=> $resultados,
                        'ALIMENTACIÓN'=> $alimentacion,
                        'HIDRATANTES AYUDAS Y COMPLEMENTOS'=> $hidratantes,
                        'INVERSIÓN MULTIDISCIPLINARIA'=> $multidisciplina,
                        'MONITORIAS'=> $monitoria,
                        'TOTAL'=> $total,
                           ];
                                       
                      
                $sheet->fromArray($per);
           });
        })->download('xls');
           
            /*   foreach ($persona as $p ){
                   $per = ($persona->personas);
                   foreach($per as $d){
                       dd($d);
                   }
                   
               }*/
               
             //  dd($persona);
               
               /*$historialResolucion = $persona->deportista->historial()
                                                        ->select('TB_SRD_ETAPA.V_NOMBRE_ETAPA', 'TB_SRD_ETAPA.V_POR_ESTIMULO', 'I_SMMLV', 'created_at')
                                                        ->whereBetween('created_at', array( $datos[1].' 00:00:00' , $datos[2].' 23:59:59'))
                                                        ->orderBy('TB_SRD_HISTORIAL_ETAPA.created_at', 'desc')
                                                        ->limit('1')
                                                        ->get();
               $historialEstimulos = $persona->deportista->historialEstimulos()
                                                        ->select('TB_SRD_TIPO_ESTIMULO.PK_I_ID_TIPO_ESTIMULO', 'TB_SRD_TIPO_ESTIMULO.V_NOMBRE_ESTIMULO', 'TB_SRD_DEPORTISTA_ESTIMULO.*')
                                                        ->whereBetween('created_at', array( $datos[1].' 00:00:00' , $datos[2].' 23:59:59'))
                                                        ->get();
               $j = 0;
               $mensual = 0;
               $educacion = 0;
               $resultados = 0;
               $alimenticios = 0;
               $hidratantes = 0;
               $multidisciplinarios = 0;
               $monitorias = 0;
               for($j = 0; $j < count($historialEstimulos); $j++){
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 1){
                     $mensual = $mensual + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 2){
                     $educacion = $educacion + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 3){
                     $resultados = $resultados + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 4){
                     $alimenticios = $alimenticios + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 5){
                     $hidratantes = $hidratantes + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 6){
                     $multidisciplinarios = $multidisciplinarios + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }
                   if($historialEstimulos[$j]['PK_I_ID_TIPO_ESTIMULO'] == 6){
                     $monitorias = $monitorias + $historialEstimulos[$j]['V_VALOR_ESTIMULO'];
                   }   
               }
               $i = 0; 
                for($i = 0; $i < count($historialResolucion); $i++){
                    
                    $transporte = ($historialResolucion[$i]['I_SMMLV']*$historialResolucion[$i]['V_POR_ESTIMULO']);
                    $nombre = $persona['Primer_Nombre'].' '.$persona['Segundo_Nombre'].' '.$persona['Primer_Apellido'].' '.$persona['Segundo_Apellido'];
                    
                    $mes = explode(' ', $historialResolucion[$i]['created_at']);                    
                    $fecha = explode('-', $mes[0]);
                    
                    
                    $a[$i] = ['N°' => $i+1,
                              'ATLETA'=> $nombre,
                              'MES'=> $fecha[0].'-'.$fecha[1],
                              'MODALIDAD'=> '',
                              'ETAPA'=> $historialResolucion[$i]['V_NOMBRE_ETAPA'],
                              'TRANSPORTE'=> $transporte,
                              'ESTÍMULO MENSUAL'=> $mensual,
                              'EDUCACIÓN'=> $educacion,
                              'ESTÍMULO POR RESULTADOS'=> $resultados,
                              'ALIMENTACIÓN'=> $alimenticios,
                              'HIDRATANTES AYUDAS Y COMPLEMENTOS'=> $hidratantes,
                              'INVERSIÓN MULTIDISCIPLINARIA'=> $multidisciplinarios,
                              'MONITORIAS'=> $monitorias,
                              'TOTAL'=> $transporte + $mensual + $educacion + $resultados + $alimenticios + $hidratantes + $multidisciplinarios + $monitorias
                        ];
                }                
                $info = collect($a);*/
              
    }
    
    public function AgregarEstimulo(EstimuloRequest $request) {
        if ($request->ajax()){
            $deportistaEstimulo = new DeportistaEstimuloModel;
            $deportistaEstimulo->FK_I_ID_DEPORTISTA_E = $request->Id_Deportista;
            $deportistaEstimulo->FK_I_ID_TIPO_ESTIMULO = $request->Tipo_Estimulo;
            $deportistaEstimulo->V_VALOR_ESTIMULO = $request->Valor_Estimulo;
            $deportistaEstimulo->I_SMMLV = 689454;
            if($deportistaEstimulo->save()){
                return response()->json(["Mensaje" => "Estímulo almacenado correctamente."]);
            }else{
                return response()->json(["Mensaje" => "No se ha actualizado correctamente el estímulo, por favor inténtelo más tarde."]);
            }
        }
    }
}

