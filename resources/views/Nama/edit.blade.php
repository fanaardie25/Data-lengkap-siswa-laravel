<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
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
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
        </form>
        
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
</body>
</html>