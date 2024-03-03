<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $photo = Photo::find($id);
        $request->validate([
            'isi' => 'required|max:255',
        ]);
        Comment::create([
            'isi' => $request->isi,
            'photo_id' => $photo->id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
