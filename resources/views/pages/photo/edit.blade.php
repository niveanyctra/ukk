@extends('layouts.app')
@section('content')
    <div class="mx-auto p-2" style="width: 500px;">
        <form action="{{ route('photo.update', $photo->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="path" name="path" accept=".png, .jpg, .jpeg">
                <label class="input-group-text" for="path">Upload</label>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="judul" class="form-control" name="judul" id="judul"
                    value="{{ old('judul', $photo->judul) }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Deskripsi</span>
                <textarea class="form-control" name="deskripsi" aria-label="Alamat">{{ old('deskripsi', $photo->deskripsi) }}</textarea>
            </div>
            <label for="album_id" class="form-label">Album</label>
            <select class="form-select mb-3" aria-label="Default select example" name="album_id">
                <option selected value="{{ old('album_id', $photo->album_id) }}">{{ $photo->album->nama }}</option>
                <option disabled> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->nama }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-secondary w-100">Submit</button>
        </form>
    </div>
@endsection
