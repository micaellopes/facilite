<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class InjectCategorias extends Model
{
    public function __construct()
    {
    	//
    }

    public function injectCategorias()
    {
    	return $categorias = Categoria::get();
    }
}