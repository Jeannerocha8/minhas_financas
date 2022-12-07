<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            'name' => 'required|min:3|max:255|string',
            'email' => 'required|unique:users|email:rfc,dns',
            'email_verified_at' => 'nullable|strtotime',
            'password' => 'required|min:6|max:20',
            'remember_token' => 'nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome é obrogatório',
            'name.min' => 'Nome deve conter no minímo 3 caracteres',
            'name.max' => 'O campo Nome ultrapassou a quantidade de caracteres permitida',
            'name.string' => 'O campo Nome deve conter apenas letras',
            'email.required' => 'E-mail é obrigatório',
            'email.unique' => 'E-mail já cadastrado',
            'email.email' => 'E-mail inválido',
            'password.required' => 'Senha obrigatória',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres',
            'password.max' => 'A senha deve conter no máximo 20 caracteres',
        ];
    }
}
