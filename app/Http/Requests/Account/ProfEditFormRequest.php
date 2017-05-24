<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Professional;
use App\User;

class ProfEditFormRequest extends FormRequest
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
        // Busca user
        $user = User::find(Auth::user()->id);
        // Busca user_prof (se existir)
        $prof = Professional::where('user_id', $user->id)->get()->first();
        return [
            'name'      => 'min:4|max:40',
            'email'     => "email|max:55|unique:users,email,$user->id",
            'tel'       => "required_with:role,prof|min:15|unique:professionals,tel,$prof->id",
        ];
    }

    public function messages()
    {
        return [
            'name.min'              => 'Mínimo de :min caracteres permitido.',
            'name.max'              => 'Máximo de :max caracteres permitido.',
            'email.email'           => 'Informe um endereço de e-mail válido.',
            'email.max'             => 'Seu e-mail parece grande demais...',
            'email.unique'          => 'O e-mail informado já está em uso.',
            'tel.required_with'     => 'O campo telefone é obrigatório.',
            'tel.min'               => 'O campo telefone deve conter 11 dígitos.',
            'tel.unique'            => 'O telefone informado já está em uso.'
        ];
    }
}
