<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgottenPasswordRequest extends FormRequest
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
            //
            'email' => 'required|min:3|max:128|email',
        ];
    }

    
    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.email' => 'L\adresse e-mail est invalide.',
            'email.required' => 'L\adresse e-mail est requise.',
            'email.min' => 'L\adresse e-mail doit contenir au minimum 3 caracteres.',
            'email.max' => 'L\adresse e-mail doit contenir au maximum 128 caracteres.',
        ];
    }


}
