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
        if( $this->Fecha_Retiro){
            $validaciones = [                        
            'Eps' => 'required',
            'Estrato'=> 'required',
            'Localidad' => 'required',
            'Barrio' => 'required|min:3|regex:/^[(a-zA-Z\s)]+$/u',
            'Direccion_Residencia'=> 'required|min:3|regex:/^[(a-zA-Z0-9\s\#\-\°)]+$/u',
            'Telefono_Fijo'=> 'required|numeric|digits_between:7,10',
            'Telefono_Celular'=> 'required|numeric|digits:10',
            'Correo_Electronico'=> 'required|email|min:7|max:40',
            'Estado_Civil'=> 'required',
            'Hijos'=> 'required|numeric|digits_between:1,3',
            'Tipo_Cuenta' => 'required',
            'Deporte' => 'required',
            'Modalidad' => 'required',
            'Agrupacion' => 'required',
            'EtapaNacional' => 'required',
            'EtapaInternacional' => 'required',
            'Id_persona' => 'unique:FK_I_ID_PERSONA',
            'Estrato'=>'required',
            'Grupo_Sanguineo' =>'required',
            'Tipo_Deportista' => 'required',
            'Situacion_Militar' => 'required',  
            'Fecha_Ingreso' =>  'required|date',
            'Fecha_Retiro' => 'date|after:Fecha_Ingreso',
            
            ];
        }else{
            $validaciones = [                        
                'Eps' => 'required',
                'Estrato'=> 'required',
                'Localidad' => 'required',
                'Barrio' => 'required|min:3|regex:/^[(a-zA-Z\s)]+$/u',
                'Direccion_Residencia'=> 'required|min:3|regex:/^[(a-zA-Z0-9\s\#\-\°)]+$/u',
                'Telefono_Fijo'=> 'required|numeric|digits_between:7,10',
                'Telefono_Celular'=> 'required|numeric|digits:10',
                'Correo_Electronico'=> 'required|email|min:7|max:40',
                'Estado_Civil'=> 'required',
                'Hijos'=> 'required|numeric|digits_between:1,3',
                'Tipo_Cuenta' => 'required',
                'Deporte' => 'required',
                'Modalidad' => 'required',
                'Agrupacion' => 'required',
                'EtapaNacional' => 'required',
                'EtapaInternacional' => 'required',
                'Id_persona' => 'unique:FK_I_ID_PERSONA',
                'Estrato'=>'required',
                'Grupo_Sanguineo' =>'required',
                'Tipo_Deportista' => 'required',
                'Situacion_Militar' => 'required',  
                'Fecha_Ingreso' =>  'required|date',
                'Fecha_Retiro' => 'date|after:Fecha_Ingreso',

                ];
        }
        
        if($this->Tipo_Cuenta != 3){
               $validaciones['Banco'] = 'required';
               $validaciones['Cuenta'] = 'required|numeric|digits_between:1,20';
        }
        return $validaciones;
    }
}