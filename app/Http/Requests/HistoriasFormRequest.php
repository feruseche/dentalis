<?php

namespace dentalis\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoriasFormRequest extends FormRequest
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
            'paciente'=>'required|max:100',
            'cedula'=>'required|max:8',
            'direccion'=>'max:256',
        ];

    }
}
