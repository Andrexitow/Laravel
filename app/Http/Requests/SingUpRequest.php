<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingUpRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Esta regla es la que valida que ambas contraseñas coincidan
            'terms' => 'required|accepted',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de caracteres.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',

            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria.',
            'password_confirmation.same' => 'La confirmación de la contraseña debe coincidir con la contraseña.',

            'terms.required' => 'Debes aceptar los términos y condiciones.',
            'terms.accepted' => 'Debes aceptar los términos y condiciones para continuar.',
        ];
    }
}
