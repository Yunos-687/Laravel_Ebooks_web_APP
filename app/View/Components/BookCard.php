<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BookCard extends Component
{
    public $book;
    public $isLiked;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $book
     * @param  bool  $isLiked
     * @return void
     */
    public function __construct($book, $isLiked)
    {
        $this->book = $book;
        $this->isLiked = $isLiked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.book-card'); // Ensure this path is correct and view exists
    }
}
