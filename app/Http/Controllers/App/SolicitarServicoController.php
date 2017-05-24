<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServicoSolicitado;
use Auth;
use App\Services\SolicitarServicoService;

class SolicitarServicoController extends Controller
{

    protected $service_request;

    function __construct(SolicitarServicoService $service_request)
    {
        $this->service_request = $service_request;
    }
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
    public function store(Request $request)
    {
        $this->service_request->createServiceRequest($request);
        // return redirect()->back()->with('servico-solicitado', 'Servico solicitado com sucesso!');
        return redirect()->route('email-solicitacao', ['idProf' => $request->professional_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ServicoSolicitado $solicitar_servico)
    {
        return response()->json(ServicoSolicitado::where('id','=',$solicitar_servico->id)->with(['user','servico'])->first());
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
        $solicitacao = ServicoSolicitado::find($id);
        $solicitacao->delete();
        return redirect()->route('solicitacoes')->with('solicitacao-deletada', 'Solicitação deletada!');
    }
}
