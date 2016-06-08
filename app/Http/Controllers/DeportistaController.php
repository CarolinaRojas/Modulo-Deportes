<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DeportistaController extends Controller
{
    public function datos(){
    	return view('deportista');
    }

    
}

