<div class="row">
  <div class="col-lg-6">
    <button class="btn-cyan-large-2" data-toggle="modal" data-target="#modalAlterarSenha"><span class="glyphicon glyphicon-wrench"></span> ALTERAR SENHA</button>
  </div>
  <div class="col-lg-6">
    <button class="btn-red-large-2" data-toggle="modal" data-target="#modalExcluirConta"><span class="glyphicon glyphicon-trash"></span> EXCLUIR CONTA</button>
	
	{{-- Senha Alterada com sucesso, ativa blockUI --}}
    @if (session('senha-alterada'))
      <span style="display: none;" id="senha-alterada" class="help-block text-center padding-top-6">
        <strong class="text-success">{{ session('senha-alterada') }}</strong>
      </span>
    @endif
  </div>
</div>

@include('layouts.includes.modal-excluir-conta')

@include('layouts.includes.modal-alterar-senha')