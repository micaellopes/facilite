<div class="modal fade" id="modalAlterarSenha">
  <div class="modal-dialog modal-sm">
    <form id="form_alterar_senha" action="{{route('alterar-senha')}}" method="POST">
      {{ csrf_field() }}
      <div style="border-radius: 0px !important;" class="modal-content">
        <div class="modal-body">
          <button style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <div>
            <label for="current_password">Senha atual:</label>
            <div>
              <input type="password" name="current_password" id="current_password" class="form-control"/>

              {{-- @if (session('wrong-password'))
                <span id="senha-atual-incorreta" class="help-block">
                  <strong class="text-danger">{{ session('wrong-password') }}</strong>
                </span>
              @endif --}}

              {{-- Erro ao atualizar --}}
              @if (session('erro-atualizar'))
                <span id="erro-atualizar" class="help-block">
                  <strong class="text-danger">{{ session('erro-atualizar') }}</strong>
                </span>
              @endif

              @if ($errors->has('current_password'))
                <span class="help-block erro-alterar-senha">
                  <strong class="text-danger">{{ $errors->first('current_password') }}</strong>
                </span>
              @endif

            </div>
          </div>

          <div style="margin-top: 10%;">
            <label for="password">Nova senha:</label>
            <div>
              <input type="password" name="password" id="password" class="form-control"/>
            </div>
          </div>

          <div style="margin-top: 5%;">
            <label for="password_confirmation">Confirmar nova senha:</label>
            <div>
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>
              @if ($errors->has('password'))
                <span class="help-block erro-alterar-senha">
                  <strong class="text-danger">{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn-green-large">Alterar senha</button>
        </div>
        
      </div>
    </form>
  </div>
</div>