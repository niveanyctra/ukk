@extends('layout.app')
@push('style')
    <style>
        .show-postingan {
            display: flex;
        }
    </style>
@endpush
@section('content')
    <div class="show-postingan">
        <img src="{{ Storage::url($photo->path) }}" alt="" width="500px">
        <div class="comment">
            <div style="display: flex;justify-content:space-between; width:500px">
                <span style="font-weight: bold; font-size:15px;">{{ $photo->user->username }}</span>
                @if ($photo->user_id == Auth::user()->id)
                    <a href="{{ route('photo.index') }}">Cancel</a>
                @endif
            </div>
            <hr>
            <p>
                <span style="font-weight: bold; font-size:13px;">{{ $photo->user->username }}</span>
            </p>
            <form action="{{ route('photo.update', $photo->id) }}" method="post">
                @csrf
                <table>
                    <tr>
                        <td>
                            <input type="text" name="judul" value="{{ old('judul', $photo->judul) }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="deskripsi" id="" cols="30" rows="10">{{ old('deskripsi', $photo->deskripsi) }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="album_id" id="">
                                @if ($photo->album)
                                    <option value="{{ old('album_id', $photo->album_id) }}">{{ $photo->album->nama }}
                                    </option>
                                @else
                                    <option value="">Tambah Album</option>
                                @endif
                                <option value="" disabled>------------</option>
                                @foreach ($album as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit">ubah</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
