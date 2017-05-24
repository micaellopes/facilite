@inject('categorias', 'App\InjectCategorias')
@inject('solicitacoes', 'App\InjectSolicitacoes')

<nav {{-- style="box-shadow: 0px 1px 5px #888888" --}} id="navbar" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      {{-- Menu Hamburguer SM/XS --}}
      <button id="menu-hamburguer" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      {{-- Logo Facilite --}}
      <a id="logo" class="navbar-brand" href="{{ route('home') }}">
        Facilite Serviços
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">

      <ul id="navbar-menu" class="nav navbar-nav navbar-right text-center">

        {{-- Menu se for visitante --}}
        @if( Auth::guest() )
          <li><a id="navbar-entrar" href="{{ route('login') }}">ENTRAR</a></li>
          <li><a id="navbar-cadastrar" href="{{ route('cadastrar') }}">CADASTRAR</a></li>


        {{-- Menu se for prof --}}
        @elseif( Auth::user()->role == 'prof' )
          @include('layouts.includes.navbar-menu-prof')
        
        {{-- Menu se for user --}}
        @else
          @include('layouts.includes.navbar-menu-user')
        @endif
        
      </ul>
      
      {{-- LG & XS --}}
      {{-- NavBar Categorias --}}
      <ul id="navbar-categorias" class="nav navbar-nav text-center text-uppercase visible-lg visible-xs">
        {{-- Service Injection das Categorias do NavBar --}}
        @forelse( $categorias->injectCategorias() as $categoria )

        <li class="dropdown dropdown-categorias">
          <a href="{{ url("/categorias/$categoria->url") }}">{{ $categoria->name }}</a>
          <div class="hidden-xs">
            <ul class="dropdown-menu text-capitalize dropdown-servicos">
              @forelse( $categoria->servicos as $servico)
                <li>
                  <a href="{{ url("/categorias/$categoria->url/$servico->url ") }}">{{ $servico->name }} </a>
                </li>
              @empty
                <p>Não foi possível carregar os serviços...</p>
              @endforelse
            </ul>
          </div>
        </li>
        @empty
          <h4>Não foi possível carregar as categorias...</h4>
        @endforelse
      
      </ul>

      {{-- MD A& SM --}}
      <ul id="navbar-categorias-md" class="nav navbar-nav text-center visible-md visible-sm">
        <li class="dropdown dropdown-categorias">
          <a href="{{route('categorias')}}">CATEGORIAS</a>
          <ul class="dropdown-menu dropdown-servicos">
            @forelse( $categorias->injectCategorias() as $categoria )
              <li class="dropdown dropdown-categorias">
                <a href="{{ url("/categorias/$categoria->url") }}">{{ $categoria->name }} </a>
              </li>
            @empty
              <h4>Não foi possível carregar as categorias...</h4>
            @endforelse
          </ul>
        </li>
      </ul>

    </div>
</nav>