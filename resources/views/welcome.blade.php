<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Ruangan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            min-height: 100vh;
        }

        .navbar {
            background: #2563eb;
            color: white;
            padding: 18px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 22px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background: white;
            color: #2563eb;
            padding: 9px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
        }

        .hero h1 {
            font-size: 42px;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .hero p {
            color: #64748b;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 13px 25px;
            border-radius: 7px;
            font-weight: bold;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 25px;
            padding: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 250px;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .card h3 {
            color: #1e293b;
            margin-bottom: 10px;
        }

        .card p {
            color: #64748b;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Sistem Peminjaman Ruangan</h2>

        <a href="#">Login</a>
    </div>

    <section class="hero">
        <h1>Selamat Datang</h1>

        <p>
            Sistem Informasi Peminjaman Ruangan
        </p>

        <a href="#" class="btn">
            Ajukan Peminjaman
        </a>
    </section>

    <section class="features">

        <div class="card">
            <h3>Data Ruangan</h3>
            <p>
                Melihat informasi ruangan yang tersedia
                untuk digunakan.
            </p>
        </div>

        <div class="card">
            <h3>Peminjaman</h3>
            <p>
                Mengajukan peminjaman ruangan
                secara online.
            </p>
        </div>

        <div class="card">
            <h3>Persetujuan</h3>
            <p>
                Pengajuan peminjaman dapat diproses
                oleh admin.
            </p>
        </div>

        <div class="card">
            <h3>Laporan</h3>
            <p>
                Melihat dan mencetak laporan
                peminjaman ruangan.
            </p>
        </div>

    </section>

</body>
</html>