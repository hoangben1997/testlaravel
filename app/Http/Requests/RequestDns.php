<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDns extends FormRequest
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
            'tenmien'=>'required',
            'target'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute bat buoc nhap',
            
        ];
    }
}
