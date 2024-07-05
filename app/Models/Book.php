<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'genre_id', 'year', 'isbn', 'copies'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
