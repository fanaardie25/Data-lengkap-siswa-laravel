<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Detail Student</h3>
        </div>
        <div class="card-body">
            <!-- Menampilkan detail untuk satu student -->
            <h5 class="card-title"><strong>Nama:</strong> {{ $datasiswa->name }}</h5>
            <p class="card-text"><strong>NISN:</strong> {{ $datasiswa->nisn->nisn }} </p>

            <h5>Nomor Telepon:</h5>
            <ul class="list-group">
                @foreach ($datasiswa->telepon as $phone)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $phone->telepon }}</span>
                        <div class="d-flex gap-2">
                            <form action="{{ route('telepon.destroy', $phone->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <a href="{{ route('telepon.edit', $phone->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>            

            <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah nomor telepon</button>

            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Tambah No telepon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('telepon.store') }}" method="POST" id="createForm">
                                @csrf

                                <input type="hidden" name="siswa_id" value="{{ $datasiswa->id }}">

                                <div class="mb-3">
                                    <label for="nomor" class="form-label">No telepon</label>
                                    <input type="text" class="form-control" id="nomor" name="nomor" required value="">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  @if (@session('success'))
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: "success",
    title: "{{ session('success') }}"
    });
  @endif

  @if ($errors->any())
  @foreach ($errors->all() as $item)
      
  
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "{{ $item }}",
    });

    
  @endforeach
  @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
