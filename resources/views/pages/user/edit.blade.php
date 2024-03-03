@extends('layouts.app')
@section('content')
    <div class="mx-auto p-2" style="width: 500px;">
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="nama" class="form-control" name="nama" id="nama" aria-describedby="emailHelp"
                    value="{{ old('nama', $user->nama) }}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" name="username" id="username" aria-describedby="emailHelp"
                    value="{{ old('nama', $user->username) }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    value="{{ old('nama', $user->email) }}">
            </div>
            <div class="input-group">
                <span class="input-group-text">Alamat</span>
                <textarea class="form-control" name="alamat" aria-label="Alamat">{{ old('nama', $user->alamat) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-secondary w-100 mb-3">Submit</button>
            <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger w-100">Hapus Akun</a>
        </form>
    </div>
@endsection
