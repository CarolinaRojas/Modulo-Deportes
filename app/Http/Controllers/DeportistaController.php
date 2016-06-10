<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\EpsModel;
use App\LocalidadModel;
use App\EtniaModel;
use App\AgrupacionModel;
use App\DeporteModel;
use App\ModalidadModel;
use App\EtapaModel;
use App\EstadoCivilModel;
use App\DepartamentoModel;
use App\Pais;
use App\DeportistaModel;
use App\Persona;


class DeportistaController extends Controller
{   
    public function index(){
        $eps = EpsModel::all();
        $localidad = LocalidadModel::all();
        $etnia = EtniaModel::all();
        $agrupacion = AgrupacionModel::all();
        $deporte = DeporteModel::all();
        $modalidad = ModalidadModel::all();
        $etapa = EtapaModel::all();
        $estadoCivil = EstadoCivilModel::all();
        $departamento = DepartamentoModel::all();
        $pais = Pais::all();
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
                ->with(compact('pais'));
        
    }
        
    public function datos($id){
        $persona = Persona::with('deportista')->find($id);        
        return $persona;
    }
}