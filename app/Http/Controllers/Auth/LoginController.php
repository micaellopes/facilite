<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Professional;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // <- Necessário importar a facade Auth para verificar os dados do Login
use App\Http\Requests\Auth\LoginFormRequest; // <- Classe de regras e mensagens de validação de login

class LoginController extends Controller
{
    public function __construct()
    {        
        // Se tiver sessão ativa redireciona para '/' e não mostra a page de login
    	$this->middleware('guest')->except('logout');

    }

    public function index()
    {
    	return view('auth.login');
    }

    /**
     * Verifica credenciais e Efetua Login. Caso seja prof, verifica se existe
     * perfil ativo, se não redireciona para 'editar-perfil'.
     * @param  Request $request | Dados form login
     * @return Boolean | True: Login efetuado com sucesso. False: Login inválido.
     */
    public function postLogin(Request $request)
    {
        $login = $request->only(['email', 'password']);
        if (Auth::attempt($login)) {
            $profile = Professional::where('user_id', Auth::user()->id)->get()->first();
            if (isset($profile->status) && $profile->status == 'inactive') {
                //////////FAZER FILTRO DO PERFIL PROFISSIONAL PARA AGILIZAR/// 
                /////////////REDIRECIONAMENTO DE PÁGINA APÓS LOGIN///////////
                return redirect()->route('editar-perfil');
            } else {
                return redirect()->intended();
            }
        } else {
            return redirect()->route('login')->withErrors('Email ou senha incorretos!');
        }
    }

    /**
     * Efetua logout
     * @return redirect() | Desloga e redireciona o usuário para 'home'
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}