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
        @if ($album->user_id == Auth::user()->id)
            <div>
                <a href="{{ route('album.edit', $album->id) }}">Edit</a>
                <a href="{{ route('album.destroy', $album->id) }}">Hapus</a>
                <a href="{{ route('photo.create', $album->id) }}" class="create-button">Tambah Foto Baru</a>
            </div>
        @endif
    </div>
    <hr>
    @foreach ($photo as $item)
        <a href="{{ route('photo.show', $item->id) }}">
            <img src="{{ Storage::url($item->path) }}" alt="" width="300px" height="300px">
        </a>
    @endforeach
@endsection
