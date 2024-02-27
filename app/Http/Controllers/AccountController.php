<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = Album::where('user_id', Auth::user()->id)->get();
        $photo = Photo::where('user_id', Auth::user()->id)->get();
        return view('pages.account.index', compact('photo', 'album'));
    }
    public function user($id)
    {
        $user = User::find($id);
        $album = Album::where('user_id', $id)->get();
        $photo = Photo::where('user_id', $id)->get();
        return view('pages.user.index', compact('user','photo', 'album'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('pages.account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate(
            [
                'username' => 'required|unique:users,username,' . $user->id . '|lowercase',
                'password' => 'nullable|confirmed',
                'nama' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'alamat' => 'required'
            ]
        );

        $user->username = $request->username;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->route('account.index');
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
