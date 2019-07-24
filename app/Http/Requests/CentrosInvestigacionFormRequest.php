<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentrosInvestigacionFormRequest extends FormRequest
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
            'CENINV_ID'=>'required|max:10',
            'NOMBRE'=>'required',
            'DESCRIPCION'=>'required'
        ];
    }
}
