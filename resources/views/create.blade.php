<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg">
        <h5 class="card-header">Tambah To-do</h5>
        <div class="card-body">
            <form action="/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tittle" class="form-label">Judul Tugas</label>
                    <input type="text" name="tittle" class="form-control" id="tittle" placeholder="Masukkan tugas..." required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
