<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Professional;
use Mail;

class MailController extends Controller
{
	public function __construct()
	{	
		$this->middleware('auth');
	}

	/**
	 * Cadastrado com Sucesso/Bem vindo
	 */
    public function bemVindo()
    {
    	$user = User::find(Auth::user()->id);
    	$data=['name' => $user->name];
    	Mail::send('mails.bem-vindo', $data, function($message) use ($user){
    		$message->from('negociosfacilite@gmail.com', 'Facilite Serviços');
    		$message->to($user->email, $user->name)->subject('Bem vindo ao Facilite Serviços!');
    	});

    	return redirect()->route('home')->with('cadastro-efetuado', 'Cadastro efetuado com sucesso!');
	}

	/**
	 * Serviço Solicitado
	 */
    public function servicoSolicitado($idProf)
    {
    	$prof = Professional::find($idProf);
    	$data=['prof_name' => $prof->user->name];
    	Mail::send('mails.servico-solicitado', $data, function($message) use ($prof) {
    		$message->from('negociosfacilite@gmail.com', 'Facilite Serviços');
    		$message->to($prof->user->email, $prof->user->name)->subject('Solicitação de serviço!');
    	});

    	return redirect()->back()->with('servico-solicitado', 'Servico solicitado com sucesso!');
	}
}
