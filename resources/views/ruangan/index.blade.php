<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Ruangan</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            color: #222;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-tambah {
            background: #2563eb;
        }

        .btn-edit {
            background: #f59e0b;
        }

        .btn-hapus {
            background: #dc2626;
        }

        .alert {
            background: #d1fae5;
            color: #065f46;
            padding: 14px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 13px;
        }

        .tersedia {
            background: #dcfce7;
            color: #166534;
        }

        .tidak-tersedia {
            background: #fee2e2;
            color: #991b1b;
        }

        .aksi {
            display: flex;
            gap: 5px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <h2>Sistem Peminjaman Ruangan</h2>

    <div>
        <a href="{{ url('/') }}">Beranda</a>
        <a href="{{ route('ruangan.index') }}">Ruangan</a>
    </div>
</nav>

<div class="container">

    <div class="header">
        <h1>Data Ruangan</h1>

        <a href="{{ route('ruangan.create') }}"
           class="btn btn-tambah">
            + Tambah Ruangan
        </a>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Lokasi</th>
                    <th>Kapasitas</th>
                    <th>Fasilitas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($ruangans as $ruangan)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $ruangan->nama_ruangan }}
                        </td>

                        <td>
                            {{ $ruangan->lokasi }}
                        </td>

                        <td>
                            {{ $ruangan->kapasitas }} orang
                        </td>

                        <td>
                            {{ $ruangan->fasilitas ?? '-' }}
                        </td>

                        <td>
                            <span class="status {{ $ruangan->status }}">
                                {{ ucfirst(str_replace('_', ' ', $ruangan->status)) }}
                            </span>
                        </td>

                        <td>

                            <div class="aksi">

                                <a href="{{ route('ruangan.edit', $ruangan->id) }}"
                                   class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('ruangan.destroy', $ruangan->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus ruangan ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-hapus">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="empty">
                            Belum ada data ruangan.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>