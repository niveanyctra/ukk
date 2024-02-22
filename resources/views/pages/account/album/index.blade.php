@extends('pages.account.index')
@push('style')
    <style>
        .album {
            display: flex;
            justify-content: space-between
        }
    </style>
@endpush
@section('content-profil')
    @foreach ($album as $item)
        <div class="album">
            <a href="{{ route('album.show', $item->id) }}">
                <h3>{{ $item->nama }}</h3>
            </a>
            <form action="{{ route('album.destroy', $item->id) }}" method="get">
                <input type="submit" value="Hapus Album">
            </form>
        </div>
    @endforeach
@endsection
