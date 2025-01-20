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
</body>
</html>