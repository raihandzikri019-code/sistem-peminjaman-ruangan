<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajukan Peminjaman - Sistem Peminjaman Ruangan</title>

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

            box-shadow:
                0 2px 8px rgba(0, 0, 0, 0.08);
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
            color: #222;
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

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
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

        .btn-simpan:hover {
            background: #1d4ed8;
        }

        .btn-kembali {
            background: #64748b;
            margin-left: 8px;
        }

        .btn-kembali:hover {
            background: #475569;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;

            padding: 12px;

            border-radius: 6px;

            margin-bottom: 20px;
        }

        .error ul {
            margin-bottom: 0;
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
                Ajukan Peminjaman Ruangan
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

                Silakan isi data peminjaman ruangan dengan lengkap.

            </div>


            <form
                action="{{ route('peminjaman.store') }}"
                method="POST"
            >

                @csrf


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

                        <option value="">
                            -- Pilih Peminjam --
                        </option>

                        @foreach ($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}
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

                        <option value="">
                            -- Pilih Ruangan --
                        </option>

                        @foreach ($ruangans as $ruangan)

                            <option
                                value="{{ $ruangan->id }}"
                                {{ old('ruangan_id') == $ruangan->id ? 'selected' : '' }}
                            >

                                {{ $ruangan->nama_ruangan }}

                                - Kapasitas
                                {{ $ruangan->kapasitas }}

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
                        value="{{ old('tanggal') }}"
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
                        value="{{ old('jam_mulai') }}"
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
                        value="{{ old('jam_selesai') }}"
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
                        placeholder="Contoh: Kegiatan praktikum mahasiswa"
                        required
                    >{{ old('keperluan') }}</textarea>

                </div>


                <!-- BUTTON -->

                <div class="buttons">

                    <button
                        type="submit"
                        class="btn btn-simpan"
                    >
                        Ajukan Peminjaman
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