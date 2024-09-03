


<x-app-layout>

<link rel="stylesheet" href="{{ asset('css/book-card.css') }}">
<!-- resources/views/layouts/app.blade.php (or your main layout file) -->
<!-- Assuming you have included jQuery -->

@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite(['resources/js/favorites.js'])

    <x-slot name="header">
    <div class="flex justify-between items-center  mx-[5%]">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Books in {{ $genre }}
            </h2>
            <div class="flex-grow max-w-[30%] flex rounded-md border-2 border-blue-500 overflow-hidden font-[sans-serif] ml-4">
                <!-- Search bar -->
                <input type="email" placeholder="Search Something..."
                    class="w-full outline-none bg-white text-gray-600 text-sm px-4 py-3" />
                <!-- Search button -->
                <button type='button' class="flex items-center justify-center bg-[#007bff] px-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px" class="fill-white">
                        <path
                        d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                        </path>
                    </svg>
                </button>
            </div>
    </div>

    </x-slot>

        <div class='flex-container'>
        @foreach($books as $book)
            @if(in_array($book->id, $likedBooks))
                <x-book-card :book="$book" :isLiked="true" />
            @else
                <x-book-card :book="$book" :isLiked="false" />
            @endif
        @endforeach

        </div>

 
    <div class="flex items-center justify-center  bg-gray-100">
        
    <div class="flex space-x-4 p-4 bg-white rounded shadow mt-8">
    {{$books->links()}}

    </div>

    </div>

     

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>    
</x-app-layout>
