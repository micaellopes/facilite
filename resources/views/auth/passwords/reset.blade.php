@extends('layouts.master-fluid')

@section('title') Redefinir Senha - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
  <div class="row padding-top-2">
    <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
      <div class="panel panel-default shadow-1">
        <div class="panel-body">
          <h3 class="text-center cyan-third font-roboto">REDEFINIR SENHA</h3>
          <hr>

          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif

          <form id="form_reset_password" role="form" method="POST" action="{{ url('/password/reset') }}" style="padding: 0px 20px 20px 20px;">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
              <label for="email" class="control-label cor-default">Email:</label>
              <input id="email" type="email" class="form-control" name="email" placeholder="exemplo@exemplo.com" maxlength="255" value="{{ $email or old('email') }}" autofocus />

              @if ($errors->has('email'))
                <span class="help-block font-12">
                  <strong class="text-danger">{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="password" class="control-label cor-default">Nova Senha:</label>
              <input id="password" type="password" class="form-control" name="password" placeholder="*****************"/>
            </div>

            <div class="form-group">
              <label for="password_confirmation" class="control-label cor-default">Confirmar Senha:</label>
              <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="*****************" />
              
              @if ($errors->has('password'))
                  <span class="help-block font-12">
                      <strong class="text-danger">{{ $errors->first('password') }}</strong>
                  </span>
              @endif

            </div>

            <div class="form-group padding-top-6">
              <div class="text-center">
                <button type="submit" class="btn-green-large">REDEFINIR SENHA</button>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
    {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  {{-- Jquery BlockUI --}}
  <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
  {{-- JQuery Validation --}}
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  {{-- Recuperar Senha Validation e BlockUI --}}
  <script src="{{ asset('js/validations/recuperar-senha-validation-blockUI.js') }}"></script>
@endpush
