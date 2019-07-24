<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicNoProyectoFormRequest extends FormRequest
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
            'PUBLNOPROY_ID'=>'required',
            'AREA_ID'=>'required',
            'TITULO'=>'required',
            'ABSTRACT'=>'required',
            'FECHAPUB'=>'required|after_or_equal:FECHAPUB',
            'REVISTA'=>'required',
            'TIPO'=>'required',
            'NIVEL'=>'required'
        ];
    }
}
