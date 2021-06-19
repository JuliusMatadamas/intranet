<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPlanRequest extends FormRequest
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
            'empresa_id' => 'required',
            'cliente_id' => 'required',
            'nombre' => 'required|min:5|unique:planes,nombre',
            'inicia' => 'required|date',
            'termina' => 'date|nullable'
        ];
    }

    public function messages()
    {
        return [
            'empresa_id' => 'La empresa es requerida',
            'cliente_id' => 'El cliente es requerido',
            'nombre' => 'El nombre del plan es requerido',
            'nombre.min' => 'El nombre del plan debe tener al menos 5 caracteres',
            'inicia' => 'La fecha de inicio es requerida',
            'inicia.date' => 'La fecha de inicio del plan debe estar en un formato de tipo fecha'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
