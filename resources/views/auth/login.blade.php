@extends('layouts.master')

@section('title') Login - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
  <div class="row padding-top-2">
    <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
      <div class="panel panel-default shadow-1">
        <div class="panel-body">
          <h3 class="text-center cyan-third font-roboto">ENTRAR</h3>
          <hr>

          <form role="form" method="POST" action="{{ route('postLogin') }}" style="padding: 0px 20px 20px 20px;">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="email" class="control-label cor-default">Email:</label>
              <input id="email" type="email" class="form-control" name="email" placeholder="exemplo@exemplo.com" maxlength="255" value="{{ old('email') }}" autofocus />
            </div>

            <div class="form-group">
              <label for="password" class="control-label cor-default">Senha:</label>
              <input id="password" type="password" class="form-control" name="password" placeholder="*****************" maxlength="255" />
              <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <b class="text-danger">{{ $error }}</b> @endforeach @endif</span>
            </div>

            <div class="form-group text-right">
              <a href="{{url('password/reset')}}">
                <i>Esqueci minha senha</i>
              </a>
            </div>

            <div class="form-group">
              <div class="text-center">
                <button type="submit" class="btn-green-large">ENTRAR</button>
              </div>
            </div>

            <hr>
            <div class="form-group text-center">
              <h4>Ainda não é cadastrado?</h4>
              <span><a style="padding-top: 13px;" class="btn btn-cyan-large" href="{{route('cadastrar')}}">CADASTRAR AGORA</a><span>
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
