@extends('layouts.master-fluid')

@section('title') Mensagens - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3 class="text-center cyan-third font-roboto">SOLICITAÇÕES DE SERVIÇO</h3>
          <hr>
          @if( count(Auth::user()->isProfessional->messages) > 0 )
          <div class="table-responsive">
            <table class="table table-hover text-center" id="myTable">
              <thead>
                <tr>
                  <th class="text-center">Solicitante</th>
                  <th class="text-center">Serviço desejado</th>
                  <th class="text-center">Telefone</th>
                  <th class="text-center"> </th>
                </tr>
              </thead>
              <tbody>
                @foreach(Auth::user()->isProfessional->messages as $m)
                  <tr>
                    <td>{{ $m->user->name }}</td>
                    <td>{{ $m->servico->name }}</td>
                    <td>{{ $m->numero }}</td>
                    <td>
                      <form action="{{ route('solicitar-servico.destroy', $m->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <a data-id-message="{{$m->id}}" class="btn btn-xs btn-cyan-small openModal" href="#myModal" role="button" data-toggle="modal" data-target="#myModal">Visualizar</a>
                        <button type="submit" class="btn btn-xs btn-red-small">Excluir</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <h4 class="text-center padding-top-2 padding-bottom-2">Você não tem novas solicitações de serviço...</h4>
          @endif
          
        </div>
      </div>
    </div>
  </div>

  {{-- ************** Mensagens de Sessão **************** --}}
  {{-- Dados atualizados --}}
    @if (session('solicitacao-deletada'))
      <span style="display: none;" id="solicitacao-deletada" class="help-block">
        <strong class="text-success">{{ session('solicitacao-deletada') }}</strong>
      </span>
    @endif


  <!-- Modal for view message -->

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
      <div style="border-radius: 0px !important;" class="modal-content">
        <div class="modal-header">
          <button style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="modalSolicitarServicoLabel">
             <h3 class="text-center cyan-third font-roboto">SOLICITAÇÃO DE SERVIÇO</h3>
          </h4>
        </div>
        <div class="modal-body">
          <div class="modal-data">

            <!-- Data here -->

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End modal -->
@endsection

@section('footer')
    {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  {{-- check-uncheck.js --}}
  {{-- <script src="{{ asset('js/check-uncheck.js') }}"></script> --}}
  {{-- JQuery/JQuery Mask Plugins --}}
  {{-- <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/jquery.mask.min.js') }}"></script> --}}
  {{-- Jquery BlockUI --}}
  <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
  {{-- Dados atualizados/Erro ao atualizar, mensagens de sessão --}}
  <script src="{{ asset('js/notifications/mensagens-sessao.js') }}"></script>

  <script> 
    
    $(".openModal").click(function(){
      let id = $(this)[0].getAttribute("data-id-message");
      $.ajax({
        url: "/solicitar-servico/"+id,
        method: "GET",
        dataType: "json",
        success(result,status,xhr){
        
          $('.modal-data').html(
            "<div class='row'>"+
              
              "<div class='col-lg-5 col-md-5 col-sm-5 col-xs-12 form-group text-center padding-bottom-1'>"+
                "<img class='img-circle' src='/uploads/avatars/"+ result.user.avatar +"' alt='user_avatar'>"+
                "<h4 class='green-third'>"+ result.user.name +"</h4>"+
              "</div>"+

              "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-6 form-group padding-top-2 padding-bottom-2 text-right'>"+
                "<p><b class='cor-default'>Serviço interessado:</b></p>"+
                "<p><b class='cor-default'>Data desejada:</b></p>"+
                "<p><b class='cor-default'>Melhor horário:</b></p>"+
                "<p><b class='cor-default'>Tel para contato:</b></p>"+
              "</div>"+

              "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-group padding-top-2 padding-bottom-2 text-left'>"+
                "<p><b class='cyan-third'>"+ result.servico.name +"</b></p>"+
                "<p><b id='date-format' class='cyan-third'>"+ result.data +"</b></p>"+
                "<p><b class='cyan-third'>"+ result.horario +"h</b></p>"+
                "<p><b class='cyan-third'>"+ result.numero +"</b></p>"+
              "</div>"+

              "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group'>"+
                "<blockquote class='cyan-third'>"+
                  "<p>"+result.mensagem +"</p>"+
                "</blockquote>"+
              "</div>"+

            "</div>"
            );
          
        },
        error: function(data){
          alert('Error ao procurar esta mensagem');
        }
      });
    });
  </script>
@endpush