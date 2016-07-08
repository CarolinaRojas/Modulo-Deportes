<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EstimuloRequest extends Request
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
            'Tipo_Estimulo' => 'required',
            'Valor_Estimulo' => 'required|numeric|digits_between:3,10',
            'Valor_SMMLV' => 'required|numeric|digits_between:6,7'
            ];
       
        return $validaciones;
    }
}
