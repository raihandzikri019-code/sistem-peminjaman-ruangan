<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Peminjaman Ruangan</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #172033;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #2563eb;
            color: white;
            min-height: 66px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-menu a:hover {
            text-decoration: underline;
        }

        .logout-button {
            background: #dc2626;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout-button:hover {
            background: #b91c1c;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 35px auto;
        }

        /* =========================
           HEADER
        ========================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            margin: 0;
            font-size: 29px;
            color: #111827;
        }

        .page-description {
            margin: 7px 0 0;
            color: #6b7280;
            font-size: 15px;
        }

        .print-button {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 20px;
            font-size: 14px;
            cursor: pointer;
        }

        .print-button:hover {
            background: #1d4ed8;
        }

        /* =========================
           STATISTICS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        }

        .stat-title {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
        }

        /* =========================
           TABLE CARD
        ========================= */

        .table-card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        }

        .table-title {
            margin: 0 0 20px;
            font-size: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        thead th {
            background: #eff6ff;
            color: #173b83;
            font-size: 13px;
            text-align: left;
            padding: 13px;
            border-bottom: 1px solid #dbeafe;
        }

        tbody td {
            padding: 13px;
            font-size: 13px;
            border-bottom: 1px solid #e5e7eb;
            color: #1f2937;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .empty-data {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-menunggu {
            background: #fef3c7;
            color: #92400e;
        }

        .status-disetujui {
            background: #dcfce7;
            color: #166534;
        }

        .status-ditolak {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-default {
            background: #e5e7eb;
            color: #374151;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            color: #64748b;
            font-size: 13px;
            margin: 28px 0;
        }

        /* =========================
           PRINT
        ========================= */

        @media print {

            body {
                background: white;
            }

            .navbar {
                display: none;
            }

            .print-button {
                display: none;
            }

            .container {
                width: 100%;
                max-width: none;
                margin: 0;
            }

            .page-header {
                margin-bottom: 15px;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .table-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .footer {
                margin-top: 20px;
            }

            table {
                min-width: 0;
            }
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .nav-menu {
                flex-wrap: wrap;
                gap: 15px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        @media (max-width: 600px) {

            .container {
                width: 94%;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <div class="brand">
            Sistem Peminjaman Ruangan
        </div>

        <div class="nav-menu">

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

            <a href="{{ route('laporan.index') }}">
                Laporan
            </a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf

                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>

        </div>

    </nav>


    <!-- =========================
         CONTENT
    ========================= -->

    <main class="container">

        <!-- HEADER -->

        <div class="page-header">

            <div>
                <h1 class="page-title">
                    Laporan Peminjaman
                </h1>

                <p class="page-description">
                    Rekapitulasi data peminjaman ruangan
                </p>
            </div>

            <button
                type="button"
                class="print-button"
                onclick="window.print()">

                🖨 Cetak Laporan

            </button>

        </div>


        <!-- =========================
             STATISTIK
        ========================= -->

        <div class="stats">

            <!-- Total -->

            <div class="stat-card">

                <div class="stat-title">
                    Total Peminjaman
                </div>

                <div class="stat-number">
                    {{ $totalPeminjaman }}
                </div>

            </div>


            <!-- Menunggu -->

            <div class="stat-card">

                <div class="stat-title">
                    Menunggu
                </div>

                <div class="stat-number">
                    {{ $menunggu }}
                </div>

            </div>


            <!-- Disetujui -->

            <div class="stat-card">

                <div class="stat-title">
                    Disetujui
                </div>

                <div class="stat-number">
                    {{ $disetujui }}
                </div>

            </div>


            <!-- Ditolak -->

            <div class="stat-card">

                <div class="stat-title">
                    Ditolak
                </div>

                <div class="stat-number">
                    {{ $ditolak }}
                </div>

            </div>

        </div>


        <!-- =========================
             DATA PEMINJAMAN
        ========================= -->

        <div class="table-card">

            <h2 class="table-title">
                Data Peminjaman
            </h2>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Peminjam</th>

                            <th>Ruangan</th>

                            <th>Tanggal</th>

                            <th>Jam Mulai</th>

                            <th>Jam Selesai</th>

                            <th>Keperluan</th>

                            <th>Status</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($peminjamans as $index => $peminjaman)

                            <tr>

                                <!-- Nomor -->

                                <td>
                                    {{ $index + 1 }}
                                </td>


                                <!-- Peminjam -->

                                <td>
                                    {{ $peminjaman->peminjam ?? 'Admin' }}
                                </td>


                                <!-- Ruangan -->

                                <td>
                                    {{ $peminjaman->ruangan->nama ?? '-' }}
                                </td>


                                <!-- Tanggal -->

                                <td>
                                    {{ $peminjaman->tanggal ?? '-' }}
                                </td>


                                <!-- Jam Mulai -->

                                <td>
                                    {{ $peminjaman->jam_mulai ?? '-' }}
                                </td>


                                <!-- Jam Selesai -->

                                <td>
                                    {{ $peminjaman->jam_selesai ?? '-' }}
                                </td>


                                <!-- Keperluan -->

                                <td>
                                    {{ $peminjaman->keperluan ?? '-' }}
                                </td>


                                <!-- Status -->

                                <td>

                                    @php
                                        $status = strtolower($peminjaman->status ?? '');
                                    @endphp


                                    @if ($status === 'menunggu')

                                        <span class="status status-menunggu">
                                            Menunggu
                                        </span>

                                    @elseif ($status === 'disetujui')

                                        <span class="status status-disetujui">
                                            Disetujui
                                        </span>

                                    @elseif ($status === 'ditolak')

                                        <span class="status status-ditolak">
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="status status-default">
                                            {{ $peminjaman->status ?? '-' }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="empty-data">

                                    Belum ada data peminjaman.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- FOOTER -->

        <div class="footer">
            Sistem Peminjaman Ruangan
        </div>

    </main>

</body>

</html>