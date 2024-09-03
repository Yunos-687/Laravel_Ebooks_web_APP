<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Log; // Correct import for Log

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $bookId = $request->book_id;
        $userEmail = $request->user_email;

        // Retrieve the user from the database based on the email and load their books
        $user = User::where('email', Auth::user()->email)->firstOrFail();
    
        $isFavorite = DB::table('favorites')
        ->where('user_email', $user->email)
        ->where('book_id', $bookId)
        ->exists();
            
        // Log the result for debugging
        if ($isFavorite) {
            Log::info('Book is already in user favorites', ['user_email' => $user->email, 'book_id' => $bookId]);
            return response()->json(['success' => false, 'message' => 'This book is already in your favorites.']);
        } else {
            Log::info('Book is not in user favorites, proceeding to attach', ['user_email' => $user->email, 'book_id' => $bookId]);
        }

        DB::beginTransaction();

        try {
            $user->books()->attach($bookId, ['user_email' => $user->email]);
    
            DB::commit(); // Commit the transaction if successful
    
            return response()->json(['success' => true,'status' => 'success', 'message' => 'Book attached successfully']);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction on error
    
            return response()->json(['status' => 'error', 'message' => 'Failed to attach role: ' . $e->getMessage()]);
        }




        

     
    }

    public function destroy(Request $request)
    {
        $userEmail = Auth::user()->email;
        $bookId = $request->input('book_id');
        
        Log::info('Delete request data', ['user_email' => $userEmail, 'book_id' => $bookId]);

        // Validate inputs
        if (!$userEmail || !$bookId) {
            return response()->json(['success' => false, 'message' => 'Invalid inputs'], 400);
        }
    
        // Attempt to delete the record
        try {
            // Attempt to delete the record
            $deleted = DB::table('favorites')
                ->where('user_email', $userEmail)
                ->where('book_id', $bookId)
                ->delete();

            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Removed from favorites']);
            } else {
                return response()->json(['success' => false, 'message' => 'No matching record found to remove']);
            }
        } catch (\Exception $e) {
            // Log the exception message for debugging
            Log::error('Failed to remove from favorites', [
                'user_email' => $userEmail,
                'book_id' => $bookId,
                'error_message' => $e->getMessage()
            ]);

            // Return a JSON response with the exception message
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while removing from favorites: ' . $e->getMessage()
            ], 500);
        }
    
    }
    
}
