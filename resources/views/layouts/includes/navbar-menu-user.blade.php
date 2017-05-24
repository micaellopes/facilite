{{-- Links Mensagens Privadas --}}
{{-- <li><a href="#"><span class="glyphicon glyphicon-inbox"></span></a></li> --}}

{{-- Menu Dropdown --}}
<li class="dropdown">
  <a style="padding: 5px 1px 0px 1px; font-size: 16px;" id="menu-user" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="img-circle" style="width:40px; height:40px;">
    {{ substr(Auth::user()->name, 0, 16) }} <span class="caret"></span>
  </a>

  <ul id="dropdown-menu-user" class="dropdown-menu" role="menu">
    <li>
      <a style="padding: 10px 10px 10px 20px;" href="{{ route('editar-conta') }}">
        <span class="glyphicon glyphicon-cog"></span> Minha conta
      </a>
    </li>
    <li style="padding: 0px; margin: 0px;" class="divider"></li>
    <li>
      <a style="padding: 10px 10px 10px 20px;" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-log-out"></span> Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>
</li>
