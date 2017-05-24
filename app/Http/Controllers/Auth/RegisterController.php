<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Professional;
use Illuminate\Support\Facades\Auth; // <- Necessário para verificar e Logar o usuário após o cadastro
use Illuminate\Support\Facades\Hash; // <- Encryptar password no cadastro
use App\Http\Requests\Auth\RegisterFormRequest; // <- Classe de regras e mensagens de validação de Cadastro

class RegisterController extends Controller
{
    public function __construct()
    {
        // Se tiver sessão ativa redireciona para '/' e não mostra a page de cadastro
    	$this->middleware('guest');
    }

    public function index()
    {
    	return view('auth.cadastrar');
    }

    /**
     * Cadastra usuários (User e Prof) e valida dados com o RegisterFormRequest
     * @param  RegisterFormRequest $request | Dados do form "cadastrar"
     * @return Boolean | True: Cadastrado com sucesso, redirect(). False: Erro ao cadastrar, back().
     */
    public function postCadastrar(RegisterFormRequest $request)
    {   
        $dataForm = $request->all();
        // Checkbox marcado = prof, desmarcado = user
        $dataForm['role'] = ( !isset($dataForm['role']) ) ? 'user' : 'prof';
        // Guarda valor do checkbox (user ou prof)
        $role = $dataForm['role'];
        // Verifica e cria hash do password
        if (Hash::needsRehash($dataForm['password'])) {
            $dataForm['password'] = Hash::make($dataForm['password']);
        }

        switch ($role) {

            case "prof":
                // Cadastra dados, tabela User
                $insertUser = User::create($dataForm);
                // Cadastra dados, tabela Professional
                $insertProf = Professional::create([
                    'user_id'   => $insertUser->id,
                    'cpf'       => $dataForm['cpf'],
                    'tel'       => $dataForm['tel'],
                ]);
                // Verifica se inseriu
                if ($insertProf) {
                    // Loga o usuário após cadastrar (Persiste sessão
                    $login = Auth::login($insertUser, true);
                    // return redirect()->route('home')->with('cadastro-efetuado', 'Cadastro efetuado com sucesso!');
                    return redirect()->route('email-welcome');
                } else {
                    return redirect()->back();
                }
                break;

            default:
                // Cadastra dados, tabela User
                $insert = User::create($dataForm);
                // Loga o usuário após cadastrar (Persiste sessão)
                $login = Auth::login($insert, true);
                // Verifica se inseriu
                if ($insert) {
                    // return redirect()->route('home')->with('cadastro-efetuado', 'Cadastro efetuado com sucesso!');
                    return redirect()->route('email-welcome');
                } else {
                    return redirect()->back();
                }
        }
    }
    
}