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

use App\Http\Requests\RegistroDeportistaRequest;



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
        $ciudad = Ciudad::all();
        $genero = Genero::all();
        $banco = BancoModel::all();
        
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
                ->with(compact('banco'));
    }
        
    public function datos($id){
        $persona = Persona::with('deportista')->find($id);        
        return $persona;
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
}