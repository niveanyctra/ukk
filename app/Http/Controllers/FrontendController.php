<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $photo = Photo::all()->sortByDesc('created_at');
        return view('index', compact('photo'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('username', 'LIKE', "%$query%")
            ->orWhere('nama', 'LIKE', "%$query%")
            ->get();

        $albums = Album::where('nama', 'LIKE', "%$query%")->get();

        $photos = Photo::where('judul', 'LIKE', "%$query%")->get();

        return view('search', compact('users', 'albums', 'photos'));
    }
}
