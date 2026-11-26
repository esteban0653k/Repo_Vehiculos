<?php

namespace App\Http\Requests;




use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $usuarioId = $this->route('usuarios') ?? $this->route('id');

        return [
            'roles_id' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:roles,id'
            ],
            'name' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:225'
            ],
            'email' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:225',
                Rule::unique('usuarios', 'correo')->ignore($usuarioId, 'id')
            ],
            'password' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:8'
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'roles_id.required' => 'El rol es obligatorio.',
            'roles_id.integer' => 'El rol debe ser un número entero.',
            'roles_id.exists' => 'El rol seleccionado no existe en el sistema.',

            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser texto.',
            'name.max' => 'El nombre no puede exceder los 225 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe proporcionar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede exceder los 225 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }
}