@extends('layouts.master-fluid')

@section('title') Minha Conta - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
      
  {{-- SIDEBAR-NAV --}}
  <div style="border: 1px solid #ECECEC;" class="col-sm-4 col-md-3 col-lg-2 sidebar">

    {{-- IMAGE USER --}}
    <div class="text-center">
      <div class="input-group center-block top-5">
        <label for="input-img" data-toggle="tooltip" data-placement="bottom" title="Alterar foto">
          <img style="cursor: pointer;" src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="user_image" class="img-circle">
          <form enctype="multipart/form-data" id="form-change-avatar" action="/minha-conta/editar/avatar" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input id="input-img" type="file" name="avatar"  accept="image/*" style="display: none;" onchange="document.getElementById('form-change-avatar').submit();" />
          </form>
        </label>
      </div>
      <input id="input-img" type="file"  accept="image/*" style="display: none;" />
      <h4 class="green-third">{{substr($user->name, 0, 20)}}</h4>
    </div>

    <hr>

    {{-- MENU DASHBOARD --}}
    @if(Auth::user()->role == 'prof')
      {{-- Menu prof --}}
      @include('layouts.includes.menu-prof')
    @else
      {{-- Menu user --}}
      @include('layouts.includes.menu-user')
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

  <div style="background-color: #FFFFFF; border: 1px solid #ECECEC;" class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
    <h1 class="page-header green-secondary">Minha conta</h1>

    <div class="row">

      {{-- ************** Mensagens de Sessão **************** --}}
      {{-- Erro ao atualizar --}}
      @if (session('erro-atualizar'))
        <span style="display: none;" id="erro-atualizar" class="help-block">
          <strong class="text-danger">{{ session('erro-atualizar') }}</strong>
        </span>
      @endif
      {{-- Dados atualizados --}}
      @if (session('dados-atualizados'))
        <span style="display: none;" id="dados-atualizados" class="help-block">
          <strong class="text-success">{{ session('dados-atualizados') }}</strong>
        </span>
      @endif
      {{-- Foto atualizada --}}
      @if (session('foto-atualizada'))
        <span style="display: none;" id="foto-atualizada" class="help-block">
          <strong class="text-success">{{ session('foto-atualizada') }}</strong>
        </span>
      @endif

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 placeholder">
        @if(Auth::user()->role == 'prof')
          @include('layouts.includes.form-editar-prof')
        @else
          @include('layouts.includes.form-editar-user')
        @endif
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 placeholder">
        @include('layouts.includes.actions-minha-conta')
      </div>

    </div>

  </div>

@endsection

@section('footer')
  {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  {{-- check-uncheck.js --}}
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
  {{-- JQuery/JQuery Mask Plugins --}}
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
   {{-- Eventos do Formulário --}}
  <script src="{{ asset('js/check-prof-mask-inputs.js') }}"></script>
  {{-- Tooltips Bootstrap --}}
  <script src="{{ asset('js/tooltips.js') }}"></script>
  {{-- Jquery BlockUI --}}
  <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
  {{-- JQuery Validation --}}
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  {{-- Alterar Senha validação e blockUI loading --}}
  <script src="{{ asset('js/validations/alterar-senha-validation-blockUI.js') }}"></script>
  {{-- Iniciar modal alterar-senha caso haja erro após o request --}}
  <script src="{{ asset('js/iniciar-modais.js') }}"></script>
  {{-- Editar conta validação e blockUI loading --}}
  <script src="{{ asset('js/validations/minha-conta-validation-blockUI.js') }}"></script>
  {{-- Dados atualizados/Erro ao atualizar, mensagens de sessão --}}
  <script src="{{ asset('js/notifications/mensagens-sessao.js') }}"></script>
@endpush