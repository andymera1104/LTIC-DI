<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratorioFormRequest extends FormRequest
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
            'LAB_ID'=>'required' ,
            'CAR_ID'=> 'required|max:8',
            'CENINV_ID'=>'required',
            'NOMBRE'=>'required|max:20',
            'DESCRIPCION'=>'required',
            'IMAGEN'=>'mimes:jpeg,png,jpg',
        ];
    }
}
