<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClsRequestFase extends FormRequest
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
            'METid_metodologia' =>'required|not_in:0',
            'FAnombre_fase' =>'required',
            'FAdescripcion_fase' =>'required',
            'FAestado_fase' =>'required|not_in:0'
        ];
    }
    public function messages()
    {
        return [
            'METid_metodologia.required' =>'El campo Metodologias seleccionado es invalido',
            'FAnombre_fase.required' =>'El campo Nombre de Fase es requerido',
            'FAdescripcion_fase.required' =>'El campo Descripción es requerido',
            'FAestado_fase.not_in:0' =>'El campo seleccionado es invalido'
        ];
    }
}
