<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['user_id', 'professional_id','comentario'];

    // Um comentário é feito por um usuário
    public function user(){
    	return $this->belongsTo('App\User');
    }

    // Um comentário pertence a um profissional
    public function profissional(){
    	return $this->belongsTo('App\Professional');
    }
}
