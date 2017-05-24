<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UrlEditFormRequest extends FormRequest
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
            'url_perfil'        => 'required|alpha|between:4,25|unique:professionals,url_perfil',
        ];
    }

    public function messages()
    {
        return [
            'url_perfil.required'       => 'Informe um endereço para o seu perfil.',
            'url_perfil.alpha'          => 'O endereço do perfil deve conter apenas letras.',
            'url_perfil.between'        => 'O endereço do perfil deve conter no min 4 e no max 25 caracteres.',
            'url_perfil.unique'         => 'Esta url já está em uso.',
        ];
    }
}
