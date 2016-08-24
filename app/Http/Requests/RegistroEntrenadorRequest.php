<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistroEntrenadorRequest extends Request
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
            'Telefono_Fijo'=> 'required|numeric|digits_between:7,10',
            'Telefono_Celular'=> 'required|numeric|digits:10',
            'Correo_Electronico'=> 'required|email|min:7|max:40',
            'Tipo_Deportista' => 'required',
            'Agrupacion' => 'required',
            'Deporte' => 'required',
            'Etapa_Entrenamiento' => 'required|array',
            'Modalidad' => 'required'
            ];
        return $validaciones;
    }
}