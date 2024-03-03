@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>User</h3>
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('user.show', $user->username) }}" class="text-decoration-none text-dark">
                        <h5>{{ $user->username }} - {{ $user->nama }}</h5>
                    </a>
                </li>
            @endforeach
        </ul>
        <hr>
        <h3>Album</h3>
        <ul>
            @foreach ($albums as $album)
                <li>
                    <a href="{{ route('album.show', $album->id) }}" class="text-decoration-none text-dark">
                        <h5>{{ $album->user->username }} - {{ $album->nama }}</h5>
                    </a>
                </li>
            @endforeach
        </ul>
        <hr>
        <h3>Photo</h3>
        @foreach ($photos as $photo)
            <a href="{{ route('photo.show', $photo->id) }}">
                <img src="{{ Storage::url($photo->path) }}" alt="" class="img-fluid" width="300px">
            </a>
        @endforeach
    </div>
@endsection
