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
    </ul>
    <div class="card mt-5">
        <header class=" card-header noborder">
            <h4 class="card-title">Data Siswa
            </h4>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="flex justify-end">
                <a href="{{ route('siswa.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Tambah
                    Siswa</a>
            </div>
            <div class="overflow-x-auto -mx-6 dashcode-data-table">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                            <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>

                                    <th scope="col" class=" table-th ">
                                        Id
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        nama
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        nisn
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        hobi
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($datasiswa as $siswa)
                                    <tr>
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td ">{{ $siswa->name }}</td>
                                        <td class="table-td ">{{ $siswa->nisn->nisn }}</td>
                                        <td class="table-td ">
                                            @foreach ($siswa->hobi as $hobi)
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-sm font-medium bg-blue-900 text-blue-600">
                                                    {{ $hobi->name }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a href="{{ route('siswa.show',$siswa->id) }}" class="action-btn" type="button">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                  </a>
                                                <a href="{{ route('siswa.edit', $siswa->id) }}" class="action-btn"
                                                    type="button">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </a>
                                                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn" type="button">
                                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
