@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between me-5">
            <h4>{{ $user->nama }}</h4>
            @auth
                @if ($user->id == Auth::user()->id)
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-dark">Edit Profil</a>
                @endif
            @endauth
        </div>
        <h5>{{ '@' . $user->username }}</h5>
        <p>{{ $user->email }}</p>
        <p>{{ $user->alamat }}</p>
    </div>
    <hr>
    <div class="container">
        <div class="d-flex justify-content-between me-5 mb-3">
            <h4>Album</h4>
            @auth
                @if ($user->id == Auth::user()->id)
                <a href="{{ route('album.create') }}" class="btn btn-dark">Tambah Album</a>
                @endif
            @endauth
        </div>
        @foreach ($albums as $album)
            <div class="d-flex justify-content-between me-5 mb-3">
                <a href="{{ route('album.show', $album->id) }}"
                    class="text-decoration-none text-dark fs-5">{{ $album->nama }}</a>
                <a href="{{ route('album.show', $album->id) }}" class="btn btn-info text-light">Lihat Album</a>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="container">
        <div class="d-flex justify-content-between me-5 mb-3">
            <h4>Photo</h4>
        </div>
        <div class="row">
            @foreach ($photos as $photo)
                <div class="col-3 me-4">
                    <a href="{{ route('photo.show', $photo->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ Storage::url($photo->path) }}" alt="" width="300px" height="300px"
                            class="img-fluid">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
