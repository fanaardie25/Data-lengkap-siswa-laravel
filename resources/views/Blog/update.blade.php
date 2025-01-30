@extends('layouts.index')
@section('content')
    <ul class="m-0 p-0 list-none">
        <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
            <a href="index.html">
                <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                <iconify-icon icon="heroicons-outline:chevron-right"
                    class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
            </a>
        </li>
        <li class="inline-block relative text-sm text-primary-500 font-Inter ">
            Data
            <iconify-icon icon="heroicons-outline:chevron-right"
                class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
        </li>
        <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
            Post</li>
        <iconify-icon icon="heroicons-outline:chevron-right"
            class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
        </li>
        <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
            Edit post</li>
    </ul>
    <div class="card mt-4">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Edit Post</div>
                </div>
            </header>
            <div class="card-text h-full space-y-4">
                <div class="input-area">
                    <form action="{{ route('blog.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input id="title" type="text" class="form-control" placeholder="Masukkan title"
                                name="title" required value="{{ $post->title }}">
                        </div>

                        <div class="form-group">
                            <label for="summernote" class="form-label">input content</label>
                            <textarea id="summernote" name="content">{{ old('content', $post->content) }}</textarea>
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <label for="image" class="form-label">Upload Image Thumbnail</label>
                            <div class="filegroup">
                                <label>
                                  <input type="file" class=" w-full hidden" name="image">
                                  <span class="w-full h-[40px] file-control flex items-center custom-class">
                      <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                        <span class="text-slate-400">Choose a file or drop it here...</span>
                                  </span>
                                  <span class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                  </span>
                                </label>
                              </div>
                        </div>

                        @if ($post->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image"
                                    style="max-height: 150px; max-width: 100%;">
                            </div>
                        @endif

                     <div class="form-group mt-3 mb-3">
                        <label for="" class="form-label">upload image slider</label>
                        <div class="filegroup">
                            <label>
                              <input type="file" class=" w-full hidden" name="image_slider[]" multiple="multiple">
                              <span class="w-full h-[40px] file-control flex items-center custom-class">
                  <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                    <span id="placeholder" class="text-slate-400">Choose a file or drop it here...</span>
                              </span>
                              <span class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                              </span>
                            </label>
                          </div>
                     </div>

                     @if ($post->images)
                     <div class="mb-3 flex gap-3">
                        @foreach ($post->images as $image)
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Current Image"
                            style="max-height: 150px; max-width: 100%;">
                        @endforeach
                     </div>
                 @endif

                        <div class="flex space-x-2 mt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                            <a href="{{ route('blog.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: 'Masukan content blog anda',
            tabsize: 2,
            height: 200,
        });
    </script>
@endsection
