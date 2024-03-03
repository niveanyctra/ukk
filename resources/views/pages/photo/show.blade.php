@extends('layouts.app')
@push('styles')
    <style>
        .cl {
            position: fixed;
            z-index: 1;
            bottom: 0;
            margin-bottom: 30px;
        }
    </style>
@endpush
@section('content')
    <div class="d-flex">
        <img src="{{ Storage::url($photo->path) }}" alt="" width="500px">
        <div class="container me-5 ms-3">
            <div class="d-flex justify-content-between">
                <p>
                    <a href="{{ route('user.show', $photo->user->username) }}"
                        class="text-decoration-none text-dark fs-5">{{ $photo->user->username }}</a>
                    - {{ $photo->created_at->diffForHumans() }}
                </p>
                @auth
                    @if ($photo->user_id == Auth::user()->id)
                        <div>
                            <a href="{{ route('photo.edit', $photo->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('photo.destroy', $photo->id) }}" class="btn btn-danger">Hapus</a>
                        </div>
                    @endif
                @endauth
            </div>
            <hr>
            <h5>{{ $photo->judul }}</h5>
            <p>{{ $photo->deskripsi }}</p>
            <p>Album <a href="{{ route('album.show', $photo->album_id) }}">
                    <span class="badge text-bg-success">{{ $photo->album->nama }}</span>
                </a>
            </p>
            <hr>
            @foreach ($comments as $comment)
                <div class="container">
                    <p>
                        <span class="fw-bold">{{ $comment->user->username }}</span>
                        {{ $comment->isi }} <br>
                        {{ $comment->created_at->diffForHumans() }}
                        @auth
                            @if ($comment->user_id == Auth::user()->id)
                                <a href="{{ route('comment.destroy', $comment->id) }}"
                                    class="text-decoration-none text-danger"> -
                                    Hapus Komentar</a>
                            @endif
                        @endauth
                    </p>
                </div>
            @endforeach
            <div class="cl">
                <div class="d-flex mb-3 bg-light">
                    <form action="{{ route('like', $photo->id) }}" method="post">
                        @csrf
                        @php
                            $userLiked = $photo->like->contains('user_id', Auth::user()->id);
                        @endphp
                        <button type="submit" style="border: 0; background-color:white;">
                            <i class="{{ $userLiked ? 'fa-solid fa-heart fa-2xl' : 'fa-regular fa-heart fa-2xl' }}"></i>
                        </button>
                        {{ $photo->like->count() }} likes
                    </form>
                    <a href="{{ route('photo.show', $photo->id) }}" class="text-dark ms-5"
                        style="border: 0; background-color:white;">
                        <i class="fa-regular fa-comment fa-2xl"></i>
                    </a>
                </div>
                <form action="{{ route('comment', $photo->id) }}" method="post">
                    @csrf
                    <div class="d-flex">
                        <input class="form-control" type="text" placeholder="Tambah komentar . . ."
                            aria-label="default input example" name="isi" style="width: 500px">
                        <button type="submit" style="border: 0; background-color:white;">
                            <i class="fa-solid fa-paper-plane fa-2xl"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
