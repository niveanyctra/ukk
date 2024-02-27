<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photo = Photo::where('user_id', Auth::user()->id)->get();
        return view('pages.account.photo.index', compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $album = Album::find($id);
        return view('pages.photo.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required|max:255',
                'deskripsi' => 'required',
                'path' => 'required|image',
                'album_id' => 'required',
            ]
        );

        $file = $request->file('path');
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/photos', $fileName);

        Photo::create(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'path' => "photos/{$fileName}",
                'album_id' => $request->album_id,
                'user_id' => Auth::user()->id
            ]
        );

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $photo = Photo::find($id);
        $comment = Comment::where('photo_id', $photo->id)->get();

        return view('pages.photo.show', compact('photo', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = Photo::find($id);
        $album = Album::all();

        return view('pages.photo.edit', compact('photo', 'album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $photo = Photo::find($id);
        $request->validate(
            [
                'judul' => 'required|max:255',
                'deskripsi' => 'required',
                'path' => 'nullable|image',
                'album_id' => 'required',
            ]
        );
        if ($request->hasFile('path') && !empty($request->path)) {

            if ($photo->path) {
                Storage::delete('public/' . $photo->path);
            }

            $file = $request->file('path');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/photos', $fileName);

            $photo->path = "photos/{$fileName}";
        }

        $photo->judul = $request->judul;
        $photo->deskripsi = $request->deskripsi;
        $photo->album_id = $request->album_id;
        $photo->save();
        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Photo::find($id);
        if ($photo->path) {
            Storage::delete('public/' . $photo->path);
        }
        $photo->delete();

        return redirect()->route('account.index');
    }
}
