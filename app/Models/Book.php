<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'cover_image', 'genre_id', 'is_borrowed'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}