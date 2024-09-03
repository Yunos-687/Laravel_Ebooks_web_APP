<?php



namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class FavoriteBooks extends Component
{
    use WithPagination;

    public function render()
    {
        $userEmail = Auth::user()->email;

        // Retrieve favorite books based on the user's email
        $favoriteBooks = DB::table('favorites')
            ->join('books', 'favorites.book_id', '=', 'books.id')
            ->where('favorites.user_email', $userEmail)
            ->select('books.id', 'books.title', 'books.description', 'books.cover_image', 'books.pdf_file')
            ->paginate(4); // Paginate with 4 items per page

        return view('livewire.favorite-books', [
            'favoriteBooks' => $favoriteBooks
        ]);
    }

    public function removeFromFavorites($bookId)
    {
        $userEmail = Auth::user()->email;

        // Remove the book from favorites
        DB::table('favorites')
            ->where('user_email', $userEmail)
            ->where('book_id', $bookId)
            ->delete();

        // Refresh the component to reflect changes
        $this->resetPage(); // Reset the pagination to the first page
    }
}
