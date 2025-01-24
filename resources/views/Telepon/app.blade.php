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
        Detail siswa</li>
</ul>
<div class="bg-white dark:bg-slate-800 shadow-md rounded-lg overflow-hidden mt-4">
    <div class="bg-gray-800 text-white px-6 py-4 border-b-slate-50 ">
        <h3 class="text-2xl font-bold">Detail Siswa</h3>
    </div>
    <div class="p-6">
        <!-- Menampilkan detail untuk satu student -->
        <h5 class="text-xl font-semibold mb-2">Nama:{{ $datasiswa->name }}</h5>
        <p class="text-gray-700 mb-4 dark:text-gray-300"><strong>NISN:</strong> {{ $datasiswa->nisn->nisn }}</p>

        <h5 class="text-lg font-medium mb-3">Nomor Telepon:</h5>
        <ul class="list-disc pl-6 space-y-2">
            @foreach ($datasiswa->telepon as $phone)
                <li class="flex justify-between items-center bg-gray-100 dark:bg-slate-900 p-4 rounded-md">
                    <span class="text-gray-800 dark:text-white">{{ $phone->telepon }}</span>
                    <div class="flex gap-2">
                        <form action="{{ route('telepon.destroy', $phone->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                        <a href="{{ route('telepon.edit', $phone->id) }}" class="bg-yellow-500 text-slate-700 dark:text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class=" mt-4 items-center justify-start">
        <a href="{{ route('telepon.create',$datasiswa->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600" >
            Tambah nomor telepon
        </a>

        <a href="{{ route('siswa.index') }}" class="w-10 h-8 px-4 py-2 text-slate-900 dark:text-white hover:text-white dark:hover:text-slate-500">Kembali</a>
        </div>
    </div>
</div>

@endsection