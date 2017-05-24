<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Professional;
use App\Models\ServicoSolicitado;

class InjectSolicitacoes extends Model
{
    public function __construct()
    {
    	//
    }

    public function injectSolicitacoes()
    {
        // Busca prof logado
    	$prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Retorna as solicitações não visualizadas do profissional logado
    	return $solicitacoes = ServicoSolicitado::where('professional_id', $prof->id)->where('notificacao', 'nao_visualizada')->get();
    }
}
