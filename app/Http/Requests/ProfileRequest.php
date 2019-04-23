<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name' => 'string|min:3|max:256',
            'email' => Rule::unique('users')->ignore($this->user()->id),
            'phone' => 'string|nullable',
            'position' => 'string|min:3|max:150|nullable',
            'password' => 'string'
        ];
    }

//    public function messages()
//    {
//        return [];
//    }
}
