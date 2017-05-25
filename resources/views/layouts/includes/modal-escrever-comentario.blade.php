<!-- MODAL ESCREVER COMENTÁRIO -->
<div class="modal fade" id="modalEscreverComentario" tabindex="-1" role="dialog" aria-labelledby="modalEscreverComentario">
  <div class="modal-dialog" role="document">
    <div style="border-radius: 5px !important; box-shadow: none;" class="modal-content">
      <div class="modal-header">
        <button style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modalEscreverComentarioLabel">
            <h3 class="text-center cyan-third font-roboto">ESCREVER COMENTÁRIO</h3>
        </h4>
      </div>
      <div class="modal-body">
        <!-- FORM ESCREVER COMENTÁRIO -->
         <form id="form_comentario" action="{{ route('comentar') }}" method="POST" >
          {{ csrf_field() }}
          
          <input type="hidden" name="professional_id" value="{{ $profile->id }}">

          <!-- COMENTÁRIOS -->
          <div class="row">
            <div class="col-md-12 col-md-12 padding-bottom-2">
              <div class="form-group">
                <label for="comentario" class="control-label cor-default">Fale sobre a sua experiência com este profissional:</label>
                <textarea style="resize: none;" class="form-control" name="comentario" id="comentario" rows="10"></textarea>
                @if ($errors->has('comentario'))
                  <span id="erro-comentar" class="help-block">
                    <strong class="text-danger">{{ $errors->first('comentario') }}</strong>
                  </span>
                @endif
                {{-- Erro ao atualizar --}}
                @if (session('comentario-efetuado'))
                  <span style="display: none;" id="comentario-efetuado" class="help-block">
                    <strong class="text-sucess">{{ session('comentario-efetuado') }}</strong>
                  </span>
                @endif
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
      </div>
    </div>
  </div>
</div>