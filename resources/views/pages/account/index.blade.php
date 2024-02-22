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
        <h4>
            {{ Auth::user()->nama }}
            <a href="{{ route('account.edit', Auth::user()->id) }}" class="edit-profil">Edit Profil</a>
        </h4>
        <p>
            {{ Auth::user()->username }} <br><br>
            {{ Auth::user()->alamat }}
        </p>
    </div>

    @include('components.nav-profile')
    <br>
    <hr>
    <div style="margin-top: 30px">
        @yield('content-profil')
    </div>
@endsection
