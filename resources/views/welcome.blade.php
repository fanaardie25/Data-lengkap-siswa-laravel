@extends('layouts.blog')
@section('title','halaman utama')
@section('content')
{{-- navbar --}}
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('logo nusa blog.jpg') }}" class="h-10" alt="Flowbite Logo">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Nusa Blog</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" 
        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center">
        <a href="{{ route('login') }}">Login</a>
    </button>
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-slate-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  {{-- end navbar --}}
  
<main>
{{-- jumbotron --}}
    <section class="bg-center bg-cover bg-no-repeat bg-[url('https://i.pinimg.com/736x/e3/49/5d/e3495dac10cee97a5d172b054905e0ef.jpg')] bg-gray-700 bg-blend-multiply h-[70vh] md:h-screen">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Welcome To Nusa Blog</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                Selamat datang di blog kami, tempat di mana ide, inspirasi, dan cerita dibagikan untuk memperkaya wawasan Anda. Kami berfokus pada konten berkualitas yang menginspirasi, informatif, dan relevan untuk mendukung perjalanan Anda.
            </p>
        </div>
    </section>
{{-- jumbotron end --}}

{{-- blog section --}}
<section class="blog-container min-h-screen mt-8 flex justify-center">
    <div class="px-2">
        <h4 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-500 text-center mb-8 hover:from-teal-500 hover:to-blue-500 transition-colors duration-300">
            Jelajahi blog
        </h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Cards -->
            @foreach ($datapost as $post)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 h-full flex flex-col">
                <a href="#">
                    <img class="w-full h-48 object-cover rounded-t-lg" src="{{ asset('storage/' . $post->image) }}" alt="" />
                </a>
                <div class="p-5 flex flex-col flex-grow">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        @php
                            echo Str::limit($post->content, 100);
                        @endphp
                    </p>
        
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        <span class="mr-2">By <span class="font-semibold text-gray-900 dark:text-white">{{ $post->user->name }}</span></span>
                        <span>·</span>
                        <span class="ml-2">{{ $post->created_at->format('F j, Y') }}</span>
                    </div>
        
                    <!-- Tombol "Read more" tetap di bawah -->
                    <div class="mt-auto">
                        <a href="{{ route('detail.blog', $post->slug) }}" 
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>            
            @endforeach  
            
            </div>
        </div>
    </div>
</section>

{{-- end blog section --}}
</main>
@endsection