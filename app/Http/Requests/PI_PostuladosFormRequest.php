<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PI_PostuladosFormRequest extends FormRequest
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
            'POST_ID'=>'required|string',
            'NOMBRE'=>'required',
            'ESTADO'
        ];
    }
}
