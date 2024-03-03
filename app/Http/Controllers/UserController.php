<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        $user = User::where('username', $username)->first();
        $albums = Album::where('user_id', $user->id)->get();
        $photos = Photo::where('user_id', $user->id)->get();
        return view('pages.user.show', compact('user', 'albums', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'alamat' => 'required',
            'password' => 'nullable',
        ]);
        if($request->password)
        {
            $user->password = bcrypt($request->password);
        }
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->save();
        return redirect()->route('user.show', $user->username);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home');
    }
}
