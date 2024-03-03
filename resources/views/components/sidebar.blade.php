<nav class="sidebar ps-5 pt-5">
    <a href="{{ route('home') }}" class="fw-bold text-decoration-none fs-1 text-dark">Galeri</a>
    <form action="{{ route('search') }}" method="post">
        @csrf
        <input type="text" name="query" placeholder="Cari . . .">
        <button type="submit" class="rounded-5 py-2 px-2">
            <i class="fa-solid fa-magnifying-glass fa-xl"></i>
        </button>
    </form>
    <li>
        <a href="{{ route('home') }}">Home</a>
    </li>
    @auth
        <li>
            <a href="{{ route('user.show', Auth::user()->username) }}">Profil</a>
        </li>
        <li>
            <a href="{{ route('logout') }}">Logout</a>
        </li>
    @else
        <li>
            <a href="{{ route('login') }}">Login</a>
        </li>
        <li>
            <a href="{{ route('register') }}">Register</a>
        </li>
    @endauth
</nav>
