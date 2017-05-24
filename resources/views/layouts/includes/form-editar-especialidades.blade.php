{{-- FORM - Se existir servico cadastrado, post-editar. Se não, post-cadastrar --}}
<form id="form_especialidades" class="form-horizontal" action="@if(count($profile->especialidades) != 0){{route('post-editar-especialidades')}}@else{{route('post-cadastrar-especialidades')}}@endif" method="POST">

  {{ csrf_field() }}

  <div class="row">
    @forelse($profile->servicos as $servico)

      {{-- PAINEL ESPECIALIDADES --}}
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-left">
        <h3>{{$servico->name}}</h3>
        <div class="panel panel-default">
          <div class="panel-body">
            @forelse($servico->especialidades as $especialidade)
              <div class="checkbox">
                <label for="check_{{$especialidade->id}}">
                  <input type="checkbox" id="check_{{$especialidade->id}}" name="check_{{$especialidade->id}}" value="{{$especialidade->id}}"

                    @forelse($profile->especialidades as $profEspecialidade)
                      @if( isset($profile->especialidades) && $profEspecialidade->id == $especialidade->id )
                        checked
                      @endif
                    @empty
                    @endforelse

                  />
                  {{$especialidade->name}}
              </div>
            @empty
              <span>Erro interno, tente novamente mais tarde...</span>
            @endforelse
          </div>
        </div>
      </div>
      {{-- //PAINEL ESPECIALIDADES --}}

    @empty
      <h1>Não foi possível carregar o conteúdo...</h1>
    @endforelse
  </div>

  <div class="form-group">
    <div class="text-center">
      @if(count($profile->servicos) != 0)
        <button style="box-shadow: 1px 2px 4px #797979; margin-top: 30px;" type="submit" class="btn-green-medium" title="Salvar">SALVAR </span></button>
      @else
        <button style="box-shadow: 1px 2px 4px #797979; margin-top: 30px;" type="submit" class="btn-cyan-medium" title="Salvar e continuar">AVANÇAR <span class="glyphicon glyphicon-chevron-right"></span></button>
      @endif
    </div>
  </div>

</form>