<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', "email", "unique:users,email"],
            'contact' => ['required', 'unique:users,contact', 'min:9', 'max:9'],
        ];

        if ($this->method() === 'PUT') {
            $user_id = $this->route()->parameters()['user'];

            $rules['email'] = [
                'required',
                'string',
                Rule::unique(User::class)->ignore($user_id ?? $this->email),
            ];

            $rules['contact'] = [
                'required',
                'string',
                Rule::unique(User::class)->ignore($user_id ?? $this->contact),
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'O nome deve contar no minimo 5 caracteres',
            'email.required' => 'E-mail é obrigatório',
            'email.unique' => 'E-mail ja cadastrado',
            'contact.required' => 'Contato é obrigatório',
            'contact.unique' => 'Contato ja cadastrado',
            'contact.min' => 'O contato deve contar no minimo 9 caracteres',
            'contact.max' => 'O contato deve contar no maximo 9 caracteres',
        ];
    }
}
