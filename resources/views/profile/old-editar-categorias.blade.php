@extends('layouts.master-fluid')

@section('title') Editar Categorias - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  {{-- Primeiro cadastro (Se não existir categorias cadastradas anteriormente, esconde sidebar) --}}
  @if(count($profile->categorias) != 0)
    {{-- SideBar --}}
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

      {{-- Imagem e botão 'Mudar foto' --}}
      <div class="text-center">
        <div class="input-group center-block">
          <label id="img-perfil" for="input-img">
            <img style="cursor: pointer;" src="{{ asset('img/perfil.png') }}" alt="img_perfil" class="img-circle">
            <br>
            <a id="btn-img-perfil" style="display: none;" class="btn btn-primary btn-sm">Mudar foto</a>
          </label>
        </div>
        <input id="input-img" type="file"  accept="image/*" style="display: none;">
      </div>
      
      {{-- Nome Prof --}}
      <div class="text-center">
        <h4><b>{{$profile->user->name or ""}}</b></h4>
        <hr class="hidden-xs">
      </div>
      
      {{-- Menu SideBar --}}
      <div class="hidden-xs">
        {{-- MENU EDITAR-CONTA --}}
        @if(Auth::user()->role == 'prof')
          {{-- Profissional logado, exibe menu-prof --}}
          @include('layouts.includes.menu-prof')
        @else
          {{-- Exibe menu-user --}}
          @include('layouts.includes.menu-user')
        @endif
        {{-- //MENU EDITAR-CONTA --}}
      </div>
      {{-- //Menu SideBar --}}

    </div>
    {{-- SideBar --}}
  @else
    {{-- Register Steps --}}
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
      <div>
        <span style="font-size: 18px;" class="text-success">1) Criar conta</span>
        <span class="text-success glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 20px;" class="text-primary"><b>2) Categorias</b></span>
        <span class="text-primary glyphicon glyphicon-plus-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="text-muted">3) Serviços</span>
        <span class="text-muted glyphicon glyphicon-question-sign pull-right" style="font-size: 22px;"></span>
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
      <h4 class="text-left" style="margin-top: 15%;">Cadastro:</h4>
      <div class="progress" style="margin-top: 0%">
        <div class="progress-bar progress-bar-success" style="width: 20%;">
          <span>1 de 5</span>
        </div>
      </div>
    </div>
    {{-- //Register Steps --}}
  @endif
  
  {{-- Título Page --}}
  <div class="col-lg-offset-3 col-md-offset-4 col-sm-offset-5 col-xs-offset-0">
    @if(count($profile->categorias) != 0)
      <h2>Editar Categorias</h2>
    @else
      <h2>Cadastrar Categorias</h2>
    @endif
    <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">&raquo; {{ $error }}</h4> @endforeach @endif</span>
    <hr style="margin-bottom: 4%">
  </div>
  {{-- //Título Page --}}

    {{-- FORM - Se existir categoria cadastrada, post-editar. Se não, post-cadastrar --}}
    <form action="@if(count($profile->categorias) != 0){{route('post-editar-categorias')}}@else{{route('post-cadastrar-categorias')}}@endif" method="POST">
      
      {{ csrf_field() }}
      <div class="col-lg-offset-1 col-lg-7 col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-7 col-xs-12" style="padding: 0px;">
      <!-- BLOCO CATEGORIAS -->
        @forelse($categorias as $categoria)
          {{-- CATEGORIA --}}
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 0px;">
            <div id="div_bg_{{$categoria->id}}">
              <span id="check_span_{{$categoria->id}}" name="check_span_{{$categoria->id}}" class="glyphicon glyphicon-unchecked" style="font-size: 25px; color: #272727;"></span>
              <label id="label_cat_{{$categoria->id}}" class="text-center" for="cat_{{$categoria->id}}" style="font-weight: normal; font-size: 27px;">
                <input type="checkbox" id="cat_{{$categoria->id}}" name="cat_{{$categoria->id}}" value="{{$categoria->id}}" 

                  @forelse($profile->categorias as $profCategoria)
                    @if( isset($profile->categorias) && $profCategoria->id == $categoria->id )
                      checked
                    @endif
                  @empty
                  @endforelse

                style="display: none;"/>
                {{$categoria->name}}
              </label>
            </div>
          </div>
          {{-- //CATEGORIA --}}
        @empty
          <h1>Não foi possível carregar as categorias...</h1>
        @endforelse
      {{-- //BLOCO CATEGORIAS --}}
      </div>

        {{-- BLOCO BOTÃO --}}
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 top-8">
          <div class="form-group">
            <div class="text-center">
              @if(count($profile->categorias) != 0)
                <button type="submit" class="btn btn-green-medium">Salvar <span class="glyphicon glyphicon-chevron-right"></button>
              @else
                <button type="submit" class="btn btn-md btn-primary">Avançar <span class="glyphicon glyphicon-chevron-right"></span></button>
              @endif
            </div>
          </div>
        </div>
        {{-- //BLOCO BOTÃO --}}
      
    </form>

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <script>
    
    $('#img-perfil').hover(
      function() {
        $('#btn-img-perfil').show();
      }, function() {
        $('#btn-img-perfil').hide();
      }
    );

  </script>
@endpush
