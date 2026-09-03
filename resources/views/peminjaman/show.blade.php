<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Peminjaman - Sistem Peminjaman Ruangan</title>

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
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;

            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
            color: #222;
        }

        .data {
            border-bottom: 1px solid #eee;
            padding: 14px 0;

            display: flex;
        }

        .label {
            width: 180px;
            font-weight: bold;
            color: #555;
        }

        .value {
            flex: 1;
            color: #222;
        }

        .status {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 20px;

            font-size: 13px;
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

        .buttons {
            margin-top: 25px;
        }

        .btn {
            display: inline-block;

            padding: 10px 18px;

            border-radius: 6px;

            text-decoration: none;

            color: white;

            font-size: 14px;
        }

        .btn-kembali {
            background: #64748b;
        }

        .btn-edit {
            background: #f59e0b;
            margin-left: 8px;
        }

    </style>

</head>

<body>

    <nav class="navbar">

        <h2>
            Sistem Peminjaman Ruangan
        </h2>

        <div>

            <a href="{{ url('/') }}">
                Beranda
            </a>

            <a href="{{ route('ruangan.index') }}">
                Ruangan
            </a>

            <a href="{{ route('peminjaman.index') }}">
                Peminjaman
            </a>

        </div>

    </nav>


    <div class="container">

        <div class="card">

            <h1>
                Detail Peminjaman
            </h1>


            <div class="data">

                <div class="label">
                    Peminjam
                </div>

                <div class="value">
                    {{ $peminjaman->user->name ?? '-' }}
                </div>

            </div>


            <div class="data">

                <div class="label">
                    Email
                </div>

                <div class="value">
                    {{ $peminjaman->user->email ?? '-' }}
                </div>

            </div>


            <div class="data">

                <div class="label">
                    Ruangan
                </div>

                <div class="value">
                    {{ $peminjaman->ruangan->nama_ruangan ?? '-' }}
                </div>

            </div>


            <div class="data">

                <div class="label">
                    Lokasi
                </div>

                <div class="value">
                    {{ $peminjaman->ruangan->lokasi ?? '-' }}
                </div>

            </div>


            <div class="data">

                <div class="label">
                    Kapasitas
                </div>

                <div class="value">
                    {{ $peminjaman->ruangan->kapasitas ?? '-' }}
                </div>

            </div>


            <div class="data">

                <div class="label">
                    Tanggal
                </div>

                <div class="value">
                    {{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('d-m-Y') }}
                </div>

            </div>


            <div class="data">

                <div class="label">
                    Jam
                </div>

                <div class="value">
                    {{ $peminjaman->jam_mulai }}
                    -
                    {{ $peminjaman->jam_selesai }}
                </div>

            </div>


            <div class="data">

                <div class="label">
                    Keperluan
                </div>

                <div class="value">
                    {{ $peminjaman->keperluan }}
                </div>

            </div>


            <div class="data">

                <div class="label">
                    Status
                </div>

                <div class="value">

                    <span class="status {{ $peminjaman->status }}">
                        {{ ucfirst($peminjaman->status) }}
                    </span>

                </div>

            </div>


            <div class="data">

                <div class="label">
                    Keterangan
                </div>

                <div class="value">
                    {{ $peminjaman->keterangan ?? '-' }}
                </div>

            </div>


            <div class="buttons">

                <a
                    href="{{ route('peminjaman.index') }}"
                    class="btn btn-kembali"
                >
                    Kembali
                </a>

                <a
                    href="{{ route('peminjaman.edit', $peminjaman->id) }}"
                    class="btn btn-edit"
                >
                    Edit
                </a>

            </div>

        </div>

    </div>

</body>

</html>