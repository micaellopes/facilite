@extends('layouts.master-fluid')

@section('title') {{$profile->user->name or "Perfil Profissional"}} - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
  <!-- ROW -->
  <div class="row">
    
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    ~~~~~~~~~~~~~~~~ BLOCO PRINCIPAL 1 - ESQUERDA (AVALIAÇÃO PROFISSIONAL) ~~~~~~~~~~~~~~~~~~~ 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

      <!-- AVALIAÇÃO -->
      <div style="border: 2px solid #ECECEC; padding: 25px 15px 25px 15px;" class="panel panel-default">
        <div class="panel-body">
            <h3 style="margin-top: 0px;" class="text-center cyan-third font-roboto">AVALIAÇÃO</h3>
            <hr>
            <div class="text-center">
            <h4 class="font-70 cyan-primary" id="average">
              @if($profile->avaliacoes > 1)
                {{ round($average = $profile->estrelas / $profile->avaliacoes, 2) }}

              @else
                0
              @endif

            </h4>
          </div>
          <hr>

          <div class="">
            <meta name="token" content="{{ csrf_token() }}">
            <!-- Avaliação -->
            <input type="hidden" name="profissional_id" value="{{ $profile->id  }}">
            <div class="bar-stars">
              <span class="bg"></span>
              <div class="stars">
                @for($i = 0; $i < 5 ; $i ++)
                  <span class="star">
                <span class="absoluteStar"></span>
            </span>
                @endfor
              </div>
            </div>
            <!-- //Avaliação-->
          </div>

        </div>  
      </div>
      <!-- AVALIAÇÃO -->
      

      <!-- COMENTÁRIOS -->
      <div style="border: 2px solid #ECECEC; padding: 25px 15px 25px 15px;" class="panel panel-default">
        <div class="panel-body">
          <h3 style="margin-top: 0px;" class="text-center cyan-third font-roboto">COMENTÁRIOS</h3>
          <hr>
          <div class="text-center">

            <!-- CARROUSEL -->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

                @forelse($profile->comentarios as $comentario)
                  <div @if( $comentario->id == 1 ) class="item active" @else class="item" @endif>
                    <img class="img-circle center-block" src="/uploads/avatars/{{$comentario->user->avatar}}" alt="user_avatar{{$comentario->user->id}}" data-toggle="tooltip" data-placement="right" title="{{$comentario->user->name}}" />
                    <p class="cyan-primary font-16 padding-top-6">{{$comentario->comentario}}</p>
                  </div>
                @empty
                  <p class="cyan-secondary font-16">Este profissional ainda não possui comentários...</p>
                @endforelse

              </div>

            </div>

            <hr>

            <button type="button" class="btn btn-green-small" data-toggle="modal" data-target="#modalEscreverComentario">
              ESCREVER COMENTÁRIO
            </button>

          </div>
        </div>
      </div>
    @include('layouts.includes.modal-escrever-comentario')

      <!-- //COMENTÁRIOS -->
      

    </div>
    <!-- //BLOCO PRINCIPAL 1 (AVALIAÇÃO PROFISSIONAL) -->

    
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    ~~~~~~~~~~~ BLOCO PRINCIPAL 2 PERFIL (CONTRATAR) ~~~~~~~~~~~ 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div style="border: 2px solid #ECECEC;" class="panel panel-default">

            <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
            <div class="panel-body clearfix">

              {{-- ******************* FOTO PROFISSIONAL ******************** --}}
              <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 text-center">
                <img src="/uploads/avatars/{{ $profile->user->avatar }}" alt="" class="img-circle">
              </div>

              {{-- ************ NOME/SERVIÇOS PROFISSIONAL ************** --}}

                {{-- Display Desktop --}}
                <div class="visible-lg visible-md">
                  <div class="col-lg-6 col-md-6">
                    <h2><b>{{$profile->user->name}}</b></h2>
                    <hr>
                    <!-- ícones Serviços -->
                    <div class="">
                      @forelse($profile->servicos as $servico)
                        <span>•{{$servico->name}}&nbsp;</span>
                      @empty
                      @endforelse
                    </div>
                  </div>
                </div>
                {{-- *******//****** --}}

                {{-- Display Mobile (Centralizado) --}}
                <div class="visible-sm visible-xs text-center">
                  <div class="col-sm-7 col-xs-7">
                    <h2><b>{{$profile->user->name}}</b></h2>
                    <hr>
                  </div>
                  <!-- Ícones Serviços -->
                  <div class="">
                    @forelse($profile->servicos as $servico)
                      <span>•{{$servico->name}}&nbsp;</span>
                    @empty
                    @endforelse
                    <hr>
                  </div>
                </div>
                {{-- *************//************ --}}

              {{-- ********************* BLOCO VISU/CURTIDAS ********************** --}}
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="col-lg-7 col-md-12 col-sm-7 col-xs-6">
                  <div class="text-center">
                    <span class="glyphicon glyphicon glyphicon-eye-open" style="font-size: 16px;"></span> <span>{{$profile->visualizacoes}}</span> <label style="font-size: 13px">Visualizações</label>
                  </div>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-5 col-xs-6">
                  <div class="text-center">
                    <span class="glyphicon glyphicon-heart-empty" style="font-size: 16px;"></span> <span>0</span> <label style="font-size: 13px">Favoritos</label>
                  </div>
                </div>
                
                {{-- Se o perfil visitado for o mesmo do profissional logado, exibe botão editar perfil --}}
                @if( Auth::user()->id == $profile->user->id)
                  {{-- Botão Editar Perfil --}}
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <hr>
                    <a class="btn btn-cyan-small" href="{{route('editar-perfil')}}" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar Perfil</a>
                  </div>
                {{-- Se não, exibe o botão solicitar serviço --}}
                @else
                  {{-- Botão Soliciar Serviço --}}
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <hr>
                    <a class="btn btn-green-small" href="#solicitar-servico" role="button" data-toggle="modal" data-target="#modalSolicitarServico"> Solicitar Serviço</a>
                  </div>
                  @include('layouts.includes.modal-solicitar-servico')

                @endif
                
              </div>
            </div>
          </div>
        </div>
      </div>
      
      {{-- ************** Mensagens de Sessão **************** --}}
      {{-- Serviço solicitado --}}
      @if (session('servico-solicitado'))
        <span style="display: none;" id="servico-solicitado" class="help-block">
          <strong class="text-success">{{ session('servico-solicitado') }}</strong>
        </span>
      @endif
      
      {{-- ROW --}}
      <div class="row">
        <div class="col-lg-8 col-md-8">
          {{-- ESPECIALIDADES --}}
          <div style="border: 2px solid #ECECEC; padding: 25px 15px 25px 15px;" class="panel panel-default">
            <div class="panel-body">
              <h3 style="margin-top: 0px;" class="text-left cyan-third font-roboto">ESPECIALIDADES:</h3>
              <hr>
              <div class="">
                {{-- Lista os serviços cadastradas pelo profissional --}}
                @forelse($profile->servicos as $servico)
                  <h4 class="cyan-secondary font-20">{{$servico->name}}:</h4>
                  {{-- Lista as especialidades cadastradas pelo profissional --}}
                  @forelse($profile->especialidades->where('servico_id', $servico->id) as $especialidade)
                    <span class="green-third font-16">•{{$especialidade->name}}&nbsp;</span>
                  @empty
                  @endforelse

                @empty
                @endforelse
              </div>
      
              <!-- <h3 style="margin-top: 40px;" class="text-left cyan-third font-roboto">BIO:</h3>
              <hr>
              <p class="cyan-secondary font-16">{{$profile->description}}</p> -->
            </div>
          </div>

          {{-- BIOGRAFIA --}}
          <div style="border: 2px solid #ECECEC; padding: 25px 15px 25px 15px;" class="panel panel-default">
            <div class="panel-body">
              <h3 style="margin-top: 0px;" class="text-left cyan-third font-roboto">BIO:</h3>
              <hr>
              <p class="cyan-primary font-16">{{$profile->description or "Este profissional ainda não escreveu uma bio..."}}</p>
            </div>
          </div>
          {{-- //BIOGRAFIA --}}

          {{-- IMAGENS --}}
          <div style="border: 2px solid #ECECEC; padding: 25px 15px 25px 15px;" class="panel panel-default">
            <div class="panel-body">
              <h3 style="margin-top: 0px;" class="text-left cyan-third font-roboto">GALERIA:</h3>
              <hr>
              <p class="cyan-primary font-16">Este profissional ainda não possui fotos na galeria...</p>
            </div>
          </div>
          {{-- //IMAGENS --}}

        </div>

        <div class="col-lg-4 col-md-4">
          <!-- LOCAIS -->
          <div style="border: 2px solid #ECECEC; padding: 25px 15px 25px 15px;" class="panel panel-default">
            <div class="panel-body">
              <h3 style="margin-top: 0px;" class="text-center cyan-third font-roboto">LOCAIS</h3>
              <hr>
              <p class="cyan-primary font-16">Locais de atendimento do profissional...</p>
            </div>
          </div>     
          <!-- //LOCAIS-->

          <div style="border: 2px solid #ECECEC; padding: 25px 15px 25px 15px;" class="panel panel-default">
            <div class="panel-body">
              <h3 style="margin-top: 0px;" class="text-center cyan-third font-roboto">CALENDÁRIO</h3>
              <hr>
              <p class="cyan-primary font-16">Calendário do profissional...</p>
            </div>
          </div>

        </div>

      </div>
      <!-- //ROW -->

    </div>
    <!-- //BLOCO PRINCIPAL 1 PERFIL (BLOCO 1)-->

  </div><!-- //ROW-->

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
  {{-- Solicitar Serviço validation e blockUI --}}
  <script src="{{ asset('js/validations/solicitar-validation-blockUI.js') }}"></script>
  {{-- Dados atualizados/Erro ao atualizar, mensagens de sessão --}}
  <script src="{{ asset('js/notifications/mensagens-sessao.js') }}"></script>
  {{-- Escrever comentário validação e blockUI loading --}}
  <script src="{{ asset('js/validations/escrever-comentario-validation-blockUI.js') }}"></script>
  {{-- Iniiar modais com erros de formulário--}}
<script src="{{ asset('js/iniciar-modais.js') }}"></script>
<script src="{{ asset('js/avaliacao-stars.js') }}"></script>
@endpush