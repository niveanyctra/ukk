<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'path',
        'album_id',
        'user_id',
    ];

    function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function comment()
    {
        return $this->hasOne(Comment::class,  'photo_id',);
    }
    function like()
    {
        return $this->hasMany(Like::class,  'photo_id',);
    }
}
