<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Ruangan</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .navbar {
            background: #2563eb;
            color: white;
            padding: 18px 40px;
        }

        .navbar h2 {
            margin: 0;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .btn {
            padding: 11px 18px;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-simpan {
            background: #2563eb;
        }

        .btn-kembali {
            background: #6b7280;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <h2>Sistem Peminjaman Ruangan</h2>
</nav>

<div class="container">

    <div class="card">

        <h1>Tambah Ruangan</h1>

        @if($errors->any())

            <div class="error">

                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        <form action="{{ route('ruangan.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label>Nama Ruangan</label>

                <input
                    type="text"
                    name="nama_ruangan"
                    value="{{ old('nama_ruangan') }}"
                    placeholder="Contoh: Lab Komputer"
                    required
                >

            </div>

            <div class="form-group">

                <label>Lokasi</label>

                <input
                    type="text"
                    name="lokasi"
                    value="{{ old('lokasi') }}"
                    placeholder="Contoh: Gedung A Lantai 2"
                    required
                >

            </div>

            <div class="form-group">

                <label>Kapasitas</label>

                <input
                    type="number"
                    name="kapasitas"
                    value="{{ old('kapasitas') }}"
                    placeholder="Contoh: 30"
                    min="1"
                    required
                >

            </div>

            <div class="form-group">

                <label>Fasilitas</label>

                <textarea
                    name="fasilitas"
                    placeholder="Contoh: AC, Proyektor, Meja, Kursi"
                >{{ old('fasilitas') }}</textarea>

            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status" required>

                    <option value="tersedia">
                        Tersedia
                    </option>

                    <option value="tidak_tersedia">
                        Tidak Tersedia
                    </option>

                </select>

            </div>

            <button type="submit" class="btn btn-simpan">
                Simpan Ruangan
            </button>

            <a href="{{ route('ruangan.index') }}"
               class="btn btn-kembali">
                Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>