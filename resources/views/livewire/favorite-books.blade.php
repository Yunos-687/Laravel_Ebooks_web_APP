<div >
    <!-- Container for favorite books -->
    <div class="flex-container">
        @forelse($favoriteBooks as $book)
            <div class="flex-item ">
                <!-- Display book cover image -->
                <img src="{{ asset($book->cover_image) }}" alt="Book Cover" style="display:block; width: 244px; height: 256px; border-bottom-left-radius: 89px;">

                <!-- Like button to remove from favorites -->
                <img 
                    src="{{ asset('images/like.png') }}" 
                    alt="Like Image" 
                    class="favorite-icons favorited" 
                    style="display:inline; cursor: pointer; width: 30px; height: 30px;"                    
                    wire:click="removeFromFavorites({{ $book->id }})"
                />

                <!-- Download link with icon -->
                <div style="display:inline;">
                    <a href="{{ route('download', ['filename' => $book->pdf_file]) }}" class="flex items-center">
                        <img src="{{ asset('images/downloadicon.png') }}" style="width: 30px; height: 30px;display:inline;" alt="Download Icon">
                    </a>
                </div>

                <!-- Book description -->
                <p style="text-align: center; width: 244px;">{{ $book->description }}</p>
            </div>
        @empty
            <!-- No books found message -->
            <p class="text-center text-gray-500 w-full">No content found.</p>
        @endforelse
    </div>


    <div class="flex items-center justify-center  bg-gray-100">
        
        <div class="flex space-x-4 p-4 bg-white rounded shadow mt-8">
            {{$favoriteBooks->links()}}

        </div>

    </div>
</div>
