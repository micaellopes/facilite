<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacoes';

    public $fillable = [
      'user_id', 'avaliacoes', 'estrelas'
    ];


    public function profissional()
    {
        return $this->belongsTo(Professional::class, 'professional_id');
    }
}
