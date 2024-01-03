<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPaswordRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            "password" => ["required", "min:6"],
            'confirmPassword' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'The email field is required',
            'email.exists' => 'The email is Invalid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'confirmPassword.same' => 'Password does not match',
        ];
    }
}
