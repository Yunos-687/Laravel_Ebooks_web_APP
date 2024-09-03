<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiBooksByGenreController extends Controller
{
    public function index($genre)
    {
        // Ensure the user is authenticated
 

        // Retrieve books based on the provided genre
        $books = DB::table('books')
            ->where('genre', $genre)
            ->select('id', 'title', 'description', 'cover_image')
            ->get(); // Execute the query and retrieve the results

        // Check if any books are found
        if ($books->isEmpty()) {
            return response()->json(['message' => 'No books found for this genre'], 404);
        }

        return response()->json($books, 200);
    }
}
