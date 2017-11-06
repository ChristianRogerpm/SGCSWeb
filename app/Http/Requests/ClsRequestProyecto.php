<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClsRequestProyecto extends FormRequest
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
            'PROnombre_proyecto' => 'required',
            'USUid_usuario' => 'required|not_in:0',
            'PROdescripcion_proyecto' => 'required',
            'PROfecha_inicio_proyecto' => 'required',
            'PROfecha_fin_proyecto'=>'required',
            'PROestado_proyecto'=>'required|not_in:0'
        ];
    }
}
