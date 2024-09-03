


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
 
    </div>

    </x-slot>
        <!-- Include the Livewire component -->
        <livewire:book-search :genre="$genre" :likedBooks="$likedBooks" />

        <div class='flex-container'>


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
