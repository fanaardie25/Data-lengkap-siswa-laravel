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
      Show siswa</li>
      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
    </li>
    <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
      Create Telepon</li>
  </ul>
    <div class="card mt-4">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Input Telepon</div>
                </div>
            </header>
            <div class="card-text h-full space-y-4">
                <div class="input-area">
                    <form action="{{ route('telepon.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{ $datasiswa->id }}">
                        <label for="name" class="form-label">Tambah No telepon</label>
                        <input id="name" type="text" class="form-control" placeholder="Masukkan nomor telepon" name="nomor">
                        <div class="flex space-x-2 mt-3">
                            <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                            <a href="{{ route('telepon.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    </div>
@endsection
