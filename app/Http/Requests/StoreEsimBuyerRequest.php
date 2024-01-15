<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreEsimBuyerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (Auth::check()) {
            return [
                'payment_gateway'=>'required'
            ];
        }else{
            return [
            'firstName'=> 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'address'=> 'required',
            'phone'=> 'required',
            'password' => 'required', "min:6", "confirmed",
            'confirmPassword' => 'required|same:password',
            'payment_gateway'=>'required'
        ];
        }
        
    }

    public function messages(): array
    {
        return [
            'firstName'=> 'The first name field is required',
            'lastName' => 'The last name field is required',
            'email' => 'The email field is required and it should be an email',
            'address'=> 'The address field is required',
            'phone'=> 'The phone field is required',
            'password' => 'The password field is required',
            'confirmPassword' => 'The confirm password field is required and should be the same as the password',
            'payment_gateway'=>'The payment gateway field is required'
        ];
    }
}
