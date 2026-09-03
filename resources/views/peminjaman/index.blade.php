<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Peminjaman - Sistem Peminjaman Ruangan</title>

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
            padding: 9px 14px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-tambah {
            background: #2563eb;
        }

        .btn-detail {
            background: #0891b2;
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
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background: #f1f5f9;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .menunggu {
            background: #fef3c7;
            color: #92400e;
        }

        .disetujui {
            background: #dcfce7;
            color: #166534;
        }

        .ditolak {
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
        <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
    </div>

</nav>

<div class="container">

    <div class="header">

        <h1>Data Peminjaman</h1>

        <a href="{{ route('peminjaman.create') }}"
           class="btn btn-tambah">
            + Ajukan Peminjaman
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
                    <th>Peminjam</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($peminjamans as $peminjaman)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $peminjaman->user->name ?? '-' }}
                        </td>

                        <td>
                            {{ $peminjaman->ruangan->nama_ruangan ?? '-' }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $peminjaman->jam_mulai }}
                            -
                            {{ $peminjaman->jam_selesai }}
                        </td>

                        <td>
                            {{ $peminjaman->keperluan }}
                        </td>

                        <td>

                            <span class="status {{ $peminjaman->status }}">
                                {{ ucfirst($peminjaman->status) }}
                            </span>

                        </td>

                        <td>

                            <div class="aksi">

                                <a href="{{ route('peminjaman.show', $peminjaman->id) }}"
                                   class="btn btn-detail">
                                    Detail
                                </a>

                                <a href="{{ route('peminjaman.edit', $peminjaman->id) }}"
                                   class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data peminjaman ini?')">

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

                        <td colspan="8" class="empty">
                            Belum ada data peminjaman.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>