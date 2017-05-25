<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicoSolicitado extends Model
{
    protected $fillable = ['user_id', 'servico_id', 'professional_id','data','horario','numero','mensagem', 'visualizada'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function servico(){
    	return $this->belongsTo('App\Models\Servico');
    }
}


