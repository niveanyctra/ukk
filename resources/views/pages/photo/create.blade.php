@extends('layout.app')
@section('content')
    <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>
                    <select name="album_id" id="">
                        <option value="">Tambah Album</option>
                        @foreach ($album as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="file" name="path" accept=".jpg, .png, .jpeg" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="judul" placeholder="judul">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="deskripsi" id="" cols="30" rows="10" placeholder="deskripsi"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="upload">
                </td>
            </tr>
        </table>
    </form>
@endsection
