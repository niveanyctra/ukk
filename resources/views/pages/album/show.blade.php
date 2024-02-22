@extends('layout.app')
@section('content')
    <div style="display: flex; justify-content:space-between">
        <div>
            <h1>
                {{ $album->nama }}
            </h1>
            <p>
                {{ $album->deskripsi }}
            </p>
        </div>
        <div>
            <a href="{{ route('album.edit', $album->id) }}">Edit</a>
            <a href="{{ route('album.destroy', $album->id) }}">Hapus</a>
        </div>
    </div>
    @foreach ($photo as $item)
        <a href="{{ route('photo.show', $item->id) }}">
            <img src="{{ Storage::url($item->path) }}" alt="" width="300px" height="300px">
        </a>
    @endforeach
@endsection
