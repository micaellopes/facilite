{{-- FORM - Se existir servico cadastrado, post-editar. Se não, post-cadastrar --}}
<form id="form_servicos" action="@if(count($profile->servicos) != 0){{route('post-editar-servicos')}}@else{{route('post-cadastrar-servicos')}}@endif" method="POST">

  {{ csrf_field() }}
  
  @forelse($profile->categorias as $categoria)

    {{-- BLOCO PRINCIPAL --}}
    <div class="row placeholder">
      <h3 class="gray-primary">{{$categoria->name}}</h3>
      <hr class="hr-1">
      @forelse($categoria->servicos as $servico)
        {{-- BLOCO CHECKBOX's --}}
        
        {{-- !!!!!!!!!!!!!!!! MUDAR ISSO AQUI DEPOIS (STYLE CHECKBOX'S) !!!!!!!!!!!!!!!!!!! --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 placeholder">
          <img id="img_cat_{{$servico->id}}" style="cursor: pointer;" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="120" height="120" class="img-responsive" alt="Generic placeholder thumbnail">

          <div id="div_bg_{{$servico->id}}">
            <span id="check_span_{{$servico->id}}" name="check_span_{{$servico->id}}" class="glyphicon glyphicon-unchecked" style="font-size: 16px; color: #272727;"></span>
            <label id="label_cat_{{$servico->id}}" class="text-center" for="cat_{{$servico->id}}" style="font-weight: normal; font-size: 23px;">
              <input type="checkbox" id="cat_{{$servico->id}}" name="cat_{{$servico->id}}" value="{{$servico->id}}" 

                @forelse($profile->servicos as $profServico) 
                  @if( isset($profile->servicos) && $profServico->id == $servico->id ) 
                    checked 
                  @endif
                @empty 
                @endforelse

              style="display: none;"/>
              {{$servico->name}}
            </label>
          </div>

        </div>

      @empty
        <h1>Não foi possível carregar o conteúdo...</h1>
      @endforelse
    </div>
    {{-- //BLOCO PRINCIPAL --}}

  @empty
    <h1>Não foi possível carregar o conteúdo...</h1>
  @endforelse

  <div class="form-group">
    <div class="text-center">
      @if(count($profile->servicos) != 0)
        <button style="box-shadow: 1px 2px 4px #797979; margin-top: 30px;" type="submit" class="btn-green-medium" title="Salvar e continuar">SALVAR <span class="glyphicon glyphicon-chevron-right"></span></button>
      @else
        <button style="box-shadow: 1px 2px 4px #797979; margin-top: 30px;" type="submit" class="btn-cyan-medium" title="Salvar e continuar">AVANÇAR <span class="glyphicon glyphicon-chevron-right"></span></button>
      @endif
    </div>
  </div>

</form>