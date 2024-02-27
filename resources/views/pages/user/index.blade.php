@extends('layout.app')
@push('style')
    <style>
        .profile {
            padding: 0 0 40px 0;
        }

        .edit-profil {
            text-decoration: none;
            border: 1px solid black;
            border-radius: 5px;
        }
    </style>
@endpush
@section('content')
    <div class="profile">
        <h4 style="display: flex; justify-content:space-between">
            {{ $user->nama }}
        </h4>
        <p>
            {{ $user->username }} <br><br>
            {{ $user->alamat }}
        </p>
    </div>
    <hr>
    @foreach ($album as $item)
        <table>
            <tr>
                <td width="800px">
                    <a href="{{ route('album.show', $item->id) }}">
                        <h3>{{ $item->nama }}</h3>
                    </a>
                </td>
            </tr>
        </table>
    @endforeach
    <hr>
    @foreach ($photo as $item)
        <a href="{{ route('photo.show', $item->id) }}">
            <img src="{{ Storage::url($item->path) }}" alt="" width="300px" height="300px"
                style="object-fit: cover;">
        </a>
    @endforeach
@endsection
