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
      Edit Telepon</li>
  </ul>
    <div class="card mt-4">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Edit Telepon</div>
                </div>
            </header>
            <div class="card-text h-full space-y-4">
                <div class="input-area">
                    <form action="{{ route('telepon.update', $datatelepon->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="siswa_id" value="{{ $datatelepon->siswa_id }}">
                        <div class="mb-3">
                            <label for="nomor" class="form-label">No telepon</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $datatelepon->telepon }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('siswa.show', $datatelepon->siswa_id) }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    </div>
@endsection
