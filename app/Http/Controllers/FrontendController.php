<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
        $users = User::all();
        $photos = Photo::all()->sortByDesc('created_at');
        return view('index', compact('photos', 'users'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $photos = Photo::where('judul', 'LIKE', "%$query%")->get();
        $albums = Album::where('nama', 'LIKE', "%$query%")->get();
        $users = User::where('nama', 'LIKE', "%$query%")
        ->orWhere('username', 'LIKE', "%$query%")->get();
        return view('search', compact('photos', 'albums', 'users'));
    }
}
