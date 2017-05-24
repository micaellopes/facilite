<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;
use App\Professional;

class Especialidade extends Model
{
    // protected $fillable = ['name'];

	// Várias Especialidades pertencem a um Serviço (Many-To-One)
    public function servico()
    {	
    	return $this->belongsTo(Servico::class);
    }

    // Uma Especialidade pertence a vários Profissionais (Many-To-Many)
    public function profissionais()
    {
    	return $this->belongsToMany(Professional::class, 'especialidade_professional');
    }
}
