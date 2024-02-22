@extends('pages.account.index')
@section('content-profil')
    @foreach ($photo as $item)
        <a href="{{ route('photo.show', $item->id) }}">
            <img src="{{ Storage::url($item->path) }}" alt="" width="300px" height="300px">
        </a>
    @endforeach
@endsection
