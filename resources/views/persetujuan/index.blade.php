<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Persetujuan Peminjaman</title>

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

        .card {
            background: white;
            padding: 20px;

            border-radius: 10px;

            box-shadow:
                0 2px 8px rgba(0, 0, 0, 0.08);

            overflow-x: auto;
        }

        .alert {
            background: #d1fae5;
            color: #065f46;

            padding: 14px;

            border-radius: 7px;

            margin-bottom: 20px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;

            padding: 14px;

            border-radius: 7px;

            margin-bottom: 20px;
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
            gap: 6px;
            align-items: center;
        }

        .btn {
            display: inline-block;

            padding: 8px 12px;

            border: none;

            border-radius: 6px;

            color: white;

            text-decoration: none;

            cursor: pointer;

            font-size: 12px;
        }

        .btn-detail {
            background: #0891b2;
        }

        .btn-setujui {
            background: #16a34a;
        }

        .btn-tolak {
            background: #dc2626;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .tolak-form {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .tolak-form input {
            width: 180px;

            padding: 8px;

            border: 1px solid #ccc;

            border-radius: 6px;

            font-size: 12px;
        }

        .empty {
            text-align: center;

            padding: 30px;

            color: #777;
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

            <a href="{{ route('persetujuan.index') }}">
                Persetujuan
            </a>

        </div>

    </nav>


    <div class="container">

        <div class="header">

            <h1>
                Persetujuan Peminjaman
            </h1>

        </div>


        @if(session('success'))

            <div class="alert">
                {{ session('success') }}
            </div>

        @endif


        @if ($errors->any())

            <div class="error">

                <strong>
                    Terjadi kesalahan:
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

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

                                    <a
                                        href="{{ route('peminjaman.show', $peminjaman->id) }}"
                                        class="btn btn-detail"
                                    >
                                        Detail
                                    </a>


                                    @if($peminjaman->status === 'menunggu')

                                        <form
                                            action="{{ route('persetujuan.setujui', $peminjaman->id) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="btn btn-setujui"
                                                onclick="return confirm('Yakin ingin menyetujui peminjaman ini?')"
                                            >
                                                Setujui
                                            </button>

                                        </form>


                                        <form
                                            action="{{ route('persetujuan.tolak', $peminjaman->id) }}"
                                            method="POST"
                                            class="tolak-form"
                                        >

                                            @csrf

                                            @method('PATCH')

                                            <input
                                                type="text"
                                                name="keterangan"
                                                placeholder="Alasan penolakan"
                                                required
                                            >

                                            <button
                                                type="submit"
                                                class="btn btn-tolak"
                                                onclick="return confirm('Yakin ingin menolak peminjaman ini?')"
                                            >
                                                Tolak
                                            </button>

                                        </form>

                                    @else

                                        <span style="color: #777;">
                                            Sudah diproses
                                        </span>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="empty"
                            >
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