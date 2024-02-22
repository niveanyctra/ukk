<nav class="sidebar">
    <ul>
        <li>
            <a href="{{ route('home') }}">Beranda</a>
        </li>
        <li>
            <a href="{{ route('create') }}">Create</a>
        </li>
        <li>
            @if (Auth::user())
                <a href="{{ route('account.index') }}">Profil</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
        </li>
        <li>
            @if (Auth::user())
                <a href="{{ route('logout') }}">Logout</a>
            @endif
        </li>
    </ul>
</nav>
