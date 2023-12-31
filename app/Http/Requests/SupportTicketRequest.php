<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportTicketRequest extends FormRequest
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
            'subject'=> "required",
            'message' => "required",
            'user_id' => "sometimes:required",
            'admin_id' => "sometimes:required"
        ];
    }
}
