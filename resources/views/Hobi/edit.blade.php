<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hobi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Hobi</h1>
        <form action="{{ route('hobi.update', $datahobi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_hobi" class="form-label">Nama Hobi</label>
                <input type="text" class="form-control" id="nama_hobi" name="name" value="{{ $datahobi->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('hobi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>