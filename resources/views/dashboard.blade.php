<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center  mx-[5%]">
    <!-- Title aligned to the left -->
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('YouBooks') }}
    </h2>

    <!-- Container for the search bar -->
     
</div>


    </x-slot>

<!--     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->
 
<div class="flex flex-col min-h-screen">

    <div class="flex-grow">    
        <div>
         {{--this is the main section of the home page which contain the cards--}}

            <div style="width: 246px; height: 237px; left: 934px; top: 240px; position: absolute;
            background: #CFDBD5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-top-left-radius: 14px; 
            border-top-right-radius: 14px; border-bottom-right-radius: 14px; border-bottom-left-radius: 89px; border: 1px #CFDBD5 solid"></div>
            <div>

            </div>

            <div style="width: 246px; height: 244px; left: 597px; top: 240px; position: absolute; 
            background: #D5DED5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-top-left-radius: 14px; 
            border-top-right-radius: 14px; border-bottom-right-radius: 14px; border-bottom-left-radius: 89px; border: 1px #D2D2D2 solid"></div>
            <div style="width: 246px; height: 244px; left: 596px; top: 517px; position: absolute; 
            background: #CFDBD5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-top-left-radius: 14px; 
            border-top-right-radius: 14px; border-bottom-right-radius: 14px; border-bottom-left-radius: 89px; border: 1px #CFDBD5 solid"></div>
            <div style="width: 246px; height: 244px; left: 260px; top: 240px; position: absolute;
            background: #CFDBD5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-top-left-radius: 14px; 
            border-top-right-radius: 14px; border-bottom-right-radius: 14px; border-bottom-left-radius: 89px; border: 1px #D2D2D2 solid"></div>
            <div style="width: 246px; height: 244px; left: 260px; top: 517px; position: absolute;
            background: #CFDBD5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); 
            border-top-left-radius: 14px; border-top-right-radius: 14px; border-bottom-right-radius: 14px; 
            border-bottom-left-radius: 89px; border: 1px #D2D2D2 solid"></div>
            <div style="width: 246px; height: 244px; left: 934px; top: 517px; position: absolute;
            background: #CFDBD5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-top-left-radius: 14px; border-top-right-radius: 14px; border-bottom-right-radius: 14px;
            border-bottom-left-radius: 89px; border: 1px #D2D2D2 solid"></div>
            <div style="width: 47px; height: 50px; left: 780px; top: 484px; position: absolute"></div>
            <div style="left: 619px; top: 374px; position: absolute; color: #697C6A; font-size: 36px;
            font-family: Red Rose; font-weight: 700; word-wrap: break-word">كتب انجليزية</div>
            <div style="width: 243px; height: 64px; left: 281px; top: 376px; position: absolute; color: #697C6A; 
            font-size: 32px; font-family: Red Rose; font-weight: 700; word-wrap: break-word">خدمة اجتماعية</div>
            <div style="left: 1024px; top: 651px; position: absolute; color: #697C6A; font-size: 36px;
            font-family: Red Rose; font-weight: 700; word-wrap: break-word">أدب</div>
            <div style="left: 667px; top: 651px; position: absolute; color: #697C6A;
            font-size: 36px; font-family: Red Rose; font-weight: 700; word-wrap: break-word">فلسفة</div>
            <div style="left: 331px; top: 651px; position: absolute; color: #697C6A;
            font-size: 36px; font-family: Red Rose; font-weight: 700; word-wrap: break-word">روايات</div>

        
            <div style="left: 963px; top: 371px; position: absolute; color: #697C6A;
            font-size: 36px; font-family: Red Rose; font-weight: 700; word-wrap: break-word">تطوير الذات </div>

            {{-- this is the  part of the links to the categories of hte books by calling the download method of hte download controller--}}

            <a href="{{ route('books.by.genre', ['genre' => 'Literature']) }}">
                <img style="width: 128px; height: 120px; position: absolute; left: 1042px; top: 526px;" src="{{ asset('images/litera6.png') }}" />
            </a>
            <a href="{{ route('books.by.genre', ['genre' => 'English']) }}">
                <img style="width: 199px; height: 149px; position: absolute; left: 667px; top: 239px;" src="{{ asset('images/transe4.png') }}" />
            </a>
            <a href="{{ route('books.by.genre', ['genre' => 'Social service']) }}">
                <img style="width: 181px; height: 122px; position: absolute; left: 343px; top: 254px;" src="{{ asset('images/social2.png') }}" />
            </a>
            <a href="{{ route('books.by.genre', ['genre' => 'Philosophy']) }}">
                <img style="width: 138px; height: 100px; position: absolute; left: 705px; top: 536px;" src="{{ asset('images/phylo1.png') }}" />
            </a>
            <a href="{{ route('books.by.genre', ['genre' => 'Novel']) }}">
                <img style="width: 140px; height: 123px; position: absolute; left: 366px; top: 528px;" src="{{ asset('images/tales3.png') }}" />
            </a>
            <a href="{{ route('books.by.genre', ['genre' => 'Self Development']) }}">
                <img style="width: 161px; height: 154px; position: absolute; left: 1027px; top: 239px;" src="{{ asset('images/selfDe5.png') }}" />
            </a>


        </div>
    </div>

    
    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>

</div>

</x-app-layout>
