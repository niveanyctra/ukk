@extends('layout.app')
@push('style')
    <style>

    </style>
@endpush
@section('content')
    <form action="{{ route('album.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <input type="text" name="nama" placeholder="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="deskripsi" id="" cols="30" rows="10" placeholder="deskripsi"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="buat">
                </td>
            </tr>
        </table>
    </form>
@endsection
