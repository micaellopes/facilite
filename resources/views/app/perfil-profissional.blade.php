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

      <!-- NOTAS DE AVALIAÇÃO (FEEDBACK) -->
      <div class="panel panel-default">
        <div class="panel-body">
          
            <h3><b>Avaliação:</b></h3>
            <div class="text-center">
            <h4 class="font-60">0.0</h4>
            <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
            <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
            <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
            <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
            <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
            <hr>
          </div>
          
          <div class="text-right" style="margin-right: 17%;">
            <span class="font-16">Serviço: 
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
            </span>
          

            <span class="font-16">Pontualidade: 
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
            </span>

            <span class="font-16">Preço: 
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
            </span> 

            <span class="font-16">Quesito 4: 
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
            </span> 

            <span class="font-16">Quesito 5: 
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
            </span> 
          </div>
          <hr>
          <div class="text-center">
            <button type="submit" class="btn btn-warning btn-lg">Avaliar</button>
          </div>
        </div>
        <!-- //PAINEL -->
      </div>
      <!-- //NOTAS DE AVALIAÇÃO (FEEDBACK) -->
      

      <!-- COMENTÁRIOS -->
      <div class="panel panel-default">
        <div class="panel-body">
          <h3 class="margin-0"><b>Comentários:</b></h3>
          <hr>
          <div class="text-center">
            {{-- <p>Aqui comentários de clientes...</p> --}}
            <hr>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-warning btn-lg">Escrever</button>
          </div>
        </div>
      </div>     
      <!-- //COMENTÁRIOS -->
      

    </div>
    <!-- //BLOCO PRINCIPAL 1 (AVALIAÇÃO PROFISSIONAL) -->

    
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    ~~~~~~~~~~~ BLOCO PRINCIPAL 2 PERFIL (CONTRATAR) ~~~~~~~~~~~ 
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="panel panel-default">

            <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
            <div class="panel-heading clearfix">

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
                    <span class="glyphicon glyphicon glyphicon-eye-open" style="font-size: 16px;"></span> <span>0</span> <label style="font-size: 13px">Visualizações</label>
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
                    <a class="btn btn-primary" href="{{route('editar-perfil')}}" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar Perfil</a>
                  </div>
                {{-- Se não, exibe o botão solicitar serviço --}}
                @else
                  {{-- Botão Soliciar Serviço --}}
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <hr>
                    <a class="btn btn-success" href="#solicitar-servico" role="button" data-toggle="modal" data-target="#modalSolicitarServico"> Solicitar Serviço</a>
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
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3><b>Especialidades:</b></h3>
              <hr>
              <div class="">
                {{-- Lista os serviços cadastradas pelo profissional --}}
                @forelse($profile->servicos as $servico)
                  <h4>{{$servico->name}}:</h4>
                  {{-- Lista as especialidades cadastradas pelo profissional --}}
                  @forelse($profile->especialidades->where('servico_id', $servico->id) as $especialidade)
                    <span>•{{$especialidade->name}}&nbsp;</span>
                  @empty
                  @endforelse

                @empty
                @endforelse
              </div>
              <hr>
              {{-- <div class="panel-heading">
                <h3><b>Bio:</b></h3>
                <hr>
                <div class="">
                  <p>{{$profile->description}}</p>
                </div>
              </div>
              <hr> --}}
            </div>
          </div>

          {{-- BIOGRAFIA --}}
          <div class="panel panel-default">
            <div class="panel-body">
              <h3><b>Bio:</b></h3>
              <hr>
              <div class="">
                <p>{{$profile->description or "Este profissional ainda não escreveu uma bio..."}}</p>
              </div>
              <hr>
            </div>
          </div>
          {{-- //BIOGRAFIA --}}

          {{-- IMAGENS --}}
          <div class="panel panel-default">
            <div class="panel-body">
              <h3><b>Galeria de Imagens:</b></h3>
              <hr>
              <div class="">
                <p>Imagens aqui...</p>
              </div>
              <hr>
            </div>
          </div>
          {{-- //IMAGENS --}}

        </div>

        <div class="col-lg-4 col-md-4">
          <!-- LOCAIS -->
          <div class="panel panel-default">
            <div class="panel-body">
              <h3><b> Locais:</b></h3>
              <hr>
              <div class="text-center">
                <span>Locais de atendimento do profissional...</span>
              </div>
              <hr>
              <div class="text-center">
                <a class="btn btn-primary" href="#!" role="button"><span class="glyphicon glyphicon-globe"></span> Locais</a>
              </div>
            </div>
          </div>     
          <!-- //LOCAIS-->

          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="margin-0"><b>Calendário:</b></h3>
              <hr>
              <div class="text-center">
                <span>Calendário de agendamento do profissional...</span>
              </div>
              <hr>
              <div class="text-center">
                <a class="btn btn-primary" href="#!" role="button"><span class="glyphicon glyphicon-calendar"></span> Agendamento</a>
              </div>
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
@endpush