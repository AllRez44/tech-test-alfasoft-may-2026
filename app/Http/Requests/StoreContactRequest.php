<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
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
        $contactId = $this->route('id') ?? $this->route('contact');

        return [
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')->ignore($contactId),
            ],
            'contact' => [
                'required',
                'string',
                'size:9',
                Rule::unique('contacts', 'contact')->ignore($contactId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.min' => 'O nome deve ter pelo menos 5 caracteres.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'contact.required' => 'O contacto é obrigatório.',
            'contact.string' => 'O contacto deve ser um texto.',
            'contact.size' => 'O contacto deve ter exatamente 9 dígitos.',
            'contact.unique' => 'Este contacto já está cadastrado.',
        ];
    }
}
