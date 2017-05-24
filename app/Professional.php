<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Categoria;
use App\Models\Servico;
use App\Models\Especialidade;
use App\User;

class Professional extends Authenticatable
{
	use Notifiable;
	
    protected $fillable = [
        'user_id', 'tel', 'cpf', 'city', 'url_perfil', 'status', 'description'
    ];

    protected $hidden = [
        'password'
    ];

    // Um Profissional é um usuário
    public function user()
    {   
        return $this->belongsTo(User::class);
    }

    // Um Profissional (Receptor) recebe várias solicitações de usuários (Many-To-Many)
    // public function solicitacoes()
    // {   
    //     return $this->belongsToMany(User::class, 'solicitar_servico', 'solicitante_id', 'receptor_id');
    // }

    // Um Profissional tem muitas Categorias (Many-To-Many)
    public function categorias()
    {
    	return $this->belongsToMany(Categoria::class, 'categoria_professional');
    }

    // Um Profissional tem muitos Serviços (Many-To-Many)
    public function servicos()
    {
        return $this->belongsToMany(Servico::class, 'servico_professional');
    }

    // Um Profissional tem muitas Especialidades (Many-To-Many)
    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'especialidade_professional');
    }

    public function messages(){
        return $this->hasMany('App\Models\ServicoSolicitado');
    }

}
