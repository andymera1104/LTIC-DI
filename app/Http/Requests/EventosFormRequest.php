<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosFormRequest extends FormRequest
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
            'EVENT_ID'=>'required|max:10',
            'TITULO'=>'required',
            'DESCRIPCION'=>'required',
            'FECHA_INICIO'=>'required|before:FECHA_FIN',
            'FECHA_FIN'=>'required',
            'LUGAR'=>'required',
            
        ];
    }
}
