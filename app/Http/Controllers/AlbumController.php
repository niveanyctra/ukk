<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
        ]);
        Album::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('user.show', Auth::user()->username);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $album = Album::find($id);
        $photos = Photo::where('album_id', $album->id)->get();
        return view('pages.album.show', compact('album', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::find($id);
        return view('pages.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $album = Album::find($id);
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
        ]);
        $album->nama = $request->nama;
        $album->deskripsi = $request->deskripsi;
        $album->save();
        return redirect()->route('album.show', $album->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('user.show', Auth::user()->username);
    }
}
