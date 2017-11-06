<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClsRequestRelacionTareaProyecto extends FormRequest
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
            'TAid_tarea1' => 'not_in:0',
            'TAid_tarea2' => 'not_in:0'
        ];
    }
}
