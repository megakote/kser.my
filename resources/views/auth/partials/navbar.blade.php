@if (!Auth::guest())
<li>
    <a href="http://alfamart24.ru", target="_blank">
        <i class="fa fa-btn fa-globe"></i> На сайт
    </a>
</li>
<li class="dropdown user user-menu" style="margin-right: 20px;">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        @if($user->avatar_url)
            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="user-image" />
        @endif

        <span class="hidden-xs">{{ $user->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- Menu Footer-->
        <li class="user-footer">
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                <i class="fa fa-btn fa-sign-out"></i> Выйти
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</li>
@endif