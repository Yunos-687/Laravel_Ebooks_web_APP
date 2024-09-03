<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'genre',
        'publication_year',
        'isbn',
        'pdf_file',
        'cover_image',
        'description',
    ];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites','book_id', 'user_email');
    }

 
}
