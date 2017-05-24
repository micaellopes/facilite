<ul class="nav nav-sidebar">

  <li @if(Route::currentRouteName() == 'editar-conta') class="active" @endif>
	  <a href="{{ route('editar-conta') }}">
	    <span class="glyphicon glyphicon-cog"></span> Minha Conta
	  </a>
	</li>

</ul>