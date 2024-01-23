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
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
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
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, and one number.',
            'confirmPassword.required' => 'The confirm password field is required.',
            'confirmPassword.same' => 'The password and confirm password must match.',
            'payment_gateway'=>'The payment gateway field is required'
        ];
    }
}
