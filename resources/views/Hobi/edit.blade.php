@extends('layouts.index')
@section('content')
<ul class="m-0 p-0 list-none">
    <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
      <a href="index.html">
        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
        <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
      </a>
    </li>
    <li class="inline-block relative text-sm text-primary-500 font-Inter ">
      Data
      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
    </li>
    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
      Hobby</li>
      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
    </li>
    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
      Update Hobby</li>
  </ul>
    <div class="card mt-4">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Update hobi</div>
                </div>
            </header>
            <div class="card-text h-full space-y-4">
                <div class="input-area">
                    <form action="{{ route('hobi.update',$datahobi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name" class="form-label">Nama Hobi</label>
                        <input id="name" type="text" class="form-control" placeholder="Masukkan nama hobi" name="name" value="{{ $datahobi->name }}">
                        <div class="flex space-x-2 mt-3">
                            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Kirim</button>
                            <a href="{{ route('hobi.index') }}" class="px-4 py-2 text-gray-700 dark:text-gray-50 bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-200">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    </div>
@endsection
