@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-8 row">
            @foreach ($photos as $photo)
                <div class="col-6">
                    <p>
                        <a href="{{ route('user.show', $photo->user->username) }}"
                            class="text-decoration-none text-dark fs-5">{{ $photo->user->username }}</a>
                        - {{ $photo->created_at->diffForHumans() }}
                    </p>
                    <a href="{{ route('photo.show', $photo->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ Storage::url($photo->path) }}" alt="" width="300px"class="img-fluid">
                    </a>
                    <hr width="300px">
                </div>
            @endforeach
        </div>
        <div class="col-4">
            <h3>User</h3>
            <hr>
            @foreach ($users as $user)
                <p>
                    <a href="{{ route('user.show', $user->username) }}"
                        class="text-decoration-none text-dark fs-5">{{ $user->username }}</a>
                </p>
            @endforeach
        </div>
    </div>
@endsection
