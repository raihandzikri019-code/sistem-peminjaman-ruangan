<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Sistem Peminjaman Ruangan</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #222;
        }

        .navbar {
            height: 60px;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .brand {
            font-size: 18px;
            font-weight: bold;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-right a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .logout {
            background: #dc2626;
            border: none;
            color: white;
            padding: 8px 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            margin-bottom: 8px;
        }

        .welcome p {
            color: #666;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            text-align: center;
        }

        .card h3 {
            margin-top: 0;
            color: #2563eb;
        }

        .card p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 9px 15px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        @media (max-width: 800px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 500px) {
            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="brand">
        Sistem Peminjaman Ruangan
    </div>

    <div class="nav-right">

        <a href="{{ route('dashboard') }}">
            Dashboard
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

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout">
                Logout
            </button>
        </form>

    </div>

</nav>


<div class="container">

    <div class="welcome">

        <h1>
            Selamat Datang, {{ Auth::user()->name }} 👋
        </h1>

        <p>
            Kelola sistem peminjaman ruangan melalui dashboard.
        </p>

    </div>


    <div class="cards">

        <div class="card">

            <h3>Data Ruangan</h3>

            <p>
                Melihat dan mengelola data ruangan yang tersedia.
            </p>

            <a href="{{ route('ruangan.index') }}" class="btn">
                Lihat Ruangan
            </a>

        </div>


        <div class="card">

            <h3>Peminjaman</h3>

            <p>
                Mengajukan dan melihat data peminjaman ruangan.
            </p>

            <a href="{{ route('peminjaman.index') }}" class="btn">
                Lihat Peminjaman
            </a>

        </div>


        <div class="card">

            <h3>Persetujuan</h3>

            <p>
                Memproses pengajuan peminjaman ruangan.
            </p>

            <a href="{{ route('persetujuan.index') }}" class="btn">
                Kelola Persetujuan
            </a>

        </div>


        <div class="card">

            <h3>Laporan</h3>

            <p>
                Melihat laporan data peminjaman ruangan.
            </p>

            <a href="#" class="btn">
                Lihat Laporan
            </a>

        </div>

    </div>

</div>

</body>
</html>