<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tabel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    
    <h3>Daftar Pendaftar (Approved)</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>eskul</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eskul->pendaftaranEskul as $pendaftaran)
            <tr>
                <td>{{ $pendaftaran->pendaftaran->nama_murid ?? 'Tidak ada data' }}</td>
                <td>{{ $eskul->nama_eskul }}</td>
                <td>{{ $pendaftaran->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    

    <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
