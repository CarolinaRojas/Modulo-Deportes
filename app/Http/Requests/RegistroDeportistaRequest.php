<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistroDeportistaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validaciones = [                        
            'Eps' => 'required',
            'Estrato'=> 'required',
            'Departamento' => 'required',
            'Localidad' => 'required',
            'Barrio' => 'required',
            'Direccion_Residencia'=> 'required|min:3|regex:/^[(a-zA-Z0-9\s\#\-\°)]+$/u',
            'Telefono_Fijo'=> 'required|numeric|digits_between:7,10',
            'Telefono_Celular'=> 'required|numeric|digits:10',
            'Correo_Electronico'=> 'required|email|min:7|max:40',
            'Estado_Civil'=> 'required',
            'Hijos'=> 'required|numeric|digits_between:1,3',
            'Banco' => 'required',
            'Cuenta' => 'required|numeric|digits_between:1,20',
            'Deporte' => 'required',
            'Modalidad' => 'required',
            'Agrupacion' => 'required',
            'Etapa' => 'required',
            'Id_persona' => 'unique:FK_I_ID_PERSONA',
            'Estrato'=>'required',
            'Grupo_Sanguineo' =>'required',
            'Tipo_Deportista' => 'required',
            ];
        return $validaciones;
    }
}