<!-- MODAL CONTRATAR -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLoginLabel">
            <b>Fazer login</b>
        </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- LOGIN -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 class="text-center">Entrar</h2>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('postLogin') }}">
              {{ csrf_field() }}

              {{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> --}}
              <div class="form-group">
                <label for="email" class="col-lg-2 col-md-2 col-sm-2 control-label">Email:</label>
                <div class="col-lg-9 col-md-9 col-sm-9">
                  <input id="email" type="email" class="form-control" name="email" placeholder="exemplo@exemplo.com" value="{{ old('email') }}" autofocus/>

                  {{-- @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif --}}

                </div>
              </div>

              {{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> --}}
              <div class="form-group">
                <label for="password" class="col-lg-2 col-md-2 col-sm-2 control-label">Senha:</label>
                <div class="col-lg-9 col-md-9 col-sm-9">
                  <input id="password" type="password" class="form-control" name="password" placeholder="*****************"/>
                  
                  {{-- @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif --}}

                  <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">{{ $error }}</h4> @endforeach @endif</span>

                </div>
              </div>
              

              <div class="form-group">
                <div class="col-md-offset-3 col-md-8">
                  {{-- <div class="pull-left">
                    <label for="remember">
                      <input name="remember" type="checkbox"/> Me lembre
                    </label>
                  </div> --}}
                  <div class="pull-right">
                    <label>
                      <a class="btn btn-link" href="#">
                        Esqueceu sua senha?
                      </a>
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="text-center">
                  <button type="submit" class="btn btn-success btn-lg">Entrar</button>
                </div>
              </div>

            </form>
          </div>

          <!-- CADASTRAR -->
          <div class="top-12 visible-xs"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h2>Ainda não é cadastrado?</h2>
            <p>Clique no botão abaixo e faça o seu cadastro agora mesmo!</p>
            <p><a class="btn btn-primary btn-lg" href="{{route('cadastrar')}}" role="button">Cadastrar agora &raquo;</a></p>
          </div>
          <!-- //CADASTRAR -->
        </div>
      </div>
      <div class="modal-footer">
        {{-- <span>teste</span> --}}
      </div>
    </div>
  </div>
</div>
<!-- //MODAL CONTRATAR -->