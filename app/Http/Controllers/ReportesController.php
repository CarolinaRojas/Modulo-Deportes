<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgrupacionModel;
use App\DeporteModel;
use App\ModalidadModel;
use App\Persona;
use App\Tipo;
use App\Genero;
use App\Localidad;
use App\TipoDeportistaModel;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class ReportesController extends Controller
{
    public function index(){
      return view('reportes.index');
    }

    public function update(RegistroDeportistaRequest $request, $id) {
        return response()->json(["Mensaje" => 'UPDATE']);
    }

    public function destroy($id) {
        return response()->json(["Mensaje" => 'DESTROY']);
    }

    public function ReporteDeportistaEstimulos(Request $request, $id, $inicio, $fin) {          

        $datos = array($id, $inicio, $fin);     

        Excel::create('Historial Deportistas('.$datos[1].'&'.$datos[2].')', function($excel) use($datos){
           $excel->sheet('Sheetname', function($sheet) use ($datos){               
               $persona = Tipo::with('personas', 
                                     'personas.genero',
                                     'personas.pais',
                                     'personas.tipoDocumento',
                                     'personas.etnia',
                                     'personas.deportista', 
                                     'personas.deportista.banco',
                                     'personas.deportista.tipoCuenta',
                                     'personas.deportista.situacionMilitar',                                   
                                     'personas.deportista.agrupacion',
                                     'personas.deportista.deporte',
                                     'personas.deportista.modalidad',
                                     'personas.deportista.historialEstimulos',
                                     'personas.deportista.historialEtapas',
                                     'personas.deportista.localidad',
                                     'personas.deportista.eps',
                                     'personas.deportista.estadoCivil',
                                     'personas.deportista.grupoSanguineo',
                                     'personas.deportista.tipoDeportista',
                                     'personas.deportista.clubDeportivo',
                                     'personas.deportista.entrenadores.persona'
                       )->find(49);  
               if(count($persona->personas) > 0){
                 $y = 0;
                 foreach($persona->personas as $p){                       
                     $nombre = $p['Primer_Nombre'].' '.$p['Segundo_Nombre'].' '.$p['Primer_Apellido'].' '.$p['Segundo_Apellido'];
                     $agrupacion = $p->deportista->agrupacion['V_NOMBRE_AGRUPACION'];
                     $deporte = $p->deportista->deporte['V_NOMBRE_DEPORTE'];
                     $modalidad = $p->deportista->modalidad['V_NOMBRE_MODALIDAD'];
                     $etapa_nal = $p->deportista->etapa_nal['V_NOMBRE_ETAPA'];
                     $etapa_inter = $p->deportista->etapa_inter['V_NOMBRE_ETAPA'];                   
                     $sumaEtapas = 0;      
                     $educacion = 0;
                     $resultados = 0;
                     $alimentacion = 0;
                     $hidratantes = 0;
                     $multidisciplina =0;
                     $monitoria = 0;
                     $total = 0;                     

                     $genero  = $p->genero['Nombre_Genero'];                   
                     $fecha_nacimiento = $p['Fecha_Nacimiento'];
                  
                     $edad = date('Y', strtotime($p['Fecha_Nacimiento']));
                      if (($mes = (date('m') - date('m', strtotime($p['Fecha_Nacimiento'])))) < 0) {
                       $edad++;
                      } elseif ($mes == 0 && date('d') - date('d', strtotime($p['Fecha_Nacimiento'])) < 0) {
                       $edad++;
                      }
                     $edad_decimal = date('Y')-$edad;                   
                     $pais = $p->pais['Nombre_Pais'];
                     $tipo_documento = $p->tipoDocumento['Nombre_TipoDocumento'];
                     $num_documento = $p['Cedula'];
                     $sit_militar = $p->deportista->situacionMilitar['V_NOMBRE_SITUACION_MILITAR'];
                     $banco = $p->deportista->banco['V_NOMBRE_BANCO'];
                     $tipo_cuenta = $p->deportista->tipoCuenta['V_NOMBRE_TIPO_CUENTA'];
                     $num_cuenta = $p->deportista['V_NUMERO_CUENTA'];
                     $dir_residencia = $p->deportista['V_DIRECCION_RESIDENCIA'];
                     $barrio = $p->deportista['V_BARRIO'];
                     $localidad = $p->deportista->localidad['Nombre_Localidad'];
                     $tel_fijo = $p->deportista['V_TELEFONO_FIJO'];
                     $tel_celular = $p->deportista['V_TELEFONO_CELULAR'];
                     $email = $p->deportista['V_CORREO_ELECTRONICO'];
                     $fecha_ingreso = $p->deportista['D_FECHA_INGRESO'];
                     $fecha_retiro = $p->deportista['D_FECHA_RETIRO'];  
                     
                     $eps = $p->deportista->eps['Nombre_Eps'];  
                     $estadoCivil = $p->deportista->estadoCivil['V_NOMBRE_ESTADO_CIVIL'];  
                     $num_hijos = $p->deportista['V_CANTIDAD_HIJOS'];
                     $grupoSanguineo = $p->deportista->grupoSanguineo['Nombre_GrupoSanguineo'];
                     $etnia = $p->etnia['Nombre_Etnia'];
                     $club = $p->deportista->clubDeportivo['V_NOMBRE_CLUB_DEPORTIVO'];
                     $tCamisa = $p->deportista['FK_I_ID_TALLA_CAMISA'];
                     $tChaqueta = $p->deportista['FK_I_ID_TALLA_CHAQUETA'];
                     $tPantalon = $p->deportista['FK_I_ID_TALLA_PANTALON'];
                     $tZapatos = $p->deportista['FK_I_ID_TALLA_ZAPATOS'];
                     $tipoDeportista = $p->deportista->tipoDeportista['V_NOMBRE_TIPO_DEPORTISTA'];
                     $entrenadores = '';
                     
                     foreach ($p->deportista->entrenadores as $Ent){
                         $NomEntrenadores = '';
                         $NomEntrenadores = $Ent->persona['Primer_Nombre'].' '.$Ent->persona['Segundo_Nombre'].' '.$Ent->persona['Primer_Apellido'].' '.$Ent->persona['Segundo_Apellido'];
                         $entrenadores = $entrenadores.', '.$NomEntrenadores;
                     }
                     $entrenadores = (substr($entrenadores, 2));
                     
                     $d1 = explode('-', $datos[1]);
                     $d2 = explode('-', $datos[2]);                     

                     $sd = $d2[1] - $d1[1];
                     $fecha = date($datos[1]);  

                     for($i = 0; $i <= $sd; $i++){                       

                          $nuevafecha = date('Y-m', strtotime ( '+'.($i).' month' , strtotime ( $fecha ) ) );                          

                          $historialEtapas = $p->deportista->historialEtapas()->whereBetween('created_at', array( $nuevafecha.'-01 00:00:00' , $nuevafecha.'-31 23:59:59'))->orderBy('tb_srd_historial_etapa.created_at', 'desc')->get();                          

                          $EtapaInternacional = $historialEtapas->whereIn('FK_I_ID_TIPO_ETAPA', [2, 4])->first();
                          $EtapaNacional = $historialEtapas->whereIn('FK_I_ID_TIPO_ETAPA', [1, 3])->first();
                          if($EtapaNacional){
                              $Nacional = ($EtapaNacional->pivot['I_SMMLV']* $EtapaNacional['V_POR_ESTIMULO']);
                          }else{
                              $Nacional = 0;
                          }                                                 

                          if($EtapaInternacional){
                              $Internacional = ($EtapaInternacional->pivot['I_SMMLV']* $EtapaInternacional['V_POR_ESTIMULO']); 
                          }else{
                              $Internacional = 0;
                          }
                          $sumaEtapas = $sumaEtapas + $Nacional + $Internacional;

                          $Estimulos = $p->deportista->historialEstimulos()->whereBetween('created_at', array( $nuevafecha.'-01 00:00:00' , $nuevafecha.'-31 23:59:59'))->get();                        
                          foreach($Estimulos as  $hE){
                              if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 1){
                                  $educacion = $educacion + $hE->pivot['V_VALOR_ESTIMULO'];
                              }
                              if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 2){
                                  $resultados = $resultados + $hE->pivot['V_VALOR_ESTIMULO'];
                              }
                              if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 3){
                                  $alimentacion = $alimentacion + $hE->pivot['V_VALOR_ESTIMULO'];
                              }
                              if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 4){
                                  $hidratantes = $hidratantes + $hE->pivot['V_VALOR_ESTIMULO'];
                              }
                              if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 5){
                                  $multidisciplina = $multidisciplina + $hE->pivot['V_VALOR_ESTIMULO'];
                              }
                              if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 6){
                                  $monitoria = $monitoria + $hE->pivot['V_VALOR_ESTIMULO'];
                              }
                          }
                      }    
                      $total = $sumaEtapas + $educacion + $resultados + $alimentacion + $hidratantes + $multidisciplina + $monitoria;               
                      $per[$y] = [ 
                          'N°' => $y+1,
                          'DEPORTISTA' => strtoupper($nombre),
                          'GENERO' => strtoupper($genero),
                          'FECHA DE NACIMIENTO' => $fecha_nacimiento,
                          'EDAD' => $edad_decimal,                   
                          'PAÍS DE NACIMIENTO' => strtoupper($pais),
                          'TIPO DE DOCUMENTO' => strtoupper($tipo_documento),
                          'N° DE DOCUMENTO' =>  $num_documento,                                                    
                          'DIRECCIÓN DE RESIDENCIA' => strtoupper($dir_residencia),
                          'BARRIO' => strtoupper($barrio),
                          'LOCALIDAD' => strtoupper($localidad),
                          'TELÉFONO FIJO' => $tel_fijo,
                          'TELÉFONO CELULAR' => $tel_celular,
                          'E-MAIL' => $email,
                          'EPS'=> strtoupper($eps),
                          'ESTADO CIVIL'=> strtoupper($estadoCivil),
                          'N° DE HIJOS'=> $num_hijos,
                          'SITUACIÓN MILITAR' => strtoupper($sit_militar),
                          'GRUPO SANGUINEO'=> strtoupper($grupoSanguineo), 
                          'GRUPO ÉTNICO'=> strtoupper($etnia),
                          'BANCO' => strtoupper($banco),
                          'TIPO DE CUENTA' => strtoupper($tipo_cuenta),
                          'N° DE CUENTA' => $num_cuenta,
                          'CLUB DEPORTIVO'=> strtoupper($club),
                          'ENTRENADORES (Actual(es))'=> strtoupper($entrenadores),
                          'TALLA CAMISA'=> strtoupper($tCamisa),
                          'TALLA CHAQUETA'=> strtoupper($tChaqueta),
                          'TALLA PANTALÓN'=> strtoupper($tPantalon),
                          'TALLA ZAPATOS'=> strtoupper($tZapatos),
                          'TIPO DE DEPORTISTA'=> strtoupper($tipoDeportista),
                          'AGRUPACIÓN'=> strtoupper($agrupacion),
                          'DEPORTE'=> strtoupper($deporte),
                          'MODALIDAD'=> strtoupper($modalidad),
                          'ETAPA NACIONAL (Actual)'=> strtoupper($etapa_nal),
                          'ETAPA INTERNACIONAL  (Actual)'=> strtoupper($etapa_inter),                          
                          'FECHA DE INGRESO' => $fecha_ingreso,
                          'FECHA DE RETIRO' => $fecha_retiro,
                          'TRANSPORTE'=> $sumaEtapas,
                          'EDUCACIÓN'=> $educacion,
                          'ESTÍMULO POR RESULTADOS'=> $resultados,
                          'ALIMENTACIÓN'=> $alimentacion,
                          'HIDRATANTES AYUDAS Y COMPLEMENTOS'=> $hidratantes,
                          'INVERSIÓN MULTIDISCIPLINARIA'=> $multidisciplina,
                          'MONITORIAS'=> $monitoria,
                          'TOTAL'=> $total,
                             ];
                     $y++;     
                 }
              }else{
                  $per[0] = ['RESPUESTA' => 'No hay registros!'];
              }
               $sheet->freezeFirstRow();
                $sheet->setAllBorders('thin');
                $sheet->setHeight(1, 50); 
                $sheet->setColumnFormat(array('E' => '0,0', 'Q' => '0,0', 'Z' => '0,0', 'AA' => '0,0', 'AB' => '0,0', 'AC' => '0,0', 'AL' => '$0,0', 'AM' => '$0,0', 
                                              'AN' => '$0,0', 'AO' => '$0,0', 'AP' => '$0,0', 'AQ' => '$0,0', 'AR' => '$0,0', 'AS' => '$0,0', ));

                $sheet->cells('A1:AS1', function($cells) {
                     $cells->setBackground('#CCFFFF');
                     $cells->setFont(array(
                         'family'     => 'Arial',
                         'size'       => '14',
                         'bold'       =>  true
                     ));

                     $cells->setBorder(array(
                         'top'   => array(
                             'style' => 'solid'
                         ),
                     ));
                     $cells->setAlignment('center');
                 });                  

                $sheet->cells('AS1:AS1', function($cells) {
                    $cells->setBackground('#FF0000');
                });                
                
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
                                     'deportista.historialEtapas', 
                                     'deportista.historialEstimulos',
                                     'deportista.agrupacion',
                                     'deportista.deporte',
                                     'deportista.modalidad',
                                     'deportista.localidad',
                                     'deportista.eps',
                                     'deportista.estadoCivil',
                                     'deportista.grupoSanguineo',
                                     'deportista.tipoDeportista',
                                     'deportista.clubDeportivo',
                                     'deportista.entrenadores.persona'
                       )->find($datos[0]);            
               
                $nombre = $persona->Primer_Nombre.' '.$persona->Segundo_Nombre.' '.$persona->Primer_Apellido.' '.$persona->Segundo_Apellido;
                $agrupacion = $persona->deportista->agrupacion['V_NOMBRE_AGRUPACION'];
                $deporte = $persona->deportista->deporte['V_NOMBRE_DEPORTE'];
                $modalidad = $persona->deportista->modalidad['V_NOMBRE_MODALIDAD'];
                $etapa = $persona->deportista->etapa['V_NOMBRE_ETAPA'];   
                $transporte = 0;
                $educacion = 0;
                $resultados = 0;
                $alimentacion = 0;
                $hidratantes = 0;
                $multidisciplina =0;
                $monitoria = 0;
                $total = 0;
                $sumaEtapas = 0;
                $genero  = $persona->genero['Nombre_Genero'];                   
                $fecha_nacimiento = $persona['Fecha_Nacimiento'];               
                $edad = date('Y', strtotime($persona['Fecha_Nacimiento']));                

                if (($mes = (date('m') - date('m', strtotime($persona['Fecha_Nacimiento'])))) < 0) {
                    $edad++;
                } elseif ($mes == 0 && date('d') - date('d', strtotime($persona['Fecha_Nacimiento'])) < 0) {
                    $edad++;
                }
                $edad_decimal = date('Y')-$edad;                   
                $pais = $persona->pais['Nombre_Pais'];
                $tipo_documento = $persona->tipoDocumento['Nombre_TipoDocumento'];
                $num_documento = $persona['Cedula'];
                $sit_militar = $persona->deportista->situacionMilitar['V_NOMBRE_SITUACION_MILITAR'];
                $banco = $persona->deportista->banco['V_NOMBRE_BANCO'];
                $tipo_cuenta = $persona->deportista->tipoCuenta['V_NOMBRE_TIPO_CUENTA'];
                $num_cuenta = $persona->deportista['V_NUMERO_CUENTA'];
                $dir_residencia = $persona->deportista['V_DIRECCION_RESIDENCIA'];
                $barrio = $persona->deportista['V_BARRIO'];
                $localidad = $persona->deportista->localidad['Nombre_Localidad'];
                $tel_fijo = $persona->deportista['V_TELEFONO_FIJO'];
                $tel_celular = $persona->deportista['V_TELEFONO_CELULAR'];
                $email = $persona->deportista['V_CORREO_ELECTRONICO'];
                $fecha_ingreso = $persona->deportista['D_FECHA_INGRESO'];
                $fecha_retiro = $persona->deportista['D_FECHA_RETIRO'];
                
                
                $eps = $persona->deportista->eps['Nombre_Eps'];  
                $estadoCivil = $persona->deportista->estadoCivil['V_NOMBRE_ESTADO_CIVIL'];  
                $num_hijos = $persona->deportista['V_CANTIDAD_HIJOS'];
                $grupoSanguineo = $persona->deportista->grupoSanguineo['Nombre_GrupoSanguineo'];
                $etnia = $persona->etnia['Nombre_Etnia'];
                $club = $persona->deportista->clubDeportivo['V_NOMBRE_CLUB_DEPORTIVO'];
                $tCamisa = $persona->deportista['FK_I_ID_TALLA_CAMISA'];
                $tChaqueta = $persona->deportista['FK_I_ID_TALLA_CHAQUETA'];
                $tPantalon = $persona->deportista['FK_I_ID_TALLA_PANTALON'];
                $tZapatos = $persona->deportista['FK_I_ID_TALLA_ZAPATOS'];
                $tipoDeportista = $persona->deportista->tipoDeportista['V_NOMBRE_TIPO_DEPORTISTA'];
                $entrenadores = '';

                foreach ($persona->deportista->entrenadores as $Ent){
                    $NomEntrenadores = '';
                    $NomEntrenadores = $Ent->persona['Primer_Nombre'].' '.$Ent->persona['Segundo_Nombre'].' '.$Ent->persona['Primer_Apellido'].' '.$Ent->persona['Segundo_Apellido'];
                    $entrenadores = $entrenadores.', '.$NomEntrenadores;
                }
                $entrenadores = (substr($entrenadores, 2));


                $historialEtapas = $persona->deportista->historialEtapas()->whereBetween('created_at', array( $datos[1].'-01 00:00:00' , $datos[1].'-31 23:59:59'))->orderBy('tb_srd_historial_etapa.created_at', 'desc')->get();
                if(count($historialEtapas) == 0){
                    $historialEtapas = $persona->deportista->historialEtapas()->whereBetween('created_at', array( '1900-01-01 00:00:00' , $datos[1].'-31 23:59:59'))->orderBy('tb_srd_historial_etapa.created_at', 'desc')->get();
                    $EtapaInternacional = $historialEtapas->whereIn('FK_I_ID_TIPO_ETAPA', [2, 4])->first();
                    $EtapaNacional = $historialEtapas->whereIn('FK_I_ID_TIPO_ETAPA', [1, 3])->first();                       
                }else{
                    $EtapaInternacional = $historialEtapas->whereIn('FK_I_ID_TIPO_ETAPA', [2, 4])->first();
                    $EtapaNacional = $historialEtapas->whereIn('FK_I_ID_TIPO_ETAPA', [1, 3])->first();                       
                }

                if($EtapaNacional){
                    $Nacional = ($EtapaNacional->pivot['I_SMMLV'] * $EtapaNacional['V_POR_ESTIMULO']);
                    $LNacional = $EtapaNacional['V_NOMBRE_ETAPA'];
                }else{
                    $Nacional = 0;
                    $LNacional = 'No asignada';
                }
                if($EtapaInternacional){
                    $Internacional = ($EtapaInternacional->pivot['I_SMMLV']* $EtapaInternacional['V_POR_ESTIMULO']); 
                    $LInternacional = $EtapaInternacional['V_NOMBRE_ETAPA'];
                }else{
                    $LInternacional = 'No asignada';
                    $Internacional = 0;
                }
                
                $sumaEtapas = $sumaEtapas + $Nacional + $Internacional;                       

                $Estimulos = $persona->deportista->historialEstimulos()->whereBetween('created_at', array( $datos[1].'-01 00:00:00' , $datos[1].'-31 23:59:59'))->get();                        
                foreach($Estimulos as  $hE){
                    if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 1){
                        $educacion = $educacion + $hE->pivot['V_VALOR_ESTIMULO'];
                    }
                    if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 2){
                        $resultados = $resultados + $hE->pivot['V_VALOR_ESTIMULO'];
                    }
                    if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 3){
                        $alimentacion = $alimentacion + $hE->pivot['V_VALOR_ESTIMULO'];
                    }
                    if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 4){
                        $hidratantes = $hidratantes + $hE->pivot['V_VALOR_ESTIMULO'];
                    }
                    if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 5){
                        $multidisciplina = $multidisciplina + $hE->pivot['V_VALOR_ESTIMULO'];
                    }
                    if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 6){
                        $monitoria = $monitoria + $hE->pivot['V_VALOR_ESTIMULO'];
                    }
                }                                    
                $total = $sumaEtapas + $educacion + $resultados + $alimentacion + $hidratantes + $multidisciplina + $monitoria;                                       

                $per[0] = [
                    'PERÍODO' => $datos[1],
                    'DEPORTISTA' => strtoupper($nombre),
                    'GENERO' => strtoupper($genero),
                    'FECHA DE NACIMIENTO' => $fecha_nacimiento,
                    'EDAD' => $edad_decimal,                   
                    'PAÍS DE NACIMIENTO' => strtoupper($pais),
                    'TIPO DE DOCUMENTO' => strtoupper($tipo_documento),
                    'N° DE DOCUMENTO' =>  $num_documento,                                                    
                    'DIRECCIÓN DE RESIDENCIA' => strtoupper($dir_residencia),
                    'BARRIO' => strtoupper($barrio),
                    'LOCALIDAD' => strtoupper($localidad),
                    'TELÉFONO FIJO' => $tel_fijo,
                    'TELÉFONO CELULAR' => $tel_celular,
                    'E-MAIL' => $email,
                    'EPS'=> strtoupper($eps),
                    'ESTADO CIVIL'=> strtoupper($estadoCivil),
                    'N° DE HIJOS'=> $num_hijos,
                    'SITUACIÓN MILITAR' => strtoupper($sit_militar),
                    'GRUPO SANGUINEO'=> strtoupper($grupoSanguineo), 
                    'GRUPO ÉTNICO'=> strtoupper($etnia),
                    'BANCO' => strtoupper($banco),
                    'TIPO DE CUENTA' => strtoupper($tipo_cuenta),
                    'N° DE CUENTA' => $num_cuenta,
                    'CLUB DEPORTIVO'=> strtoupper($club),
                    'ENTRENADORES (Actual(es))'=> strtoupper($entrenadores),
                    'TALLA CAMISA'=> strtoupper($tCamisa),
                    'TALLA CHAQUETA'=> strtoupper($tChaqueta),
                    'TALLA PANTALÓN'=> strtoupper($tPantalon),
                    'TALLA ZAPATOS'=> strtoupper($tZapatos),
                    'TIPO DE DEPORTISTA'=> strtoupper($tipoDeportista),
                    'AGRUPACIÓN'=> strtoupper($agrupacion),
                    'DEPORTE'=> strtoupper($deporte),
                    'MODALIDAD'=> strtoupper($modalidad),
                    'ETAPA NACIONAL'=> strtoupper($LNacional),
                    'ETAPA INTERNACIONAL'=> strtoupper($LInternacional),
                    'FECHA DE INGRESO' => $fecha_ingreso,
                    'FECHA DE RETIRO' => $fecha_retiro,
                    'TRANSPORTE'=> $sumaEtapas,
                    'EDUCACIÓN'=> $educacion,
                    'ESTÍMULO POR RESULTADOS'=> $resultados,
                    'ALIMENTACIÓN'=> $alimentacion,
                    'HIDRATANTES AYUDAS Y COMPLEMENTOS'=> $hidratantes,
                    'INVERSIÓN MULTIDISCIPLINARIA'=> $multidisciplina,
                    'MONITORIAS'=> $monitoria,
                    'TOTAL'=> $total,
                        ];

                $sheet->freezeFirstRow();
                $sheet->setAllBorders('thin');
                $sheet->setHeight(1, 50); 
                $sheet->setColumnFormat(array('E' => '0,0', 'Q' => '0,0', 'Z' => '0,0', 'AA' => '0,0', 'AB' => '0,0', 'AC' => '0,0', 'AL' => '$0,0', 'AM' => '$0,0', 
                                              'AN' => '$0,0', 'AO' => '$0,0', 'AP' => '$0,0', 'AQ' => '$0,0', 'AR' => '$0,0', 'AS' => '$0,0', ));

                $sheet->cells('A1:AS1', function($cells) {
                     $cells->setBackground('#CCFFFF');
                     $cells->setFont(array(
                         'family'     => 'Arial',
                         'size'       => '14',
                         'bold'       =>  true
                     ));

                     $cells->setBorder(array(
                         'top'   => array(
                             'style' => 'solid'
                         ),
                     ));
                     $cells->setAlignment('center');
                 });                  

                $sheet->cells('AS1:AS1', function($cells) {
                    $cells->setBackground('#FF0000');
                });                

                $sheet->fromArray($per);
           });
        })->download('xls');
    }    

    public function Generos(Request $request){
        if ($request->ajax()) {
            $generos = Genero::all();            
        }
        return $generos;
    }

    public function Localidades(Request $request){
        if ($request->ajax()) {
            $localidades = Localidad::all();            
        }
        return $localidades;
    }

    public function Agrupaciones(Request $request){
        if ($request->ajax()) {
            $agrupaciones = AgrupacionModel::all();            
        }
        return $agrupaciones;
    }

    public function Deportes(Request $request, $id){
        if ($request->ajax()) {
            $deportes = DeporteModel::getDeportesJSON($id);            
        }
        return response()->json($deportes);
    }

    public function Modalidades(Request $request, $id){
        if ($request->ajax()) {
            $modalidades = ModalidadModel::getModalidadesJSON($id);            
        }
        return response()->json($modalidades);
    }

    public function TipoDeportistas(Request $request){
        if ($request->ajax()) {
            $tipoDeportistas = TipoDeportistaModel::all();
        }
        return response()->json($tipoDeportistas);
    }

    public function ValidacionReporteGeneral(Request $request){
        $fecha = date('Y-m');         
         if ($request->ajax()) {      
            $validator = Validator:: make($request->all(),[
                        'Genero' => 'required_without_all:Edad,Localidad,Tipo_Deportista,EtapaNacional,EtapaInternacional,Agrupacion,Deporte,Modalidad',
                        'Edad' => 'required_without_all:Genero,Localidad,Tipo_Deportista,EtapaNacional,EtapaInternacional,Agrupacion,Deporte,Modalidad|numeric',
                        'Localidad' => 'required_without_all:Genero,Edad,Tipo_Deportista,EtapaNacional,EtapaInternacional,Agrupacion,Deporte,Modalidad',
                        'Tipo_Deportista' => 'required_without_all:Genero,Edad,Localidad,EtapaNacional,EtapaInternacional,Agrupacion,Deporte,Modalidad',
                        'EtapaNacional' => 'required_without_all:Genero,Edad,Localidad,Tipo_Deportista,EtapaInternacional,Agrupacion,Deporte,Modalidad',
                        'EtapaInternacional' => 'required_without_all:Genero,Edad,Localidad,Tipo_Deportista,EtapaNacional,Agrupacion,Deporte,Modalidad',
                        'Agrupacion' => 'required_without_all:Genero,Edad,Localidad,Tipo_Deportista,EtapaNacional,EtapaInternacional,Deporte,Modalidad',
                        'Deporte' => 'required_without_all:Genero,Edad,Localidad,Tipo_Deportista,EtapaNacional,EtapaInternacional,Agrupacion,Modalidad',
                        'Modalidad' => 'required_without_all:Genero,Edad,Localidad,Tipo_Deportista,EtapaNacional,EtapaInternacional,Agrupacion,Deporte',
                        'inicio' => 'required|date',
                        'fin' => 'required|date|between: inicio,'.$fecha,
                    ]);
            if ($validator->fails()) {
                return($validator->errors());
            }else{        
                return response()->json(["Mensaje" => 'validator ok', "datos" => $request->all()]);
            }
         }   
    }        

    public function DescargaRepoGeneral(Request $request, $id, $datosRep){
        $datosRep = explode(',', $datosRep);        
        $datos = array($id, $datosRep[6], $datosRep[7], $datosRep[0], $datosRep[1], $datosRep[2], $datosRep[3], $datosRep[4], $datosRep[5], $datosRep[8], $datosRep[9], $datosRep[10]);
        Excel::create('Historial Deportistas('.$datos[1].'&'.$datos[2].')', function($excel) use($datos){
           $excel->sheet('Sheetname', function($sheet) use ($datos){               
               $persona = Tipo::with('personas', 
                                     'personas.genero',
                                     'personas.pais',
                                     'personas.tipoDocumento',
                                     'personas.deportista', 
                                     'personas.deportista.banco',
                                     'personas.deportista.tipoCuenta',
                                     'personas.deportista.situacionMilitar',                                   
                                     'personas.deportista.agrupacion',
                                     'personas.deportista.deporte',
                                     'personas.deportista.modalidad',
                                     'personas.deportista.historialEstimulos',
                                     'personas.deportista.historialEtapas',
                                     'personas.deportista.localidad',
                                     'personas.deportista.eps',
                                     'personas.deportista.estadoCivil',
                                     'personas.deportista.grupoSanguineo',
                                     'personas.deportista.tipoDeportista',
                                     'personas.deportista.clubDeportivo',
                                     'personas.deportista.entrenadores.persona'
                       )
                       ->find($datos[0]);  
               $ArrayDescarga = $persona->personas;
               
                //Genero
                if($datos[3]){
                   $id_genero = (int)$datos[3];
                   $ArrayDescarga = $persona->personas->filter(function ($persona) use ($id_genero) {
                        return $persona->Id_Genero == $id_genero;
                    });
                }               

                //Edad
                if($datos[4]){
                    $id_edad = (int)$datos[4];
                    $anio = date('Y')-$id_edad;
                    $ArrayDescarga = $persona->personas->filter(function ($persona) use ($anio) {
                        return $persona->Fecha_Nacimiento > $anio.'-01-01' && $persona->Fecha_Nacimiento < $anio.'-12-31';
                    });
                }                

               //Localidad
                if($datos[5]){
                   $id_localidad = $datos[5];
                   $ArrayDescarga = $persona->personas->filter(function ($persona)  use ($id_localidad){
                        return $persona->deportista['FK_I_ID_LOCALIDAD'] == $id_localidad;
                    });
                }                

                //Agrupacion
                if($datos[6]){
                   $id_agrupacion = $datos[6];
                   $ArrayDescarga = $persona->personas->filter(function ($persona)  use ($id_agrupacion){
                        return $persona->deportista['FK_I_ID_AGRUPACION'] == $id_agrupacion;
                    });
                }
                
                //Deporte
                if($datos[7]){
                   $id_deporte = $datos[7];
                   $ArrayDescarga = $persona->personas->filter(function ($persona)  use ($id_deporte){
                        return $persona->deportista['FK_I_ID_DEPORTE'] == $id_deporte;
                    });
                }
                
                //Modalidad
                if($datos[8]){
                   $id_modalidad = $datos[8];
                   $ArrayDescarga = $persona->personas->filter(function ($persona)  use ($id_modalidad){
                        return $persona->deportista['FK_I_ID_MODALIDAD'] == $id_modalidad;
                    });
                }                

                //Tipo Deportista
                if($datos[9]){
                   $id_tipo_deportista = $datos[9];
                   $ArrayDescarga = $persona->personas->filter(function ($persona)  use ($id_tipo_deportista){
                        return $persona->deportista['FK_I_ID_TIPO_DEPORTISTA'] == $id_tipo_deportista;
                    });
                }                

                //Etapa Nacional
                if($datos[10]){
                   $id_etapa_nacional = $datos[10];
                   $ArrayDescarga = $persona->personas->filter(function ($persona)  use ($id_etapa_nacional){
                        return $persona->deportista['FK_I_ID_ETAPA_NACIONAL'] == $id_etapa_nacional;
                    });
                }                

                //Etapa Internacional
                if($datos[11]){
                   $id_etapa_internacional = $datos[11];
                   $ArrayDescarga = $persona->personas->filter(function ($persona)  use ($id_etapa_internacional){
                        return $persona->deportista['FK_I_ID_ETAPA_INTERNACIONAL'] == $id_etapa_internacional;
                    });
                }
                if(count($ArrayDescarga) != 0){         
                    $y = 0;
                    foreach($ArrayDescarga as $p){ 
                        $nombre = $p['Primer_Nombre'].' '.$p['Segundo_Nombre'].' '.$p['Primer_Apellido'].' '.$p['Segundo_Apellido'];
                        $agrupacion = $p->deportista->agrupacion['V_NOMBRE_AGRUPACION'];
                        $deporte = $p->deportista->deporte['V_NOMBRE_DEPORTE'];
                        $modalidad = $p->deportista->modalidad['V_NOMBRE_MODALIDAD'];
                        $etapa_nal = $p->deportista->etapa_nal['V_NOMBRE_ETAPA'];
                        $etapa_inter = $p->deportista->etapa_inter['V_NOMBRE_ETAPA'];                   
                        $sumaEtapas = 0;    
                        $educacion = 0;
                        $resultados = 0;
                        $alimentacion = 0;
                        $hidratantes = 0;
                        $multidisciplina =0;
                        $monitoria = 0;
                        $total = 0;

                        $genero  = $p->genero['Nombre_Genero'];                   
                        $fecha_nacimiento = $p['Fecha_Nacimiento'];
                        $edad = date('Y', strtotime($p['Fecha_Nacimiento']));
                         if (($mes = (date('m') - date('m', strtotime($p['Fecha_Nacimiento'])))) < 0) {
                          $edad++;
                         } elseif ($mes == 0 && date('d') - date('d', strtotime($p['Fecha_Nacimiento'])) < 0) {
                          $edad++;
                         }
                        $edad_decimal = date('Y')-$edad;
                        $pais = $p->pais['Nombre_Pais'];
                        $tipo_documento = $p->tipoDocumento['Nombre_TipoDocumento'];
                        $num_documento = $p['Cedula'];
                        $sit_militar = $p->deportista->situacionMilitar['V_NOMBRE_SITUACION_MILITAR'];
                        $banco = $p->deportista->banco['V_NOMBRE_BANCO'];
                        $tipo_cuenta = $p->deportista->tipoCuenta['V_NOMBRE_TIPO_CUENTA'];
                        $num_cuenta = $p->deportista['V_NUMERO_CUENTA'];
                        $dir_residencia = $p->deportista['V_DIRECCION_RESIDENCIA'];
                        $barrio = $p->deportista['V_BARRIO'];
                        $localidad = $p->deportista->localidad['Nombre_Localidad'];
                        $tel_fijo = $p->deportista['V_TELEFONO_FIJO'];
                        $tel_celular = $p->deportista['V_TELEFONO_CELULAR'];
                        $email = $p->deportista['V_CORREO_ELECTRONICO'];
                        $fecha_ingreso = $p->deportista['D_FECHA_INGRESO'];
                        $fecha_retiro = $p->deportista['D_FECHA_RETIRO'];
                        
                        $eps = $p->deportista->eps['Nombre_Eps'];  
                        $estadoCivil = $p->deportista->estadoCivil['V_NOMBRE_ESTADO_CIVIL'];  
                        $num_hijos = $p->deportista['V_CANTIDAD_HIJOS'];
                        $grupoSanguineo = $p->deportista->grupoSanguineo['Nombre_GrupoSanguineo'];
                        $etnia = $p->etnia['Nombre_Etnia'];
                        $club = $p->deportista->clubDeportivo['V_NOMBRE_CLUB_DEPORTIVO'];
                        $tCamisa = $p->deportista['FK_I_ID_TALLA_CAMISA'];
                        $tChaqueta = $p->deportista['FK_I_ID_TALLA_CHAQUETA'];
                        $tPantalon = $p->deportista['FK_I_ID_TALLA_PANTALON'];
                        $tZapatos = $p->deportista['FK_I_ID_TALLA_ZAPATOS'];
                        $tipoDeportista = $p->deportista->tipoDeportista['V_NOMBRE_TIPO_DEPORTISTA'];
                        $entrenadores = '';

                        foreach ($p->deportista->entrenadores as $Ent){
                            $NomEntrenadores = '';
                            $NomEntrenadores = $Ent->persona['Primer_Nombre'].' '.$Ent->persona['Segundo_Nombre'].' '.$Ent->persona['Primer_Apellido'].' '.$Ent->persona['Segundo_Apellido'];
                            $entrenadores = $entrenadores.', '.$NomEntrenadores;
                        }
                        $entrenadores = (substr($entrenadores, 2));

                        $d1 = explode('-', $datos[1]);
                        $d2 = explode('-', $datos[2]);

                        $sd = $d2[1] - $d1[1];
                        $fecha = date($datos[1]);  

                        for($i = 0; $i <= $sd; $i++){                       
                             $nuevafecha = date('Y-m', strtotime ( '+'.($i).' month' , strtotime ( $fecha ) ) );
                             $historialEtapas = $p->deportista->historialEtapas()->whereBetween('created_at', array( $nuevafecha.'-01 00:00:00' , $nuevafecha.'-31 23:59:59'))->orderBy('tb_srd_historial_etapa.created_at', 'desc')->get();
                             $EtapaInternacional = $historialEtapas->whereIn('FK_I_ID_TIPO_ETAPA', [2, 4])->first();
                             $EtapaNacional = $historialEtapas->whereIn('FK_I_ID_TIPO_ETAPA', [1, 3])->first();
                             if($EtapaNacional){
                                 $Nacional = ($EtapaNacional->pivot['I_SMMLV']* $EtapaNacional['V_POR_ESTIMULO']);
                             }else{
                                 $Nacional = 0;
                             }
                             if($EtapaInternacional){
                                 $Internacional = ($EtapaInternacional->pivot['I_SMMLV']* $EtapaInternacional['V_POR_ESTIMULO']); 
                             }else{
                                 $Internacional = 0;
                             }
                             $sumaEtapas = $sumaEtapas + $Nacional + $Internacional;
                             $Estimulos = $p->deportista->historialEstimulos()->whereBetween('created_at', array( $nuevafecha.'-01 00:00:00' , $nuevafecha.'-31 23:59:59'))->get();                        
                             foreach($Estimulos as  $hE){ 
                                 if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 1){
                                     $educacion = $educacion + $hE->pivot['V_VALOR_ESTIMULO'];
                                 }
                                 if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 2){
                                     $resultados = $resultados + $hE->pivot['V_VALOR_ESTIMULO'];
                                 }
                                 if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 3){
                                     $alimentacion = $alimentacion + $hE->pivot['V_VALOR_ESTIMULO'];
                                 }
                                 if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 4){
                                     $hidratantes = $hidratantes + $hE->pivot['V_VALOR_ESTIMULO'];
                                 }
                                 if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 5){
                                     $multidisciplina = $multidisciplina + $hE->pivot['V_VALOR_ESTIMULO'];
                                 }
                                 if($hE->pivot['FK_I_ID_TIPO_ESTIMULO'] == 6){
                                     $monitoria = $monitoria + $hE->pivot['V_VALOR_ESTIMULO'];
                                 }
                             }
                         }                
                         $total = $sumaEtapas + $educacion + $resultados + $alimentacion + $hidratantes + $multidisciplina + $monitoria;               
                         $per[$y] = [ 
                             'N°' => $y+1,
                             'DEPORTISTA' => strtoupper($nombre),
                          'GENERO' => strtoupper($genero),
                          'FECHA DE NACIMIENTO' => $fecha_nacimiento,
                          'EDAD' => $edad_decimal,                   
                          'PAÍS DE NACIMIENTO' => strtoupper($pais),
                          'TIPO DE DOCUMENTO' => strtoupper($tipo_documento),
                          'N° DE DOCUMENTO' =>  $num_documento,                                                    
                          'DIRECCIÓN DE RESIDENCIA' => strtoupper($dir_residencia),
                          'BARRIO' => strtoupper($barrio),
                          'LOCALIDAD' => strtoupper($localidad),
                          'TELÉFONO FIJO' => $tel_fijo,
                          'TELÉFONO CELULAR' => $tel_celular,
                          'E-MAIL' => $email,
                          'EPS'=> strtoupper($eps),
                          'ESTADO CIVIL'=> strtoupper($estadoCivil),
                          'N° DE HIJOS'=> $num_hijos,
                          'SITUACIÓN MILITAR' => strtoupper($sit_militar),
                          'GRUPO SANGUINEO'=> strtoupper($grupoSanguineo), 
                          'GRUPO ÉTNICO'=> strtoupper($etnia),
                          'BANCO' => strtoupper($banco),
                          'TIPO DE CUENTA' => strtoupper($tipo_cuenta),
                          'N° DE CUENTA' => $num_cuenta,
                          'CLUB DEPORTIVO'=> strtoupper($club),
                          'ENTRENADORES (Actual(es))'=> strtoupper($entrenadores),
                          'TALLA CAMISA'=> strtoupper($tCamisa),
                          'TALLA CHAQUETA'=> strtoupper($tChaqueta),
                          'TALLA PANTALÓN'=> strtoupper($tPantalon),
                          'TALLA ZAPATOS'=> strtoupper($tZapatos),
                          'TIPO DE DEPORTISTA'=> strtoupper($tipoDeportista),
                          'AGRUPACIÓN'=> strtoupper($agrupacion),
                          'DEPORTE'=> strtoupper($deporte),
                          'MODALIDAD'=> strtoupper($modalidad),
                          'ETAPA NACIONAL (Actual)'=> strtoupper($etapa_nal),
                          'ETAPA INTERNACIONAL  (Actual)'=> strtoupper($etapa_inter),                          
                          'FECHA DE INGRESO' => $fecha_ingreso,
                          'FECHA DE RETIRO' => $fecha_retiro,
                          'TRANSPORTE'=> $sumaEtapas,
                          'EDUCACIÓN'=> $educacion,
                          'ESTÍMULO POR RESULTADOS'=> $resultados,
                          'ALIMENTACIÓN'=> $alimentacion,
                          'HIDRATANTES AYUDAS Y COMPLEMENTOS'=> $hidratantes,
                          'INVERSIÓN MULTIDISCIPLINARIA'=> $multidisciplina,
                          'MONITORIAS'=> $monitoria,
                          'TOTAL'=> $total,
                                ];
                        $y++;     
                    }             
                }else{
                    $per[0] = ['RESPUESTA' => 'No hay registros!'];
                }
                $sheet->freezeFirstRow();
                $sheet->setAllBorders('thin');
                $sheet->setHeight(1, 50); 
                $sheet->setColumnFormat(array('E' => '0,0', 'Q' => '0,0', 'Z' => '0,0', 'AA' => '0,0', 'AB' => '0,0', 'AC' => '0,0', 'AL' => '$0,0', 'AM' => '$0,0', 
                                              'AN' => '$0,0', 'AO' => '$0,0', 'AP' => '$0,0', 'AQ' => '$0,0', 'AR' => '$0,0', 'AS' => '$0,0', ));

                $sheet->cells('A1:AS1', function($cells) {
                     $cells->setBackground('#CCFFFF');
                     $cells->setFont(array(
                         'family'     => 'Arial',
                         'size'       => '14',
                         'bold'       =>  true
                     ));

                     $cells->setBorder(array(
                         'top'   => array(
                             'style' => 'solid'
                         ),
                     ));
                     $cells->setAlignment('center');
                 });                  

                $sheet->cells('AS1:AS1', function($cells) {
                    $cells->setBackground('#FF0000');
                });                
            $sheet->fromArray($per);
           });
        })->download('xls');     
    }
}