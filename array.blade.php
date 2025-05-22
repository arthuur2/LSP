<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-do List - Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg">
        <h5 class="card-header text-black">To-do List</h5>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Tambah To-do Baru</h5>
                <a href="/create" class="btn btn-secondary">+ Tambah Baru</a>
            </div>

            <h6 class="card-subtitle mb-2 text-muted">Daftar Tugas</h6>

            @forelse ($tasks as $task)
                <div class="d-flex justify-content-between align-items-center border p-2 mb-2 rounded">
                    <div class="form-check d-flex align-items-center gap-2">
                        <form action="/update/{{ $task['id'] }}" method="POST" id="checkbox-form-{{ $task['id'] }}">
                            @csrf
                            <input type="checkbox"
                                name="status"
                                class="form-check-input {{ $task['status'] === 'selesai' ? 'bg-success border-success' : '' }}"
                                onchange="document.getElementById('checkbox-form-{{ $task['id'] }}').submit();"
                                {{ $task['status'] === 'selesai' ? 'checked' : '' }}>
                        </form>

                        <div>
                            <label class="form-check-label fw-bold">
                                {{ $task['tittle'] }}
                            </label><br>
                            <small>Status: 
                                <span class="{{ $task['status'] === 'selesai' ? 'text-success' : 'text-warning' }}">
                                    {{ ucfirst($task['status']) }}
                                </span>
                            </small>
                        </div>
                    </div>

                    <form action="/delete/{{ $task['id'] }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            @empty
                <p class="text-muted">Belum ada tugas.</p>
            @endforelse
        </div>
    </div>
</div>

</body>
</html>
