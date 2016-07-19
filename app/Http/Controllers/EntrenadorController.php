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
        //$deporte = DeporteModel::all();
        $agrupacion = AgrupacionModel::all();
     
        $entrenador = array();
        return view('entrenador.index', ['entrenador' => $entrenador])
                ->with(compact('etnia'))
                ->with(compact('pais'))
                ->with(compact('genero'))
                ->with(compact('etapasEntrenamiento'))
                ->with(compact('agrupacion'));
                //->with(compact('deporte'));
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
            $entrenador->V_TELEFONO_FIJO = $request->Telefono_Fijo;
            $entrenador->V_TELEFONO_CELULAR = $request->Telefono_Celular;
            $entrenador->V_CORREO_ELECTRONICO = $request->Correo_Electronico;
            if($entrenador->save()){
                $pivotPersona = Persona::find($request->Id_Persona);
                $pivotPersona->tipo()->attach(51);
                $pivotPersona->save();
                return response()->json(["Mensaje" => "Entrenador ingresado correctamente!!."]);                               
            }else{
                return response()->json(["Mensaje" => "No se ha registrado correctamente, por favor inténtelo más tarde."]);            
            }
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
    public function update(Request $request, $id)
    {
        //
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
        $persona = Persona::with('entrenador')->find($id);        
        return $persona;
    }
    
    public function AgregarImagen(Request $request, $idPersona){
        /*if ($request->hasFile('Fotografia')){            
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
        }*/
    }
}
