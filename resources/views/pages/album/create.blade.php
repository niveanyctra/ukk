@extends('layouts.app')
@section('content')
    <div class="mx-auto p-2" style="width: 500px;">
        <form action="{{ route('album.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="nama" class="form-control" name="nama" id="nama" aria-describedby="emailHelp">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Deskripsi</span>
                <textarea class="form-control" name="deskripsi" aria-label="Alamat"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary w-100">Submit</button>
        </form>
    </div>
@endsection
