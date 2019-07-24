<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarreraFormRequest extends FormRequest
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
            'CAR_ID'=>'required',
            'ESC_ID'=>'required',
            'NOMBRE'=>'required|max:40',
            'COORDINADOR'=>'required|max:50',
            'TELEFONO'=>'required|max:10',
            'EXTENSION'=>'required|max:6'
        ];
    }
}
