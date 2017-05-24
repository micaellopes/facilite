@extends('layouts.master-fluid')

@section('title') {{ $categoria->name or "Facilite Serviços - Categorias"}}  @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')

  {{-- BreadCrumb --}}
  <ol class="breadcrumb">
    <li><span class="glyphicon glyphicon-menu-right" style="font-size: 12px;"></span><a href="{{ route('home') }}"> Pagina inicial</a></li>
    <li><a href="{{ route('categorias') }}">Categorias</a></li>
    <li class="active">{{$categoria->name}}</li>
  </ol>

  <h3>Serviços disponíveis para {{$categoria->name}}:</h3>
  <hr>
  <div class="col-lg-1 col-md-1 col-sm-2"></div>

    <!-- BLOCO PRINCIPAL -->
    <div class="col-lg-10 col-md-10 col-sm-8">
      @forelse($servicos as $servico)
        
        <div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
          <h3><a href="{{ url("/categorias/$categoria->url/$servico->url ") }}">{{ $servico->name }}</a></h3>
        </div>
        
      @empty
        <h1>Não foi possível carregar o conteúdo...</h1>
      @endforelse
    </div>
  <div class="col-lg-1 col-md-1 col-sm-2"></div>

@endsection

@section('footer')
	{{-- @include('layouts.includes.footer') --}}
@endsection