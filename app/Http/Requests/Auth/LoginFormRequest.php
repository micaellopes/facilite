<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|email|exists:users,email',
            'password'  => 'required' // |exists:users,password <- Não loga se usar isso
        ];
    }

    public function messages()
    {
        return [
            'email.required'        => 'Informe o seu e-mail.',
            'email.email'           => 'Informe um endereço de e-mail válido.',
            'email.exists'          => 'Este e-mail ainda não foi cadastrado',
            'password.required'     => 'Informe a sua senha.',
            // 'password.exists'       => 'Senha inválida.' // <- Não loga se usar isso
            
        ];
    }
}
