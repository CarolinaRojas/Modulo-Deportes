<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegistroEntrenadorRequest;

use App\Persona;
use App\Etnia;
use App\Pais;
use App\Genero;
use App\EntrenadorModel;
use App\EtapaEntrenamientoModel;
use App\DeporteModel;
use App\AgrupacionModel;
use App\EntrenadorEtapaModel;
use App\EntrenadorModalidadModel;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etnia = Etnia::all();        
        $pais = Pais::all();        
        $genero = Genero::all();
        $etapasEntrenamiento = EtapaEntrenamientoModel::all();
        $agrupacion = AgrupacionModel::all();
     
        $entrenador = array();
        return view('entrenador.index', ['entrenador' => $entrenador])
                ->with(compact('etnia'))
                ->with(compact('pais'))
                ->with(compact('genero'))
                ->with(compact('etapasEntrenamiento'))
                ->with(compact('agrupacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroEntrenadorRequest $request)
    {        
        if ($request->ajax()){
            $entrenador = new EntrenadorModel;
            $entrenador->FK_I_ID_PERSONA = $request->Id_Persona;
            $entrenador->FK_I_ID_AGRUPACION = $request->Agrupacion;
            $entrenador->FK_I_ID_DEPORTE = $request->Deporte;
            $entrenador->V_TELEFONO_FIJO = $request->Telefono_Fijo;
            $entrenador->V_TELEFONO_CELULAR = $request->Telefono_Celular;
            $entrenador->V_CORREO_ELECTRONICO = $request->Correo_Electronico;
            
            if($entrenador->save()){
                
                $entrenador->EntrenadorEtapaEnt()->sync($request->Etapa_Entrenamiento);
                $entrenador->EntrenadorModalidad()->sync($request->Modalidad);
                
                $pivotPersona = Persona::find($request->Id_Persona);
                $pivotPersona->tipo()->attach(51);
                $pivotPersona->save();                
          
                return response()->json(["Mensaje" => "Entrenador ingresado correctamente!!."]);                               
            }else{
                return response()->json(["Mensaje" => "No se ha registrado correctamente, por favor inténtelo más tarde."]);            
            }
        }else{
            return response()->json(["Mensaje" => "No se ha registrado correctamente, por favor inténtelo más tarde."]);            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegistroEntrenadorRequest $request, $id)
    {
        if ($request->ajax()){
            
            $entrenador = EntrenadorModel::find($id);
            $entrenador->FK_I_ID_PERSONA = $request->Id_Persona;
            $entrenador->FK_I_ID_AGRUPACION = $request->Agrupacion;
            $entrenador->FK_I_ID_DEPORTE = $request->Deporte;
            $entrenador->V_TELEFONO_FIJO = $request->Telefono_Fijo;
            $entrenador->V_TELEFONO_CELULAR = $request->Telefono_Celular;
            $entrenador->V_CORREO_ELECTRONICO = $request->Correo_Electronico;
            
            if($entrenador->save()){
                $entrenador->EntrenadorEtapaEnt()->sync($request->Etapa_Entrenamiento);
                $entrenador->EntrenadorModalidad()->sync($request->Modalidad);                
                return response()->json(["Mensaje" => "Entrenador actualizado correctamente!!."]);
            }else{
                return response()->json(["Mensaje" => "No se ha actualizado correctamente, por favor inténtelo más tarde."]);            
            }
        }else{
            return response()->json(["Mensaje" => "No se ha registrado correctamente, por favor inténtelo más tarde."]);            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function datos($id){
        $persona = Persona::with('entrenador', 'entrenador.etapasEntrenador', 'entrenador.modalidadesEntrenador')->find($id);        
        return $persona;
    }
    
    public function AgregarImagen(Request $request, $idPersona){
        if ($request->hasFile('Fotografia')){            
            $persona = Persona::with('entrenador')->find($idPersona);
            $persona->entrenador['V_URL_IMG'] = '../Modulo-Deportes/storage/app/fotografias/'.$nombre = $idPersona.'_entrenador.png';
            $persona->entrenador->save();
            $file = $request->file('Fotografia'); 
            $nombre = $idPersona.'_entrenador.png';         
            \Storage::disk('fotografias')->put($nombre,  \File::get($file));
            return "Archivo almacenado correctamente";
        }
        else{
            return "No se encontro archivo.";
        }
    }
    
    public function getEtapasEntrenamiento(Request $request){
        if ($request->ajax()) {
            $etapas = EtapaEntrenamientoModel::all();
        }
        return($etapas);
    }
    
    
    public function conteoDeportistas(){
        $conteo = EntrenadorModel::with('')->find(2);
        dd($conteo);
        return $conteo;
    }
    
    /*public function getEntrenadorEtapas(Request $request, $id) {        
        if ($request->ajax()) {
            $entrenadorEtapas = EntrenadorModel::with('etapasEntrenador')->find($id);
            return $entrenadorEtapas;
        }
    }*/
}
