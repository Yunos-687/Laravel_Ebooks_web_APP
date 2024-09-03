<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    // Disable auto-incrementing primary key
    public $incrementing = false;

    // Define the primary key as a composite of user_email and book_id
    protected $primaryKey = ['user_email', 'book_id'];


    protected $fillable = [
        'user_email',
        'book_id',
    ];
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
