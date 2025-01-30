@extends('layouts.blog')

@section('content')
    <div class="container mx-auto px-4 py-10 max-w-3xl">


        <div id="default-carousel" class="relative w-full" data-carousel="slide">

            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                @if ($blog->images->count() > 0)
                    @foreach ($blog->images as $index => $image)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $image->path) }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Image {{ $index + 1 }}">
                        </div>
                    @endforeach
                @endif
            </div>
        
 
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach ($blog->images as $index => $image)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                        aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>
        

            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
        
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        
        {{-- Judul & Informasi Blog --}}
        <h1 class="text-4xl font-bold text-gray-900 mb-4 mt-4">{{ $blog->title }}</h1>

        <div class="flex items-center text-gray-600 text-sm mb-6">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($blog->user->name ?? 'anonymouse') }}&background=random"
                class="w-10 h-10 rounded-full border mr-3" alt="Author">
            <span class="font-semibold">{{ $blog->user->name ?? 'anonymouse' }}</span>
            <span class="mx-2">•</span>
            <span>{{ $blog->created_at->format('F d, Y') }}</span>
        </div>


        {{-- Konten Blog --}}
        <div class="text-gray-800 leading-relaxed text-lg">
            @php
                echo $blog->content;
            @endphp
        </div>



        {{-- Tombol Navigasi --}}
        <div class="mt-10 flex justify-between">
            <a href="{{ route('welcome') }}" class="text-blue-600 hover:underline">← Back to Blog</a>
        </div>
    </div>
@endsection
