<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Professional;
use App\User;
use App\Models\ServicoSolicitado;

class MessagesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    	$this->middleware('role:prof');
    }

    public function index()
    {
    	// Busca prof logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Busca solicitacoes nao visualizadas do prof logado
        $solicitacoes = ServicoSolicitado::where('professional_id', $prof->id)->where('notificacao', 'nao_visualizada')->get();

        if (count($solicitacoes) > 0) {
	        // Atualiza todas as solicitacoes atuais do prof para 'visualizada'
	        foreach ($solicitacoes as $solicitacao) {
	        	$solicitacao->notificacao = 'visualizada';
	        	$solicitacao->save();
	        }
        }

    	return view('account.mensagens');
    }

}