@extends('layouts.master-fluid')

@section('title') Editar Categorias - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
      {{-- <hr> --}}
      <!-- ROW -->
      <div class="row">
        
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        ~~~~~~~~~~~~~~~~ BLOCO PRINCIPAL 1 - ESQUERDA (AVALIAÇÃO PROFISSIONAL) ~~~~~~~~~~~~~~~~~~~ 
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 hidden-xs">

          <!-- NOTAS DE AVALIAÇÃO (FEEDBACK) -->
          <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">
            <div class="panel-body">
              
                <h3><b>Avaliação:</b></h3>
              {{-- ESTRELAS --}}
              <h4 class="font-70 cyan-primary" id="average">
                @if($profile->avaliacoes()->count() > 0)
                  {{  round($profile->avaliacoes()->sum('estrelas') / $profile->avaliacoes()->count(), 2)}}

                @else
                  0
                @endif

              </h4>
              <!-- Impossibilita a requisicao de votar -->
              <span data-voted="1"></span>
              <!-- \\Impossibilita a requisicao de votar -->
              <div class="text-center">
                <div class="bar-stars">
                  <span class="bg" style="width: @if($profile->avaliacoes()->count() != 0){{ round($profile->avaliacoes()->sum('estrelas') / $profile->avaliacoes()->count(),2) * 20  }}@else 0 @endif%"></span>
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
            <!-- //PAINEL -->
          </div>
          <!-- //NOTAS DE AVALIAÇÃO (FEEDBACK) -->
          

          <!-- COMENTÁRIOS -->
          <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">
            <div class="panel-body">
              <h3><b>Comentários:</b></h3>
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
              <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">

                <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
                <div class="panel-body clearfix">

                  {{-- ******************* FOTO PROFISSIONAL ******************** --}}
                  <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 text-center">
                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="img-circle">
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
                    {{-- Botão Editar Perfil --}}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                      <hr>
                      <a class="btn btn-primary" href="{{route('editar-perfil')}}" role="button"><span class="glyphicon glyphicon-pencil"></span> Editar Perfil</a>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          {{-- ROW --}}
          <div class="row">
            <div class="col-lg-8 col-md-8">
              {{-- ESPECIALIDADES --}}
              <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">
                <div class="panel-body">
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
                </div>
              </div>     
              {{-- //ESPECIALIDADES --}}

              {{-- BIOGRAFIA --}}
              <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">
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
              <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">
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
              <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">
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

              <div class="panel panel-default" style="border-radius: 0; box-shadow: 1px 2px 4px #4F4F4F">
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
    </div><!-- //CONTAINER -->

@endsection

@section('footer')
    {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  {{-- <script src="{{ asset('js/check-uncheck.js') }}"></script> --}}
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
@endpush