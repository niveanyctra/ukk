<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'isi',
        'photo_id',
        'user_id',
    ];

    function photo()
    {
        return $this->belongsTo(Photo::class, 'photo_id');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
