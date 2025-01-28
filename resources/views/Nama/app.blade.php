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
            <div class="flex justify-end">
                <button data-bs-toggle="modal" data-bs-target="#basic_modal"
                    class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Tambah siswa</button>
            </div>
        </header>
        <div class="card-body px-6 pb-6">
            {{-- modal --}}
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                id="basic_modal" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true" role="dialog">
                <div class="modal-dialog relative w-auto pointer-events-none">
                    <div
                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                    Tambah Data Siswa
                                </h3>
                                <button type="button"
                                    class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                                    data-bs-dismiss="modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Submit</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-4">
                                <div class="input-area">
                                    <form action="{{ route('siswa.store') }}" method="POST" id="createForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" required
                                                value="{{ old('name') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nisn" class="form-label">Nisn</label>
                                            <input type="text" class="form-control" id="nisn" name="nisn" required
                                                value="{{ old('nisn') }}">
                                        </div>
                                        <div id="input-container">
                                            <label for="telepon" class="form-label mr-2">Telepon</label>
                                            <div class="mb-3 flex items-center">
                                                <input type="number" class="form-control flex-1" id="telepon" name="nomor[]" required>
                                                <button type="button" class="btn btn-success ml-2" id="add-input">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>                                        
                                        <div class="mb-3">
                                            <label for="nama_hobi" class="form-label text-md">Hobi</label>
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
            </div>
            {{-- end modal --}}
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
                                                <a href="{{ route('siswa.show', $siswa->id) }}" class="action-btn"
                                                    type="button">
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
    <script>
        document.getElementById('add-input').addEventListener('click', function () {
            // Buat elemen baru untuk input
            const container = document.createElement('div');
            container.classList.add('mb-3', 'flex', 'items-center');
    
            // Tambahkan elemen input baru
            const newInput = `
                <input type="number" class="form-control flex-1" name="nomor[]" required>
                <button type="button" class="btn btn-danger ml-2 remove-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                    </svg>
                </button>
            `;
    
            container.innerHTML = newInput;
    
            // Tambahkan elemen baru ke dalam container utama
            document.getElementById('input-container').appendChild(container);
    
            // Tambahkan event listener untuk tombol hapus
            container.querySelector('.remove-input').addEventListener('click', function () {
                container.remove();
            });
        });
    </script>
    
@endsection
