<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Idrd\Usuarios\Controllers\PersonaController as MPersonaController;


class PersonaDeportistaController extends MPersonaController
{
    public function InformacionDeportia(Request $request, $id){
    		echo "fadsfd ".$id;
    }
}
