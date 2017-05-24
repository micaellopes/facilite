{{-- FORM - Se existir categoria cadastrada, post-editar. Se não, post-cadastrar --}}
<form id="form_categorias" action="@if(count($profile->categorias) != 0){{route('post-editar-categorias')}}@else{{route('post-cadastrar-categorias')}}@endif" method="POST">

  {{csrf_field()}}

  @forelse($categorias as $categoria)

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 placeholder">
      <img id="img_cat_{{$categoria->id}}" style="cursor: pointer;" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="160" height="160" class="img-responsive" alt="Generic placeholder thumbnail">
      
      {{-- !!!!!!!!!!!!!!!! MUDAR ISSO AQUI DEPOIS (STYLE CHECKBOX'S) !!!!!!!!!!!!!!!!!!! --}}
      <div id="div_bg_{{$categoria->id}}">
        <span id="check_span_{{$categoria->id}}" name="check_span_{{$categoria->id}}" class="glyphicon glyphicon-unchecked" style="font-size: 20px;"></span>
        <label id="label_cat_{{$categoria->id}}" class="text-center" for="cat_{{$categoria->id}}" style="font-weight: normal; font-size: 27px;">
          <input type="checkbox" id="cat_{{$categoria->id}}" name="cat_{{$categoria->id}}" value="{{$categoria->id}}" 

            @forelse($profile->categorias as $profCategoria)
              @if( isset($profile->categorias) && $profCategoria->id == $categoria->id )
                checked
              @endif
            @empty
            @endforelse

          style="display: none;"/>
          {{$categoria->name}}
        </label>
      </div>

    </div>

  @empty
    <h1>Não foi possível carregar as categorias...</h1>
  @endforelse

  <div class="form-group">
    <div class="text-center">
      @if(count($profile->categorias) != 0)
        <button style="box-shadow: 1px 2px 4px #797979; margin-top: 30px;" type="submit" class="btn-green-medium" title="Salvar e continuar">SALVAR <span class="glyphicon glyphicon-chevron-right"></span></button>
      @else
        <button style="box-shadow: 1px 2px 4px #797979; margin-top: 30px;" type="submit" class="btn-cyan-medium" title="Salvar e continuar">AVANÇAR <span class="glyphicon glyphicon-chevron-right"></span></button>
      @endif
    </div>
  </div>

</form>