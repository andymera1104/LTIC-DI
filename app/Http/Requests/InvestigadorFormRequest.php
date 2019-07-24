<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigadorFormRequest extends FormRequest
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
            'INV_ID'=>'required|min:10|max:10' ,
            'CATINV_ID'=>'required',
            'GRUP_ID'=>'required',
            'CAR_ID'=> 'required|max:8',
            'NOMBRE'=>'required|max:20',
            'APELLIDO'=>'required|max:20',
            'CORREOINST'=>'required|email',
            'URLRESEARCH'=>'required|max:200',
            'URLLINKEDIN'=>'required|max:200',
            'BIOGRAFIA'=>'required',
            'FOTO'=>'mimes:jpeg,png,jpg',
            'VIDEO',
            'TIPO'=>'required',
        ];
    }
}
