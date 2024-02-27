@extends('layout.app')
@section('content')
    <form action="{{ route('search') }}" method="post">
        @csrf
        <input type="text" name="query">
        <button type="submit">Cari</button>
    </form>
    <h2>Users</h2>
    @if ($users->isNotEmpty())
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('user', $user->id) }}">{{ $user->username }} - {{ $user->nama }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No users found.</p>
    @endif

    <h2>Albums</h2>
    @if ($albums->isNotEmpty())
        <ul>
            @foreach ($albums as $album)
                <li>
                    <a href="{{ route('album.show', $album->id) }}">{{ $album->nama }} - {{ $album->user->username }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No albums found.</p>
    @endif

    <h2>Photos</h2>
    @if ($photos->isNotEmpty())
        <ul>
            @foreach ($photos as $photo)
                <li>
                    <a href="{{ route('photo.show', $photo->id) }}">{{ $photo->judul }} - {{ $photo->user->username }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No photos found.</p>
    @endif

@endsection
