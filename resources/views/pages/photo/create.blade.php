@extends('layouts.app')
@section('content')
    <div class="mx-auto p-2" style="width: 500px;">
        <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="album_id" value="{{ $album->id }}" hidden>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="path" name="path" accept=".png, .jpg, .jpeg">
                <label class="input-group-text" for="path">Upload</label>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="judul" class="form-control" name="judul" id="judul" aria-describedby="emailHelp">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Deskripsi</span>
                <textarea class="form-control" name="deskripsi" aria-label="Alamat"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary w-100">Submit</button>
        </form>
    </div>
@endsection
