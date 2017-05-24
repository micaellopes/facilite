<form id="form_user" class="form-group" action="{{ route('post-editar-conta-user') }}" method="POST">
  {{-- {{ method_field('PUT') }} --}}
  {{ csrf_field() }}
  <div class="form-group">
    <span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: 18px; color: #272727"></span>
    <label id="label_role" for="role_edit" style="font-weight: normal; font-size: 18px;">
      <input type="checkbox" id="role_edit" name="role" style="display: none;" {{old('role') ? 'checked="checked"' : ''}}/> Sou profissional
    </label>
  </div>

  <div style="padding-bottom: 8px;" class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label style="margin-bottom: 0px; padding-bottom: 0px;" for="name_edit">Nome:</label>
    <input style="margin-top: -8px;" id="name_edit" type="text" class="form-control input-lg" name="name" value="@if(isset($user->name)){{$user->name or old('name')}}@else{{$prof->user->name or old('name')}}@endif" maxlength="50" placeholder="Ex.: Maria José"/>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>

  <div style="padding-bottom: 8px;" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label style="margin-bottom: 0px; padding-bottom: 0px;" for="email_edit">Email:</label>
      <input style="margin-top: -8px;" id="email_edit" type="email" class="form-control input-lg" name="email" value="@if(isset($user->email)){{old('email', $user->email)}}@else{{old('email', $prof->user->email)}} @endif" maxlength="60" placeholder="Ex.: josemaria@gmail.com"/>
      @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
  </div>
  
  @if(!isset($prof->cpf))
    <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}" id="formCpf_edit" style="display: none; padding-bottom: 8px;">
      <label style="margin-bottom: 0px; padding-bottom: 0px;" for="cpf_edit">Cpf:</label>
      <input style="margin-top: -8px;" disabled type="text" class="form-control input-lg" id="cpf_edit" name="cpf" value="@if(isset($prof->cpf)){{old('cpf', $prof->cpf)}}@else{{old('cpf', '')}}@endif" maxlength="14" placeholder="000.000.000-00"/>
      @if ($errors->has('cpf'))
          <span class="help-block">
              <strong>{{ $errors->first('cpf') }}</strong>
          </span>
      @endif
    </div>
  @endif
  
  @if(!isset($prof->tel))
    <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" id="formTel_edit" style="display: none; padding-bottom: 8px;">
      <label style="margin-bottom: 0px; padding-bottom: 0px;" for="tel_edit">Tel:</label>
      <input style="margin-top: -8px;" disabled type="tel" class="form-control input-lg" id="tel_edit" name="tel" value="@if(isset($prof->tel)){{old('tel', $prof->tel)}}@else{{old('tel', '')}}@endif" maxlength="15" placeholder="(00) 00000-0000"/>
      @if ($errors->has('tel'))
          <span class="help-block">
              <strong>{{ $errors->first('tel') }}</strong>
          </span>
      @endif
    </div>
  @endif

  <div class="form-group">
    <div class="text-center">
      <button style="box-shadow: 1px 2px 4px #797979" type="submit" class="btn-green-medium">ATUALIZAR DADOS</button>
    </div>
  </div>
  
</form>