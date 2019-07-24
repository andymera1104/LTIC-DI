<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultadFormRequest extends FormRequest
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
            'CODIGOSEDE'=>'required|max:20',
            'NOMBRE'=>'required|max:20',
            'SUBDECANO'=>'required|max:50',
            'DECANO'=>'required|max:50',
            'TELEFONO'=>'required|max:10',
            'EXTENSION'=>'required|max:10'
        ];
    }
}
