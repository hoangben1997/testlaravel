<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
           // 'name'=>'required',
            
           //  'phone'=>'nullable|numeric',
           //  'address'=>'required',
            'avatar'=>'mimes:jpeg,png,jpg,gif,jfif|max:2048'

        ];
    }
    public function messages()
    {
        return [
            'required.mimes'=>':attribute chon file hinh anh co duoi jpeg,png,jpg,gif,jfif',
            'required.max'=>':attribute chon file hinh anh co <2mb',
            
        ];
    }
}