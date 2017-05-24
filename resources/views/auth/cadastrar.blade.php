@extends('layouts.master')

@section('title') Cadastrar - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
  <div class="row padding-top-2">
    <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
      <div class="panel panel-default shadow-1">
        <div class="panel-body">
          <h3 class="text-center cyan-third font-roboto">CADASTRAR</h3>
          <hr>

          <form id="form_cadastro" role="form" method="POST" action="{{ route('post-cadastrar') }}" style="padding: 0px 20px 20px 20px;">
            {{ csrf_field() }}

            <div class="form-group">
              <span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: 16px;"></span>
              <label id="label_role" for="role" style="font-weight: normal; font-size: 16px;">
                <input type="checkbox" id="role" name="role" style="display: none;" {{old('role') ? 'checked="checked"': ''}}/>Sou profissional
              </label>
            </div>

            <div class="form-group">
              <label for="name" class="control-label cor-default">Nome:</label>
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength="50" placeholder="Ex.: Maria José" autofocus/>
              @if ($errors->has('name'))
                <span class="help-block font-12">
                  <strong class="text-danger">{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="email" class="control-label cor-default">Email:</label>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="255" placeholder="Ex.: josemaria@gmail.com"/>
              @if ($errors->has('email'))
                <span class="help-block font-12">
                  <strong class="text-danger">{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group" id="formCpf" style="display: none">
              <label for="cpf" class="control-label cor-default">Cpf:</label>
              <input disabled type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" maxlength="14" placeholder="000.000.000-00"/>
              @if ($errors->has('cpf'))
                  <span class="help-block font-12">
                      <strong class="text-danger">{{ $errors->first('cpf') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group" id="formTel" style="display: none">
              <label for="tel" class="control-label cor-default">Tel:</label>
              <input disabled type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" maxlength="15" placeholder="(00) 00000-0000"/>
              @if ($errors->has('tel'))
                  <span class="help-block font-12">
                      <strong class="text-danger">{{ $errors->first('tel') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group">
              <label for="password" class="control-label cor-default">Senha:</label>
              <input id="password" type="password" class="form-control" name="password" maxlength="255" placeholder="*****************"/>
            </div>

            <div class="form-group">
              <label for="password_confirmation" class="control-label cor-default">Confirmar senha:</label>
              <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" maxlength="255" placeholder="*****************"/>
              
              @if ($errors->has('password'))
                  <span class="help-block font-12">
                      <strong class="text-danger">{{ $errors->first('password') }}</strong>
                  </span>
              @endif

            </div>

            <div class="form-group">
              <div class="text-center">
                <button id="btn-cadastrar" type="submit" class="btn-green-large">CADASTRAR</button>
              </div>
            </div>

            <hr>
            <div class="form-group text-center">
              <h4>Já possui cadastro?</h4>
              <span><a style="padding-top: 13px;" class="btn btn-cyan-large" href="{{route('login')}}">FAZER LOGIN</a><span>
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
  {{-- JQuery Mask Plugin --}}
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
  {{-- check-uncheck.js --}}
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
   {{-- Eventos do Formulário --}}
  <script src="{{ asset('js/check-prof-mask-inputs.js') }}"></script>
  {{-- Jquery BlockUI --}}
  <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
  {{-- JQuery Validation --}}
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  {{-- Register Validation e BlockUI --}}
  <script src="{{ asset('js/validations/cadastrar-validation-blockUI.js') }}"></script>
@endpush