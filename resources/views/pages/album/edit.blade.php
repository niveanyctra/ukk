@extends('layout.app')
@section('content')
    <form action="{{ route('album.update', $album->id) }}" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <input type="text" name="nama" value="{{ old('nama', $album->nama) }}">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="deskripsi" id="" cols="30" rows="10">{{ old('deskripsi', $album->deskripsi) }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">ubah</button>
                </td>
            </tr>
        </table>
    </form>
@endsection
