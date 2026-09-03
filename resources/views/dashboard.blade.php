<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Peminjaman Ruangan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: #2563eb;
            color: white;
            padding: 18px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar a,
        .logout-btn {
            color: white;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .welcome {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .welcome h1 {
            margin-bottom: 8px;
            color: #1e3a8a;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .card h3 {
            color: #666;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .card .number {
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
        }

        .menu {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .menu h2 {
            margin-bottom: 20px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .menu-item {
            display: block;
            padding: 20px;
            background: #eff6ff;
            color: #1d4ed8;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            text-align: center;
            transition: .2s;
        }

        .menu-item:hover {
            background: #dbeafe;
            transform: translateY(-2px);
        }

        .logout-form {
            display: inline;
        }

        @media (max-width: 800px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px;
            }

            .navbar h2 {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h2>Sistem Peminjaman Ruangan</h2>

        <div class="navbar-right">
            <a href="{{ url('/dashboard') }}">Dashboard</a>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container">

        <div class="welcome">
            <h1>Dashboard</h1>

            @auth
                <p>
                    Selamat datang,
                    <strong>{{ auth()->user()->name }}</strong>!
                </p>
            @else
                <p>Selamat datang di Sistem Peminjaman Ruangan.</p>
            @endauth
        </div>

        <div class="cards">

            <div class="card">
                <h3>Total Peminjaman</h3>
                <div class="number">
                    {{ \App\Models\Peminjaman::count() }}
                </div>
            </div>

            <div class="card">
                <h3>Menunggu Persetujuan</h3>
                <div class="number">
                    {{ \App\Models\Peminjaman::where('status', 'menunggu')->count() }}
                </div>
            </div>

            <div class="card">
                <h3>Disetujui</h3>
                <div class="number">
                    {{ \App\Models\Peminjaman::where('status', 'disetujui')->count() }}
                </div>
            </div>

            <div class="card">
                <h3>Total Ruangan</h3>
                <div class="number">
                    {{ \App\Models\Ruangan::count() }}
                </div>
            </div>

        </div>

        <div class="menu">

            <h2>Menu Sistem</h2>

            <div class="menu-grid">

                <a href="{{ route('peminjaman.index') }}" class="menu-item">
                    📋 Data Peminjaman
                </a>

                <a href="{{ route('peminjaman.create') }}" class="menu-item">
                    ➕ Ajukan Peminjaman
                </a>

                <a href="{{ route('ruangan.index') }}" class="menu-item">
                    🏢 Data Ruangan
                </a>

                <a href="{{ route('persetujuan.index') }}" class="menu-item">
                    ✅ Persetujuan
                </a>

                <a href="{{ route('laporan.index') }}" class="menu-item">
                    📊 Laporan
                </a>

                <a href="{{ url('/dashboard') }}" class="menu-item">
                    🏠 Dashboard
                </a>

            </div>

        </div>

    </div>

</body>
</html>