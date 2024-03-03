@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between me-5">
            <h4>{{ $album->nama }}</h4>
            @auth
                @if ($album->user->id == Auth::user()->id)
                    <div>
                        <a href="{{ route('album.edit', $album->id) }}" class="btn btn-dark">Edit Album</a>
                        <a href="{{ route('album.destroy', $album->id) }}" class="btn btn-danger">Hapus Album</a>
                    </div>
                @endif
            @endauth
        </div>
        <p>{{ $album->deskripsi }}</p>
    </div>
    <hr>
    <div class="container">
        <div class="d-flex justify-content-between me-5 mb-3">
            <h4>Photo</h4>
            @auth
                @if ($album->user->id == Auth::user()->id)
                    <a href="{{ route('photo.create', $album->id) }}" class="btn btn-dark">Tambah Foto</a>
                @endif
            @endauth
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
