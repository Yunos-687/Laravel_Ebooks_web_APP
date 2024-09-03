<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Correct import for Log
use Illuminate\Support\Facades\DB; // Import the DB facade


class BookController extends Controller
{
    // will be used for later homepage genre view.
    /* public function index()
    {
        $genres = Book::select('genre')->distinct()->get();
        return view('home', compact('genres'));
    } */


    public function showByGenre($genre)
    {
        $books = Book::where('genre', $genre)->paginate(4);
        // Optionally, log or debug the $books variable

        $user = Auth::user(); // Get the authenticated user

        // Check if the user was retrieved successfully
        if ($user) {
            Log::info('Authenticated user retrieved successfully', ['user_id' => $user->id, 'email' => $user->email]);
            
            $userEmail = $user->email; // Assuming $user is already authenticated

            $likedBooks = DB::table('favorites')
                ->where('user_email', $userEmail) // Filter by the authenticated user's email
                ->pluck('book_id') // Get the book IDs
                ->toArray(); // Convert the result to an array
            
            // Log or return the liked books
            Log::info('Liked book IDs retrieved successfully', $likedBooks);
                    
            // Check if likedBooks array is populated
            if (!empty($likedBooks)) {
                Log::info('Liked books retrieved successfully', $likedBooks);
            } else {
                Log::info('User has no liked books');
            }
        } else {
            Log::error('Failed to retrieve authenticated user');
        }
        
        Log::info('Liked books:', $likedBooks);

        return view('books-with-livewire', [
            'books' => $books,
            'genre' => $genre,
            'likedBooks' => $likedBooks

        ]);
        
    }
    
}
