<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiasFormRequest extends FormRequest
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
            'NOT_ID'=>'required|max:10',
            'TITULO'=>'required',
            'RESUMEN'=>'required',
            'IMAGEN'=>'mimes:jpeg,png,jpg',
            'NOTICIA'=>'required',
            'FECHA'=>'required|after_or_equal:FECHA',
        ];
    }
}
