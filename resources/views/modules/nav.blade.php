{{-- <nav>
    <ul>
        <li><a href='/activity'>All Activties</a>
        <li><a href='/activity/create'>Add an Activity</a>
    </ul>
</nav> --}}

<nav>
    <ul>
        <li><a href='/group'>All Groups</a></li>
        @stack('nav')
        <li>
            <form method='POST' id='logout' action='/logout'>
                {{csrf_field()}}
                <a href='#' id="logout-link">Logout</a>
            </form>
        </li>
    </ul>
</nav>