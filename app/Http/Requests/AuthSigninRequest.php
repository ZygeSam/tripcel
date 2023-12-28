<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthSigninRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password'=> 'required'
        ];
    }

    public function messages(){
        return [
            'email' => 'The email field is required',
            'password'=> 'The password field is required'
        ];
    }
}
