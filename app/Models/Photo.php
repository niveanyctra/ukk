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
        'user_id',
        'album_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
    public function like()
    {
        return $this->hasMany(Like::class);
    }
}
