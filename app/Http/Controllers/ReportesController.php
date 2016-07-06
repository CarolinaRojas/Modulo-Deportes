<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\AgrupacionModel;
use App\DeporteModel;
use App\ModalidadModel;
use App\EtapaModel;
use App\DeportistaModel;
use App\Persona;
use App\Tipo;
use App\HistorialEtapaModel;
use App\TipoEstimuloModel;
use App\DeportistaEstimuloModel;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
        
    public function index(){
      return view('reportes.index');
    }

    public function show() {
        return response()->json(["Mensaje" => 'SHOW']);
    }
    
    public function store(RegistroDeportistaRequest $request) {       
        
        return response()->json(["Mensaje" => 'STORE']);
    }
    
    public function create() {  
         return response()->json(["Mensaje" => 'CREATE']);
    }
    
    public function edit($id) {
        return response()->json(["Mensaje" => 'EDIT']);
    }
    
    public function update(RegistroDeportistaRequest $request, $id) {
        return response()->json(["Mensaje" => 'UPDATE']);
    }
    
    public function destroy($id) {
        return response()->json(["Mensaje" => 'DESTROY']);
    }
    
    public function ReporteDeportistaEstimulos(Request $request, $id, $inicio, $fin) {   
       
        $datos = array($id, $inicio, $fin);     
        
        Excel::create('Historial Deportistas'.$datos[1].'-'.$datos[2], function($excel) use($datos){
           $excel->sheet('Sheetname', function($sheet) use ($datos){               
               $persona = Tipo::with('personas', 
                                     'personas.genero',
                                     'personas.pais',
                                     'personas.tipoDocumento',
                                     'personas.deportista', 
                                    // 'personas.deportista.localidad',
                                     //'personas.deportista.barrio',
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
                       )->find(47);            
             
               $i = 0;
               foreach($persona->personas as $p){                  
                   
                   $nombre = $p['Primer_Nombre'].' '.$p['Segundo_Nombre'].' '.$p['Primer_Apellido'].' '.$p['Segundo_Apellido'];
                   $agrupacion = $p->deportista->agrupacion['V_NOMBRE_AGRUPACION'];
                   $deporte = $p->deportista->deporte['V_NOMBRE_DEPORTE'];
                   $modalidad = $p->deportista->modalidad['V_NOMBRE_MODALIDAD'];
                   $etapa = $p->deportista->etapa['V_NOMBRE_ETAPA'];                   
                   $mensual = 0;
                   $transporte = 0;
                   $educacion = 0;
                   $resultados = 0;
                   $alimentacion = 0;
                   $hidratantes = 0;
                   $multidisciplina =0;
                   $monitoria = 0;
                 
                   $genero  = $p->genero['Nombre_Genero'];                   
                   $fecha_nacimiento = $p['Fecha_Nacimiento'];
                
                   $edad = date('Y', strtotime($p['Fecha_Nacimiento']));
                    if (($mes = (date('m') - date('m', strtotime($p['Fecha_Nacimiento'])))) < 0) {
                     $edad++;
                    } elseif ($mes == 0 && date('d') - date('d', strtotime($p['Fecha_Nacimiento'])) < 0) {
                     $edad++;
                    }
                    $edad_decimal = date('Y')-$edad;
                   $municipio = '';
                   $departamento = $p->deportista->departamento['Nombre_Departamento'];
                   $pais = $p->pais['Nombre_Pais'];
                   $tipo_documento = $p->tipoDocumento['Nombre_TipoDocumento'];
                   $num_documento = $p['Cedula'];
                   $sit_militar = $p->deportista->situacionMilitar['V_NOMBRE_SITUACION_MILITAR'];
                   $banco = $p->deportista->banco['V_NOMBRE_BANCO'];
                   $tipo_cuenta = $p->deportista->tipoCuenta['V_NOMBRE_TIPO_CUENTA'];
                   $num_cuenta = $p->deportista['V_NUMERO_CUENTA'];
                   $dir_residencia = $p->deportista['V_DIRECCION_RESIDENCIA'];
                   $barrio = $p->deportista['V_BARRIO'];
                   $localidad = $p->deportista['V_LOCALIDAD'];
                   $tel_fijo = $p->deportista['V_TELEFONO_FIJO'];
                   $tel_celular = $p->deportista['V_TELEFONO_CELULAR'];
                   $email = $p->deportista['V_CORREO_ELECTRONICO'];
                   $fecha_ingreso = '';
                   $fecha_retiro = '';
                   
                   $Htemp = $p->deportista->historial()->whereBetween('created_at', array( $datos[1].'-01 00:00:00' , $datos[2].'-31 23:59:59'))
                                                        ->orderBy('TB_SRD_HISTORIAL_ETAPA.created_at', 'desc')
                                                        ->limit('1')
                                                        ->get();
                   
                   $HEst = $p->deportista->historialEstimulos()->whereBetween('created_at', array( $datos[1].'-01 00:00:00' , $datos[2].'-31 23:59:59'))->get();
                   
                   foreach($Htemp as  $h){
                       $transporte = $h->pivot['I_SMMLV'] * $p->deportista->etapa['V_POR_ESTIMULO'];
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
                   
                   $per[$i] = [                        
                        'AGRUPACIÓN'=> $agrupacion,
                        'DEPORTE'=> $deporte,
                        'MODALIDAD'=> $modalidad,
                        'ETAPA'=> $etapa,
                        'ATLETA' => $nombre,
                        'GENERO' => $genero,
                        'FECHA DE NACIMIENTO' => $fecha_nacimiento,
                        'EDAD' => $edad_decimal,
                        'MUNICIPIO' => $municipio,
                        'DEPARTAMENTO' => $departamento,
                        'PAÍS' => $pais,
                        'TIPO DE DOCUMENTO' => $tipo_documento,
                        'N° DE DOCUMENTO' => $num_documento,
                        'SITUACIÓN MILITAR' => $sit_militar,
                        'BANCO' => $banco,
                        'TIPO DE CUENTA' => $tipo_cuenta,
                        'N° DE CUENTA' => $num_cuenta,
                        'DIRECCIÓN DE RESIDENCIA' => $dir_residencia,
                        'BARRIO' => $barrio,
                        'LOCALIDAD' => $localidad,
                        'TELÉFONO FIJO' => $tel_fijo,
                        'TELÉFONO CELULAR' => $tel_celular,
                        'E-MAIL' => $email,
                        'FECHA DE INGRESO' => $fecha_ingreso,
                        'FECHA DE RETIRO' => $fecha_retiro,
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
                   $i++;                           
               }                
                $sheet->fromArray($per);
           });
        })->download('xls');              
    }    
    
    
    public function HistorialIndividual(Request $request, $id, $inicio) {   
       
        $datos = array($id, $inicio);  
        Excel::create('Historial Individual'.$datos[1], function($excel) use($datos){
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
                   $Htemp = $persona->deportista->historial()->whereBetween('created_at', array( $datos[1].'-01 00:00:00' , $datos[1].'-31 23:59:59'))
                                                        ->orderBy('TB_SRD_HISTORIAL_ETAPA.created_at', 'desc')
                                                        ->limit('1')
                                                        ->get();
                   
                   $HEst = $persona->deportista->historialEstimulos()->whereBetween('created_at', array( $datos[1].'-01 00:00:00' , $datos[1].'-31 23:59:59'))->get();
                   
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
                        'PERÍODO' => $datos[1],
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
    }
}