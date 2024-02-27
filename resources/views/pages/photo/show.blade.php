@extends('layout.app')
@push('style')
    <style>
        .show-postingan {
            display: flex;
        }

        .comment {
            margin-left: 30px
        }

        .like-comment-fixed {
            position: fixed;
            margin-bottom: 50px;
            bottom: 0;
            z-index: 1;
        }

        .comment-fixed {
            position: fixed;
            margin-bottom: 20px;
            bottom: 0;
            z-index: 1;
        }
    </style>
@endpush
@section('content')
    <div class="show-postingan">
        <img src="{{ Storage::url($photo->path) }}" alt="" width="500px">
        <div class="comment">
            <div style="display: flex;justify-content:space-between; width:500px">
                <span style="font-weight: bold; font-size:15px;">{{ $photo->user->username }}</span>
                @if ($photo->user_id == Auth::user()->id)
                    <div>
                        <a href="{{ route('photo.edit', $photo->id) }}">Edit</a>
                        <a href="{{ route('photo.destroy', $photo->id) }}">Hapus</a>
                    </div>
                @endif
            </div>
            <hr>
            <p>
                <span style="font-weight: bold; font-size:13px;">{{ $photo->user->username }}</span>
                {{ $photo->judul }} <br><br>
                {{ $photo->deskripsi }}<br>
                @if ($photo->album)
                    album {{ $photo->album->nama }} -
                @endif
                {{ $photo->created_at->diffForHumans() }}
            </p>
            @if ($photo->comment)
                @foreach ($comment as $item)
                    <div style="margin-top: 10px">
                        <span style="font-weight: bold; font-size:13px;">{{ $item->user->username }}</span>
                        {{ $item->isi }} <br>
                        <div style="display: flex;gap:10px">
                            {{ $item->created_at->diffForHumans() }}
                            @if ($photo->user_id == Auth::user()->id)
                                <form action="{{ route('comment.destroy', $item->id) }}" method="get">
                                    @csrf
                                    <input type="submit" value="hapus" style="color: red;background-color:white;border:0">
                                </form>
                            @elseif ($item->user_id == Auth::user()->id)
                                <form action="{{ route('comment.destroy', $item->id) }}" method="get">
                                    @csrf
                                    <input type="submit" value="hapus" style="color: red;background-color:white;border:0">
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
            <div style="display: flex" class="like-comment-fixed">
                <form action="{{ route('like', $photo->id) }}" method="post">
                    @csrf
                    @php
                        $userLiked = $photo->like->contains('user_id', auth()->id());
                    @endphp
                    <button type="submit" style="background-color: white;border:0;">
                        <i class="{{ $userLiked ? 'fa-solid fa-heart fa-2xl' : 'fa-regular fa-heart fa-2xl' }}"></i>
                    </button>
                    @if ($photo->like)
                        {{ $photo->like->where('photo_id', $photo->id)->count() }} Likes
                    @endif
                </form>
                <a href="{{ route('photo.show', $photo->id) }}"><i class="fa-regular fa-comment fa-2xl"
                        style="margin-left: 10px"></i></a>
            </div>
            <form action="{{ route('comment', $photo->id) }}" method="post" class="comment-fixed">
                @csrf
                <input type="text" name="isi" placeholder="Tambah komentar...">
                <input type="submit" value="kirim">
            </form>
        </div>
    </div>
@endsection
