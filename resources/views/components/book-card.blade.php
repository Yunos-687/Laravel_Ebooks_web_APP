<!-- resources/views/components/book-card.blade.php -->
<!-- Link to a specific CSS file for styling the book card -->

 <link rel="stylesheet" href="{{ asset('css/book-card.css') }}">
 @vite(['resources/css/app.css', 'resources/js/app.js'])
 @php
    $iconClass = $isLiked ? 'favorite-icon favorited' : 'favorite-icon';
@endphp
 
    <div class="flex-item">
        <!-- Display book cover image with specified style -->
        <img src="{{ asset($book->cover_image) }}" alt="Book Cover" style="display:block; width: 244px; height: 256px; border-bottom-left-radius: 89px;">

        <!-- Display book title with like button -->
        <img id="{{ $book->id }}" src="{{ asset('images/like.png') }}" alt="Like Image" class = "{{ $iconClass }}" style="display:inline; cursor: pointer; width: 30px; height: 30px;">

        <!-- Download link with icon -->
        <div style="display:inline;">
            <a href="{{ route('download', ['filename' => $book->pdf_file]) }}" onclick="return someFunction();">
                <img src="{{ asset('images/downloadicon.png') }}" style="width: 30px; height: 30px;display:inline;" alt="Download Icon">
            </a>
        </div>

        <!-- Book description -->
        <p style="text-align: center; width: 244px;">{{ $book->description }}</p>
        <!-- Add more book details as needed -->
    </div>

