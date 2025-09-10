<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        return [
            'email' => 'required|unique:users|email',
            'password' => 'required|min:2048|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'An email address is required',
            'email.email' => 'The email address must be valid',
            'password.confirmed' => 'Re type your password as password_confirmation does not match'
        ];
    }
}
