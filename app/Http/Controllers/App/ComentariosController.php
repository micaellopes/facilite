<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Professional;
use Validator;

class ComentariosController extends Controller
{
    public function __construct()
	{	
		$this->middleware('auth');
	}

	/**
	 * Fazer comentário no perfil do profissional
	 */
    public function comentar(Request $request)
    {
    	// Validando os dados informados
        $validator = Validator::make(
            // Entradas
            $request->all(),

            // Regras
            [
             'comentario'        => 'required|between:4,40|'
            ],

            // Mensagens
            [
             'comentario.required'       => 'Comente algo.',
             'url_perfil.between'        => 'Seu comentário deve conter no min 4 e no max 40 caracteres.',
            ]
        );

        // Retorna erros do validator
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with('erro-comentar', 'Erro ao comentar.');
        }

    	$comentario = new Comentario;
        $comentario->fill($request->except('_token'));
        $comentario->user_id = Auth::user()->id;
        $comentario->save();

        return redirect()->back()->with('comentario-efetuado', 'Comentário efetuado com sucesso');
	}
}
