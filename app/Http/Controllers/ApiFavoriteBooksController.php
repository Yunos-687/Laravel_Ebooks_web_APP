<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book; // Ensure you have a Book model
use Illuminate\Support\Facades\DB;
 
class ApiFavoriteBooksController extends Controller
{
    public function index()
    {
        // Ensure the user is authenticated
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $userEmail = $user->email;
    
        // Retrieve favorite books based on the user's email
        $favoriteBooks = DB::table('favorites')
            ->join('books', 'favorites.book_id', '=', 'books.id')
            ->where('favorites.user_email', $userEmail)
            ->select('books.id', 'books.title', 'books.description', 'books.cover_image')
            ->get(); // Execute the query and retrieve the results
    
        // Check if any favorite books are found
        if ($favoriteBooks->isEmpty()) {
            return response()->json(['message' => 'No favorite books found'], 404);
        }
    
        return response()->json($favoriteBooks, 200);
    }
    
}


