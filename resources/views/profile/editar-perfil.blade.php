@extends('layouts.master-fluid')

@section('title') Editar Perfil - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')

  {{-- SIDEBAR-NAV --}}
  <div class="col-sm-4 col-md-3 col-lg-2 sidebar">

    @if($profile->status == 'active')

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
        <span style="font-size: 18px;" class="green-third">3) Serviços</span>
        <span class="green-third glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="green-third">4) Especialidades</span>
        <span class="green-third glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 20px;" class="cyan-third"><b>5) Perfil</b></span>
        <span class="cyan-third glyphicon glyphicon-plus-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <h4 class="text-left" style="margin-top: 15%;">Cadastro:</h4>
      <div class="progress" style="margin-top: 0%;">
        <div class="progress-bar progress-bar-success" style="width: 80%; background-color: #5BB400;">
          <span>4 de 5</span>
        </div>
      </div>

    @endif

  </div>

  {{-- IMAGE USER MOBILE --}}
  <div class="visible-xs text-center" style="background-color: white; border: 1px solid #ECECEC; padding: 10px;">
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
    </div>
  </div>
  
  {{-- MAIN - CONTENT --}}
  <div style="background-color: #FFFFFF; border: 1px solid #ECECEC;" class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">

    {{-- ************** Mensagens de Sessão **************** --}}
    {{-- Especialidades atualizadas --}}
    @if (session('especialidades-atualizadas'))
      <span style="display: none;" id="especialidades-atualizadas" class="help-block">
        <strong class="text-success">{{ session('especialidades-atualizadas') }}</strong>
      </span>
    @endif
    {{-- Url alterada --}}
    @if (session('url-alterada'))
      <span style="display: none;" id="url-alterada" class="help-block">
        <strong class="text-success">{{ session('url-alterada') }}</strong>
      </span>
    @endif
    {{-- Desc alterada --}}
    @if (session('desc-alterada'))
      <span style="display: none;" id="desc-alterada" class="help-block">
        <strong class="text-success">{{ session('desc-alterada') }}</strong>
      </span>
    @endif
    {{-- Foto atualizada --}}
    @if (session('foto-atualizada'))
      <span style="display: none;" id="foto-atualizada" class="help-block">
        <strong class="text-success">{{ session('foto-atualizada') }}</strong>
      </span>
    @endif

    @if($profile->status == 'active')
      <h1 class="page-header green-third">Editar perfil</h1>
    @else
      <h1 class="page-header green-third">Cadastrar perfil</h1>
    @endif
      
    {{-- FORM EDITAR PERFIL --}}
    @include('layouts.includes.form-editar-perfil')

  </div>

@endsection

@section('footer')
  {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  <script src="{{ asset('js/show-hidden-buttons.js') }}"></script>
  {{-- Tooltips Bootstrap --}}
  <script src="{{ asset('js/tooltips.js') }}"></script>
  {{-- Jquery BlockUI --}}
  <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
  {{-- JQuery Validation --}}
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  {{-- Apenas para rendereizar o blockUI loading padrão --}}
  <script src="{{ asset('js/validations/minha-conta-validation-blockUI.js') }}"></script>
  {{-- Dados atualizados/Erro ao atualizar, mensagens de sessão --}}
  <script src="{{ asset('js/notifications/mensagens-sessao.js') }}"></script>
@endpush