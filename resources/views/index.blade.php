@extends('layout.app')
@push('style')
    <style>
        .postingan {
            padding-bottom: 20px;
            border-bottom: 1px solid;
            width: 400px;
        }

        .top-postingan {
            display: flex;
        }
    </style>
@endpush
@section('content')
    <form action="{{ route('search') }}" method="post">
        @csrf
        <input type="text" name="query">
        <button type="submit">Cari</button>
    </form>
    @foreach ($photo as $item)
        <div class="postingan">
            <div class="top-postingan">
                <p>
                    @if ($item->user_id == Auth::user()->id)
                        <a href="{{ route('account.index') }}"><span
                                style="font-weight: bold; font-size:15px;">{{ $item->user->username }}</span></a> -
                    @else
                        <a href="{{ route('user', $item->user->id) }}"><span
                                style="font-weight: bold; font-size:15px;">{{ $item->user->username }}</span></a> -
                    @endif
                    {{ $item->created_at->diffForHumans() }}
                </p>
            </div>
            <a href="{{ route('photo.show', $item->id) }}">
                <img src="{{ Storage::url($item->path) }}" alt="" width="400px">
            </a>
            <div class="bottom-postingan">
                <div style="display: flex">
                    <form action="{{ route('like', $item->id) }}" method="post">
                        @csrf
                        @php
                            $userLiked = $item->like->contains('user_id', auth()->id());
                        @endphp
                        <button type="submit" style="background-color: white;border:0;">
                            <i class="{{ $userLiked ? 'fa-solid fa-heart fa-2xl' : 'fa-regular fa-heart fa-2xl' }}"></i>
                        </button>
                    </form>
                    <a href="{{ route('photo.show', $item->id) }}"><i class="fa-regular fa-comment fa-2xl"
                            style="margin-left: 10px"></i></a>
                </div>
                <div style="margin-top: 7px">
                    @if ($item->like)
                        {{ $item->like->where('photo_id', $item->id)->count() }} Likes
                    @endif
                </div>
                <div>
                    @if ($item->user_id == Auth::user()->id)
                        <a href="{{ route('account.index') }}"><span
                                style="font-weight: bold; font-size:15px;">{{ $item->user->username }}</span></a> -
                    @else
                        <a href="{{ route('user', $item->user->id) }}"><span
                                style="font-weight: bold; font-size:15px;">{{ $item->user->username }}</span></a> -
                    @endif
                    {{ $item->judul }} <br>
                    {{ $item->deskripsi }}
                </div>
                <div style="margin-top: 8px">
                    @if ($item->comment)
                        <a href="{{ route('photo.show', $item->id) }}">view all
                            {{ $item->comment->where('photo_id', $item->id)->count() }} comments</a>
                    @endif
                </div>
                <form action="{{ route('comment', $item->id) }}" method="post">
                    @csrf
                    <input type="text" name="isi" placeholder="Tambah komentar...">
                    <input type="submit" value="kirim">
                </form>
            </div>
        </div>
    @endforeach
@endsection
