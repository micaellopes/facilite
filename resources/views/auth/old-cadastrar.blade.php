@extends('layouts.master')

@section('title') Cadastrar - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
    <div class="row">
        <!-- CADASTRO -->
        <div class="col-lg-6 col-md-6">
          <h2 class="text-center">Cadastrar</h2>
          <form id="form_prof" class="form-horizontal" action="{{ route('post-cadastrar') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
              <div class="col-md-offset-2 col-md-9">
                <span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: color: #272727"></span>
                <label id="label_role" for="role" style="font-weight: normal; font-size: 16px;">
                  <input type="checkbox" id="role" name="role" style="display: none;" {{old('role') ? 'checked="checked"': ''}}/>Sou profissional
                </label>
              </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-2 control-label">Nome:</label>
              <div class="col-md-9">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength="50" placeholder="Ex.: Maria José" autofocus/>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-2 control-label">Email:</label>
              <div class="col-md-9">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="60" placeholder="Ex.: josemaria@gmail.com"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}" id="formCpf" style="display: none">
              <label for="cpf" class="col-md-2 control-label">Cpf:</label>
              <div class="col-md-9">
                <input disabled type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" maxlength="14" placeholder="000.000.000-00"/>
                @if ($errors->has('cpf'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cpf') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" id="formTel" style="display: none">
              <label for="tel" class="col-md-2 control-label">Tel:</label>
              <div class="col-md-9">
                <input disabled type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" maxlength="15" placeholder="(00) 00000-0000"/>
                @if ($errors->has('tel'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tel') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-2 control-label">Senha:</label>
              <div class="col-md-9">
                <input id="password" type="password" class="form-control" name="password" maxlength="50" placeholder="*****************"/>
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password_confirmation" class="col-md-2 control-label">Confirmar senha:</label>
              <div class="col-md-9">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" maxlength="50" placeholder="*****************"/>
                
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

              </div>
            </div>

            <div class="form-group">
              <div class="text-center">
                <button id="btnSubmit" type="submit" class="btn-cadastrar">CADASTRAR</button>
              </div>
            </div>
            
          </form>
        </div>
        <!-- //CADASTRO -->

        <!-- LOGIN -->
        <div class="top-12 visible-xs"></div>
        <div class="col-lg-6 col-md-6 text-center">
          <h2>Já possui cadastro?</h2>
          <p><a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Entrar agora &raquo;</a></p>
        </div>
        <!-- //LOGIN -->
    </div>
@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection


@push('scripts')
  {{-- check-uncheck.js --}}
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
  {{-- JQuery/JQuery Mask Plugins --}}
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
   {{-- Eventos do Formulário --}}
  <script src="{{ asset('js/check-prof-mask-inputs.js') }}"></script>
    
@endpush