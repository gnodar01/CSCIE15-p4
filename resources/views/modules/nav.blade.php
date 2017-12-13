<nav>
    <ul>
        @if(Auth::check())
            <li><a href='/group'>All Groups</a></li>
            @stack('nav')
            <li>
                <form method='POST' id='logout' action='/logout'>
                    {{csrf_field()}}
                    <a href='#' id="logout-link">Logout</a>
                </form>
            </li>
        @else
            <li><a href='/register'>Register</a></li>
            <li><a href='/login'>Login</a></li>
        @endif
    </ul>
</nav>
