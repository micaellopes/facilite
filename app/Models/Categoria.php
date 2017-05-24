<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;
use App\Professional;

class Categoria extends Model
{
	// protected $fillable = ['name'];

	// Uma Categoria tem muitos Serviços (One-To-Many)
    public function servicos()
    {
    	return $this->hasMany(Servico::class);
    }

    // Uma Categoria pertence a muitos Profissionais (Many-To-Many)
    public function profissionais()
    {
    	return $this->belongsToMany(Professional::class, 'categoria_professional');
    }
}
