@extends('layouts.master-fluid')

@section('title') Editar Serviços - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')

  {{-- SIDEBAR-NAV --}}
  <div style="box-shadow: 0px 2px 4px #888888" class="col-sm-4 col-md-3 col-lg-2 sidebar">

    @if(count($profile->servicos) != 0)

      {{-- IMAGE USER --}}
      <div class="text-center">
        <div class="input-group center-block top-5">
          <label for="input-img" data-toggle="tooltip" data-placement="bottom" title="Alterar foto">
            <img style="cursor: pointer;" src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="" class="img-circle">
            <form enctype="multipart/form-data" id="form-change-avatar" action="/minha-conta/editar/avatar" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <input id="input-img" type="file" name="avatar"  accept="image/*" style="display: none;" onchange="document.getElementById('form-change-avatar').submit();" />
            </form>
          </label>
        </div>
        <input id="input-img" type="file"  accept="image/*" style="display: none;" />
        <h4 class="green-third">{{$user->name or $profile->user->name}}</h4>
      </div>

      <hr>

      {{-- MENU DASHBOARD --}}
      @include('layouts.includes.menu-prof')

    @else

      {{-- REGISTER STEPS --}}
      <div>
        <span style="font-size: 18px;" class="green-third">1) Criar conta</span>
        <span class="green-third glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="green-third">2) Categorias</span>
        <span class="green-third glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 20px;" class="cyan-third"><b>3) Serviços</b></span>
        <span class="cyan-third glyphicon glyphicon-plus-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="text-muted">4) Especialidades</span>
        <span class="text-muted glyphicon glyphicon-question-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="text-muted">5) Perfil </span>
        <span class="text-muted glyphicon glyphicon-question-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <h4 class="text-left" style="margin-top: 15%;">Concluído</h4>
      <div class="progress" style="margin-top: 0%">
        <div class="progress-bar progress-bar-success" style="width: 40%;">
          <span>2 de 5</span>
        </div>
      </div>

    @endif

  </div>
  
  {{-- MAIN - CONTENT --}}
  <div style="background-color: #FFFFFF; border: 1px solid #ECECEC;" class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">

    {{-- ************** Mensagens de Sessão **************** --}}
    {{-- Erro ao atualizar --}}
    @if (session('erro-atualizar'))
      <span style="display: none;" id="erro-atualizar" class="help-block">
        <strong class="text-success">{{ session('erro-atualizar') }}</strong>
      </span>
    @endif
    {{-- Categorias atualizadas --}}
    @if (session('categorias-atualizadas'))
      <span style="display: none;" id="categorias-atualizadas" class="help-block">
        <strong class="text-success">{{ session('categorias-atualizadas') }}</strong>
      </span>
    @endif
    {{-- Foto atualizada --}}
    @if (session('foto-atualizada'))
      <span style="display: none;" id="foto-atualizada" class="help-block">
        <strong class="text-success">{{ session('foto-atualizada') }}</strong>
      </span>
    @endif

    @if(count($profile->servicos) != 0)
      <h1 class="page-header green-third">Editar serviços</h1>
    @else
      <h1 class="page-header green-third">Cadastrar serviços</h1>
    @endif
    <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">&raquo; {{ $error }}</h4> @endforeach @endif</span>

    <div {{-- style="background-color: white; box-shadow: 0px 0px 1px #AEAEAE;" --}} class="row placeholders">

      {{-- FORM EDITAR SERVICOS --}}
      @include('layouts.includes.form-editar-servicos')
      
    </div>
      

  </div>

@endsection

@section('footer')
  {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
  {{-- Tooltips Bootstrap --}}
  <script src="{{ asset('js/tooltips.js') }}"></script>
  {{-- Jquery BlockUI --}}
  <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
  {{-- JQuery Validation --}}
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  {{-- Apenas para rendereizar o blockUI loading padrão --}}
  <script src="{{ asset('js/validations/minha-conta-validation-blockUI.js') }}"></script>
  {{-- Dados atualizados/Erro ao atualizar, mensaagens de sessão --}}
  <script src="{{ asset('js/notifications/mensagens-sessao.js') }}"></script>
@endpush