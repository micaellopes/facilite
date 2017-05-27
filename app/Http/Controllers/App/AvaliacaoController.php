<?php

namespace App\Http\Controllers\App;

use App\Professional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Professional $profissional)
    {
        // Validar se os parametros passados existem
        if($profissional->user_id == \Auth::user()->id){
            return response()->json(['error'=>'Voce no pode votar em si propio'], 400);
        }

        //Se o usurio no votou nesse profissional ainda ele poder votar
        if(!$profissional->avaliacoes()->where('user_id',\Auth::user()->id)->get()->count() > 0){
            $profissional->avaliacoes()->create(['user_id'=> \Auth::user()->id, 'estrelas' => $request->stars]);
            return $profissional->with('avaliacoes')->first();
        }else{
            return response()->json(['error'=>'Voce ja avaliou este profissional!'], 400);
        }


        //return $profissional->with();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
