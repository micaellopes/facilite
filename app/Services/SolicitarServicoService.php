<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;
use App\Models\ServicoSolicitado;
/**
* 
*/
class SolicitarServicoService
{
	function createServiceRequest(Request $request){
		
		$s = new ServicoSolicitado;
        $s->fill($request->except('_token'));
        $s->user_id = Auth::user()->id;
        $s->data = \Carbon\Carbon::createFromFormat('m/d/Y', $request->data);
        $s->save();
	}
}