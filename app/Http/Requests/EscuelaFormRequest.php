<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EscuelaFormRequest extends FormRequest
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
            //
            'ESC_ID'=>'required',
            'FAC_ID'=>'required',
            'NOMBRE'=>'required|max:20',
            'DIRECTOR'=>'required|max:50',
            'TELEFONO'=>'required|max:10',
            'EXTENSION'=>'required|max:10'
        ];
    }
}
