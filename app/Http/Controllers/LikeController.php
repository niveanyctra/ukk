<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        $photo = Photo::find($id);
        $user = Auth::user();
        $like = Like::where('photo_id', $photo->id)->where('user_id', $user->id)->first();
        if (!$like) {
            Like::create([
                'user_id' => $user->id,
                'photo_id' => $photo->id,
            ]);
        } else {
            $like->delete();
        }
        return redirect()->back();
    }
}
