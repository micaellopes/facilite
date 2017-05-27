{{-- @inject('categorias', 'App\InjectCategorias') --}}
@extends('layouts.master-fluid')

@section('title') {{ $servico->name or "Serviços - Facilite Serviços" }} - Facilite Serviços  @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
  
  {{-- BreadCrumb --}}
  <ol class="breadcrumb">
    <li><span class="glyphicon glyphicon-menu-right" style="font-size: 12px;"></span><a href="{{ route('home') }}"> Pagina inicial</a></li>
    <li><a href="{{ route('categorias') }}">Categorias</a></li>
    <li><a href="{{ url("/categorias/$categoria->url") }}">{{$categoria->name}}</a></li>
    <li class="active">{{$servico->name}}</li>
  </ol>

	<h4>{{count($profissionais)}} Profissionais encontrados em "{{$servico->name}}" @if(isset($filtroEspecialidade))<i>({{$filtroEspecialidade->name}})</i>@endif :</h4>
  <hr>
  {{-- ROW --}}
  <div class="row">
    
    <!-- ~***********************************************************************
    ****************** BLOCO PRINCIPAL 1 ESQUERDA (FILTROS) *********************
    ***************************************************************************** -->
    <div class="col-lg-2 col-md-3 col-sm-3">

      {{-- ESPECIALIDADES --}}
      <h4>Especialidades:</h4>
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="checkbox">
            <nav>
              <ul class="nav nav-stacked">
                @forelse($especialidades as $especialidade)
                  <li>
                    <a  class="@if( isset($filtroEspecialidade) && $filtroEspecialidade->id == $especialidade->id ) active @else text-muted @endif" href="{{url("/categorias/$categoria->url/$servico->url/$especialidade->url")}}">{{$especialidade->name}}</a>
                  </li>
                    {{-- <a class="text-muted" href="{{url("/categorias/$categoria->url/$servico->url/$especialidade->url")}}">{{$especialidade->name}}</a> --}}
                    {{-- <label for="check_{{$especialidade->id}}">
                      <input type="checkbox" id="check_{{$especialidade->id}}" value="{{$especialidade->id}}">{{$especialidade->name}}
                  </label> --}}
                @empty
                  <div><p>Não foi possível carregar o conteúdo...</p></div>
                @endforelse
                  <li>
                  <a class="text-muted" href="{{url("/categorias/$categoria->url/$servico->url/")}}">Todas</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      {{-- //ESPECIALIDADES --}}
      
      {{-- FILTROS --}}
      <h4>Filtros:</h4>
      <div class="panel panel-default">
        <div class="panel-body">
            <div class="checkbox">
              <label for="checkFoto">
                <input type="checkbox" id="checkFoto" value="option1">Com foto
            </div>
            <div class="checkbox">
              <label for="checkDesc">
                <input type="checkbox" id="checkDesc" value="option2">Com descrição
            </div>
            <div class="checkbox">
              <label for="checkCartao">
                <input type="checkbox" id="checkCartao" value="option3">Aceita cartão
            </div>
        </div>
      </div>
      {{-- //FILTROS --}}

      {{-- PESQUISAR POR NOME --}}
      <form action="" method="GET">
        <label for="searchNome"><h4>Nome:</h4></label>
        <div class="text-center">
          <input type="text" id="searchNome" name="s" class="form-control">
          <button type="submit" class="btn btn-primary btn-sm top-5">Buscar</button>
        </div>
      </form>
      {{-- //PESQUISAR POR NOME --}}

    </div>
    {{-- //BLOCO PRINCIPAL 1 ESQUERDA (FILTROS) --}}
    
    <!-- *************************************************************************
    *************** BLOCO PRINCIPAL 2 CONTEÚDO (LISTA DE PROFISSIONAIS) **********
    ******************************************************************************* -->
    <div class="col-lg-10 col-md-9 col-sm-9">
      @forelse($profissionais as $profissional)
        <div class="col-lg-4 col-md-6 col-sm-6">
          <h4 style="color: white;"> - </h4> <!-- GAMBIARRA -->
          <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">
            <div class="panel-body clearfix"> <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
              <div class=" col-md-4  text-center">  <!-- BLOCO FOTO PROFISSIONAL -->
                <img style="width: 80; height: 80; object-fit: cover;" src="/uploads/avatars/{{ $profissional->user->avatar }}" alt="" class="img-circle">
              </div>
              {{-- BLOCO NOME E ESTRELAS PROFISSIONAL --}}
              <div class="col-md-8 ">
                <h4 class="panel-title text-center"><b>{{$profissional->user->name}}</b></h4>
                <hr>
                {{-- ESTRELAS --}}
                <div class="text-center">
                  <div class="bar-stars">
                    <span class="bg" style="width: @if($profissional->avaliacoes()->count() != 0){{ round($profissional->avaliacoes()->sum('estrelas') / $profissional->avaliacoes()->count(),2) * 20  }}@else 0 @endif%"></span>
                    <div class="stars">
                      @for($i = 0; $i < 5 ; $i ++)
                        <span class="star">
                            <span class="absoluteStar"></span>
                        </span>
                      @endfor
                    </div>
                  </div>
                </div>
                {{-- //ESTRELAS --}}
              </div>
            </div>
            <div class="panel-body">
              {{-- @forelse($profissional->servicos as $servico)
                <span>•{{$servico->name}}&nbsp;</span>
              @empty
                <span>Não foi possível carregar os serviços...</span>
              @endforelse --}}
              <div class="text-justify">
                {{-- <i><p>{{substr($profissional->description, 0, 262)}}</p></i> --}}
                <p>-</p>
              </div>
              <hr>
              <p>-</p>
            </div>

            {{-- Se for visitante abre modal-login --}}
            @if( Auth::guest() )
              <div class="panel-footer text-center">
                <a href="#login" data-toggle="modal" data-target="#modalLogin">Ver Perfil</a>
              </div>
              @include('layouts.includes.modal-login')

            {{-- Se não mostra perfil do profissional --}}
            @else
              <div class="panel-footer text-center">
                <a href="{{url("/profiles/$profissional->url_perfil")}}">Ver Perfil</a>
              </div>
            @endif

          </div>
        </div>
        @empty
          <h2>Nenhum profissional encontrado...</h2>
        @endforelse

    </div>
    {{-- //BLOCO PRINCIPAL 2 CONTEÚDO (LISTA DE PROFISSIONAIS) --}}
  </div>
   {{-- //ROW --}}

@endsection

@section('footer')
	{{-- @include('layouts.includes.footer') --}}
@endsection