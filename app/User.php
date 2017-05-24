<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Professional;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Um usuário (solicitante) pode fazer várias solicitações serviço (Many-To-Many)
    // public function solicitacoes()
    // {   
    //     return $this->belongsToMany(Professional::class, 'solicitar_servico', 'receptor_id', 'solicitante_id');
    // }

     public function isProfessional(){
        return $this->hasOne("App\Professional");
    }
    
}
