<?php




// app/Http/Livewire/BookSearch.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookSearch extends Component
{
    public $search = '';
    public $genre;
    public $likedBooks = [];
    public $books = [];

    public function mount($genre, $likedBooks)
    {
        // Initialize genre and likedBooks
        $this->genre = $genre;
        $this->likedBooks = $likedBooks;

        // Load books initially
        $this->loadBooks();
    }

    public function updatedSearch()
    {
        $this->loadBooks();
    }

    public function loadBooks()
    {
        $this->books = Book::where('genre', $this->genre)
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('author', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.book-search', ['books' => $this->books]);
    }
}
