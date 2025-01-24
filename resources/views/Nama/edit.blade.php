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
            Siswa</li>
        <iconify-icon icon="heroicons-outline:chevron-right"
            class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
        </li>
        <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
            Edit siswa</li>
    </ul>
    <div class="card mt-4">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Input Siswa</div>
                </div>
            </header>
            <div class="card-text h-full space-y-4">
                <div class="input-area">
                    <form action="{{ route('siswa.update', $datasiswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $datasiswa->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $datasiswa->nisn->nisn }}">
                        </div>
                        <div class="mb-3">
                            <label for="hobis" class="form-label">Hobi</label>
                            @foreach ($datahobi as $hobi)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $hobi->id }}" name="hobis[]"
                                        {{ in_array($hobi->id, $datasiswa->hobi->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hobis">{{ $hobi->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Update</button>
                        <a href="{{ route('siswa.index') }}" class="px-4 py-2 text-gray-700 dark:text-gray-100 bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring focus:ring-gray-200">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
