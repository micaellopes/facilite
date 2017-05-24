<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Especialidade;
use App\Professional;

class Servico extends Model
{
	// protected $fillable = ['name'];

	// Vários Serviços pertencem a uma Categoria (Many-To-One)
    public function categoria()
    {	
    	return $this->belongsTo(Categoria::class);
    }

    // Um serviço tem várias Especialidades (One-To-Many)
    public function especialidades()
    {
    	return $this->hasMany(Especialidade::class);
    }

    // Um serviço pode pertencer a vários Profissionais (Many-To-Many)
    public function profissionais()
    {
        return $this->belongsToMany(Professional::class, 'servico_professional');
    }
}
