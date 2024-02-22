@extends('layout.app')
@push('style')
    <style>
        .create-page {
            margin: 300px 0 0 300px;
        }

        .create-button {
            text-decoration: none;
            color: black;
            border: 1px solid;
            border-radius: 20px;
            padding: 10px 8px 10px 8px;
            font-size: 30px;
        }
    </style>
@endpush
@section('content')
    <div class="create-page">
        <a href="{{ route('album.create') }}" class="create-button">Buat Album Baru</a>
        <a href="{{ route('photo.create') }}" class="create-button">Upload Foto</a>
    </div>
@endsection
