@extends('layouts.master-fluid')

@section('title') Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')

	<h1 style="text-align: center">HOME PAGE</h1>

	{{-- ************** Mensagens de Sessão **************** --}}
	{{-- Cadastro efetuado --}}
	@if (session('cadastro-efetuado'))
		<span style="display: none;" id="cadastro-efetuado" class="help-block">
		  <strong class="text-success">{{ session('cadastro-efetuado') }}</strong>
		</span>
	@endif

@endsection

@section('footer')
	{{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
	{{-- Jquery BlockUI --}}
	<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
	{{-- Dados atualizados/Erro ao atualizar, mensagens de sessão --}}
  	<script src="{{ asset('js/notifications/mensagens-sessao.js') }}"></script>
@endpush