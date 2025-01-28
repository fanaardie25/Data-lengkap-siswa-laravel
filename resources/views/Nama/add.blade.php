@extends('layouts.index')
@section('content')
    <ul class="m-0 p-0 list-none">
        <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter">
            <a href="{{ route('dashboard') }}">
                <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                <iconify-icon icon="heroicons-outline:chevron-right"
                    class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
            </a>
        </li>
        <li class="inline-block relative text-sm text-primary-500 font-Inter">
            <a href="{{ route('siswa.index') }}">
                Siswa
                <iconify-icon icon="heroicons-outline:chevron-right"
                    class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
            </a>
        </li> 
        <li class="inline-block relative text-sm text-primary-500 font-Inter " @disabled(true)>
            <a href="">
                Create Siswa
            </a>
        </li>
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
                    <form action="{{ route('siswa.store') }}" method="POST" id="createForm">
                        @csrf
                        <div class="mb-3">
                            <label for="itemName" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="itemName" name="name" required
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="itemName" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="itemName" name="nisn" required
                                value="{{ old('nisn') }}">
                        </div>
                        <div class="mb-3">
                            @foreach ($datahobi as $hobi)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $hobi->id }}"
                                        id="{{ $hobi->hobi }}" name="hobis[]">
                                    <label class="form-check-label" for="{{ $hobi->hobi }}">{{ $hobi->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
