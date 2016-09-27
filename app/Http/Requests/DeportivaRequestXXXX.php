<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DeportivaRequest extends Request
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
            'Club_Deportivo' => 'required',
            'Talla_Camisa' => 'required',
            'Talla_Zapatos' => 'required',
            'Talla_Chaqueta' => 'required',
            'Talla_Pantalon' => 'required',
            //'ArrayEntrenador' => 'required|array',
            ];
       
        return $validaciones;
    }
}