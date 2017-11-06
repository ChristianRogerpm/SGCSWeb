<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClsRequestEntregable extends FormRequest
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
            'METid_metodologia'=>'required|not_in:0',
            'FAid_fase'=>'required|not_in:0',
            'ENTRnombre_entregable'=>'required',
            'ENTRdescripcion_entregable'=>'required',
            'ENTRestado_entregable'=>'required|not_in:0'
        ];
    }
    public function messages()
    {
        return[
            'METid_metodologia.not_in:0' => 'El campo Metodologia seleccionado es invalido',
            'FAid_fase.not_in:0' => 'El campo Fase seleccionado es invalido',
            'ENTRnombre_entregable.required' => 'El campo Nombre Entregable es requerido',
            'ENTRdescripcion_entregable.required' => 'El campo Descripción es requerido',
            'ENTRestado_entregable.not_in:0' => 'El campo Estado seleccionado es invalido'
        ];
    }
}
