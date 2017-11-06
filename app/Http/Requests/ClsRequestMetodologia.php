<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClsRequestMetodologia extends FormRequest
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
        return [
            'METnombre_metodologia'=>'required',
            'METdescripcion_metodologia'=>'required',
            'METestado_metodologia'=>'not_in:0'
        ];
    }
    public function messages()
    {
        return [
            'METnombre_metodologia.required' => 'El campo Nombre Metodologia es requerido.',
            'METdescripcion_metodologia.required'=>'El campo Descripción es requerido',
            'METestado_metodologia.not_in:0'=>'El campo Estado seleccionado es invalido'
        ];
    }
}
