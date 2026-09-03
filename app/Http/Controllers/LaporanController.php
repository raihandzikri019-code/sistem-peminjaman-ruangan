<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('ruangan')
            ->orderBy('tanggal', 'desc')
            ->orderBy('jam_mulai', 'desc')
            ->get();

        $totalPeminjaman = $peminjamans->count();

        $menunggu = $peminjamans->where('status', 'menunggu')->count();

        $disetujui = $peminjamans->where('status', 'disetujui')->count();

        $ditolak = $peminjamans->where('status', 'ditolak')->count();

        return view('laporan.index', compact(
            'peminjamans',
            'totalPeminjaman',
            'menunggu',
            'disetujui',
            'ditolak'
        ));
    }
}