@extends('layout.app')
@section('content')
    <form action="{{ route('account.update', $user->id) }}" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <input type="text" name="username" placeholder="username" value="{{ old('username', $user->username) }}">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" placeholder="password">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nama" placeholder="nama" value="{{ old('nama', $user->nama) }}">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" placeholder="email" value="{{ old('email', $user->email) }}">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="alamat" id="" cols="30" rows="10">{{ old('alamat', $user->alamat) }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="ubah">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <form action="{{ route('account.destroy', $user->id) }}" method="get">
        @csrf
        <input type="submit" value="Hapus Akun">
    </form>
@endsection
