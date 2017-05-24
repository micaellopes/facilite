<!-- MODAL CONTRATAR -->
<div class="modal fade" id="modalSolicitarServico" tabindex="-1" role="dialog" aria-labelledby="modalSolicitarServico">
  <div class="modal-dialog" role="document">
    <div style="border-radius: 0px !important;" class="modal-content">
      <div class="modal-header">
        <button style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modalSolicitarServicoLabel">
            <h3 class="text-center cyan-third font-roboto">SOLICITAR SERVIÇO</h3>
        </h4>
      </div>
      <div class="modal-body">
        <!-- FORM SOLICITAR SERVIÇO -->
         <form id="form_solicitar" action="{{ route('solicitar-servico.store') }}" method="POST" >
          {{ csrf_field() }}
          
          <input type="hidden" name="professional_id" value="{{ $profile->id }}">
          <!-- ESCOLHER SERVIÇOS -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <label class="cor-default">Serviço desejado:</label>
            </div>
            
            @forelse($profile->servicos as $servico)
              <!-- BLOCO SERVIÇOS -->
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 text-center padding-bottom-2">
                <div class="form-group">
                  <div class="checkbox">
                    <label for="check_{{$servico->id}}">
                      <input type="checkbox" name="servico_id" id="check_{{$servico->id}}" value="{{$servico->id}}">{{$servico->name}}
                    </label>
                  </div>
                </div>
              </div>
              <!-- //BLOCO SERVIÇOS -->
            @empty
              <h4>Não foi possível carregar o conteúdo...</h4>7
            @endforelse
            
          </div>
          <!-- //ESCOLHER SERVIÇOS -->

          <!-- <hr> -->

          <div class="row padding-bottom-2">
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label for="data" class="cor-default">Data desejada:</label>
                <input type="text" name="data" class="form-control" id="data" placeholder="00/00/0000" data-mask="00/00/0000" data-mask-selectonfocus="true" data-mask-clearifnotmatch="true">
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label for="horario" class="cor-default">Horário disponível:</label>
                <input type="text" name="horario" class="form-control" id="horario" placeholder="00:00" data-mask="00:00" data-mask-selectonfocus="true" data-mask-clearifnotmatch="true">
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label for="numero" class="cor-default">Seu telefone:</label>
                <input type="text" name="numero" class="form-control" id="numero" placeholder="(00) 00000-0000" data-mask="(00) 00000-0000" data-mask-selectonfocus="true" data-mask-clearifnotmatch="true">
              </div>
            </div>
          </div>

          <!-- COMENTÁRIOS -->
          <div class="row">
            <div class="col-md-12 col-md-12 padding-bottom-2">
              <div class="form-group">
                <label for="mensagem" class="control-label cor-default">Fale sobre o serviço que deseja:</label>
                <textarea class="form-control" name="mensagem" id="mensagem" rows="10"></textarea>
              </div>
            </div>
          </div>
          <!-- //COMENTÁRIOS -->

          <!-- BOTÕES -->
          <div class="row padding-bottom-2">
            <div class="col-md-12 col-md-12 text-center">
              <button type="submit" class="btn btn-green-large" title="Enviar solicitação de serviço">ENVIAR</button>
            </div>
          </div>
          <!-- //BOTÕES -->

        </form>
        <!-- //FORM SOLICITAR SERVIÇO -->
      </div>
    </div>
  </div>
</div>
<!-- //MODAL CONTRATAR -->


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
@endpush
@push('scripts')
{{-- JQuery/JQuery Mask Plugins --}}
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script>
  $('#data').datepicker({
    language: "pt-BR",
    forceParse: false,
    autoclose: true
});
</script>
@endpush