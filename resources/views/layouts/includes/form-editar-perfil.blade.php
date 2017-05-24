{{-- Url Perfil --}}
<form id="form_url" action="{{route('post-editar-url')}}" method="POST">
  {{ csrf_field() }}

  <label for="url_perfil">Endereço do perfil:</label>
  <div class="form-inline{{ $errors->has('url_perfil') ? ' has-error' : '' }}">
    <label for="url_perfil" style="font-size: 21px; color: #6CA7BF; margin-top: 0px"><i>facilite.com/profiles/</i></label>
    <input style="font-size: 21px;" id="url_perfil" class="form-control" type="text" name="url_perfil" maxlength="25" value="@if(isset($profile->url_perfil)){{$profile->url_perfil}}@endif"/>

    @if ($errors->has('url_perfil'))
      <span class="help-block">
        <strong>{{ $errors->first('url_perfil') }}</strong>
      </span>
    @endif
  
    <button disabled id="bt-salvar-url" type="submit" class="btn btn-green-medium btn-sm disabled" style="display:none;">Salvar</button>
  </div>

</form>
{{-- //Url Perfil --}}

{{-- Cidades --}}
<div class="padding-top-2">
  <form action="#!" method="POST">
    {{ csrf_field() }}
    <label for="city">Cidade:</label>
    <div class="form-inline">
      <select id="city" name="city" class="form-control">
        <optgroup label="Paraíba">
          <option value="João Pessoa">João Pessoa</option>
          <option value="...">...</option>
        </optgroup>
      </select>
    </div>
  </form>
</div>
{{-- //Cidades --}}

{{-- Descrição Perfil --}}
{{-- <div class="col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-7 col-xs-12" style="margin-top: 2%;"> --}}
  <form id="form_desc" class="form-horizontal padding-top-2" action="{{route('post-editar-descricao')}} " method="POST">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label for="">Descrição:</label for="">
        <textarea id="description" name="description" class="form-control" maxlength="1000" rows="10">@if(isset($profile->description)){{$profile->description}}@endif</textarea>

        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif

      </div>
    </div>
    <button disabled id="bt-salvar-descricao" type="submit" class="btn btn-success btn-sm pull-right disabled" style="display:none;">Editar</button>
  </form>
{{-- </div> --}}
{{-- //Descrição Perfil --}}

{{-- <form action="{{route('post-editar-perfil')}}" method="POST">
  {{ csrf_field() }}
  <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12 top-5">
    <div class="form-group">
      <div class="text-center">
        <button type="submit" class="btn btn-success btn-sm">Atualizar dados</button>
      </div>
    </div>  
  </div>
</form> --}}