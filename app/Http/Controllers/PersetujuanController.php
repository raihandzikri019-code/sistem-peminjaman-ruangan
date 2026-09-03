<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    /**
     * Menampilkan daftar peminjaman untuk persetujuan.
     */
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'ruangan'])
            ->latest()
            ->get();

        return view('persetujuan.index', compact('peminjamans'));
    }

    /**
     * Menyetujui peminjaman.
     */
    public function setujui(Peminjaman $peminjaman)
    {
        $peminjaman->update([
            'status' => 'disetujui',
            'keterangan' => 'Peminjaman disetujui.',
        ]);

        return redirect()
            ->route('persetujuan.index')
            ->with('success', 'Peminjaman berhasil disetujui.');
    }

    /**
     * Menolak peminjaman.
     */
    public function tolak(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'keterangan' => 'required|string',
        ]);

        $peminjaman->update([
            'status' => 'ditolak',
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('persetujuan.index')
            ->with('success', 'Peminjaman berhasil ditolak.');
    }
}