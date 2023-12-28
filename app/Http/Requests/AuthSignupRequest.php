<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthSignupRequest extends FormRequest
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
            'firstName'=>'required',
            'lastName'=>'required',
            'email' => 'required|email',
            'phone'=> 'required',
            'address'=> 'required',
            'password'=> 'required'
        ];
    }

    public function messages(){
        return [
            'firstName'=>'The firstname field is required',
            'lastName'=>'The lastname field is required',
            'email' => 'The email field is required',
            'phone'=> 'The phone number field is required',
            'address'=> 'The address field is required',
            'password'=> 'The password field is required'
        ];
    }
}
