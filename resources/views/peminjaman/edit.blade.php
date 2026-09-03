<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Peminjaman - Sistem Peminjaman Ruangan</title>

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

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;

            border: 1px solid #ccc;
            border-radius: 6px;

            font-size: 14px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .buttons {
            margin-top: 25px;
        }

        .btn {
            display: inline-block;

            padding: 10px 18px;

            border: none;
            border-radius: 6px;

            cursor: pointer;

            color: white;
            text-decoration: none;

            font-size: 14px;
        }

        .btn-simpan {
            background: #2563eb;
        }

        .btn-kembali {
            background: #64748b;
            margin-left: 8px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;

            padding: 12px;

            border-radius: 6px;

            margin-bottom: 20px;
        }

        .info {
            background: #eff6ff;
            color: #1e40af;

            padding: 12px;

            border-radius: 6px;

            margin-bottom: 20px;
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
                Edit Peminjaman
            </h1>


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


            <div class="info">

                Silakan ubah data peminjaman yang diperlukan.

            </div>


            <form
                action="{{ route('peminjaman.update', $peminjaman->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <!-- PEMINJAM -->

                <div class="form-group">

                    <label for="user_id">
                        Peminjam
                    </label>

                    <select
                        name="user_id"
                        id="user_id"
                        required
                    >

                        @foreach ($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ old('user_id', $peminjaman->user_id) == $user->id ? 'selected' : '' }}
                            >

                                {{ $user->name }}
                                - {{ $user->email }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- RUANGAN -->

                <div class="form-group">

                    <label for="ruangan_id">
                        Ruangan
                    </label>

                    <select
                        name="ruangan_id"
                        id="ruangan_id"
                        required
                    >

                        @foreach ($ruangans as $ruangan)

                            <option
                                value="{{ $ruangan->id }}"
                                {{ old('ruangan_id', $peminjaman->ruangan_id) == $ruangan->id ? 'selected' : '' }}
                            >

                                {{ $ruangan->nama_ruangan }}
                                - Kapasitas {{ $ruangan->kapasitas }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- TANGGAL -->

                <div class="form-group">

                    <label for="tanggal">
                        Tanggal Peminjaman
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        id="tanggal"
                        value="{{ old('tanggal', $peminjaman->tanggal) }}"
                        required
                    >

                </div>


                <!-- JAM MULAI -->

                <div class="form-group">

                    <label for="jam_mulai">
                        Jam Mulai
                    </label>

                    <input
                        type="time"
                        name="jam_mulai"
                        id="jam_mulai"
                        value="{{ old('jam_mulai', $peminjaman->jam_mulai) }}"
                        required
                    >

                </div>


                <!-- JAM SELESAI -->

                <div class="form-group">

                    <label for="jam_selesai">
                        Jam Selesai
                    </label>

                    <input
                        type="time"
                        name="jam_selesai"
                        id="jam_selesai"
                        value="{{ old('jam_selesai', $peminjaman->jam_selesai) }}"
                        required
                    >

                </div>


                <!-- KEPERLUAN -->

                <div class="form-group">

                    <label for="keperluan">
                        Keperluan
                    </label>

                    <textarea
                        name="keperluan"
                        id="keperluan"
                        required
                    >{{ old('keperluan', $peminjaman->keperluan) }}</textarea>

                </div>


                <!-- STATUS -->

                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        name="status"
                        id="status"
                        required
                    >

                        <option
                            value="menunggu"
                            {{ old('status', $peminjaman->status) == 'menunggu' ? 'selected' : '' }}
                        >
                            Menunggu
                        </option>

                        <option
                            value="disetujui"
                            {{ old('status', $peminjaman->status) == 'disetujui' ? 'selected' : '' }}
                        >
                            Disetujui
                        </option>

                        <option
                            value="ditolak"
                            {{ old('status', $peminjaman->status) == 'ditolak' ? 'selected' : '' }}
                        >
                            Ditolak
                        </option>

                    </select>

                </div>


                <!-- KETERANGAN -->

                <div class="form-group">

                    <label for="keterangan">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        id="keterangan"
                        placeholder="Contoh: Disetujui oleh admin"
                    >{{ old('keterangan', $peminjaman->keterangan) }}</textarea>

                </div>


                <!-- BUTTON -->

                <div class="buttons">

                    <button
                        type="submit"
                        class="btn btn-simpan"
                    >
                        Simpan Perubahan
                    </button>


                    <a
                        href="{{ route('peminjaman.index') }}"
                        class="btn btn-kembali"
                    >
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>