<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Menampilkan daftar peminjaman.
     */
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'ruangan'])
            ->latest()
            ->get();

        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Menampilkan form pengajuan peminjaman.
     */
    public function create()
    {
        $ruangans = Ruangan::where('status', 'tersedia')
            ->orderBy('nama_ruangan')
            ->get();

        $users = User::orderBy('name')->get();

        return view('peminjaman.create', compact('ruangans', 'users'));
    }

    /**
     * Menyimpan pengajuan peminjaman.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keperluan' => 'required',
        ]);

        Peminjaman::create([
            'user_id' => $request->user_id,
            'ruangan_id' => $request->ruangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keperluan' => $request->keperluan,
            'status' => 'menunggu',
            'keterangan' => null,
        ]);

        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim.');
    }

    /**
     * Menampilkan detail peminjaman.
     */
    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load(['user', 'ruangan']);

        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Menampilkan form edit peminjaman.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $ruangans = Ruangan::where('status', 'tersedia')
            ->orderBy('nama_ruangan')
            ->get();

        $users = User::orderBy('name')->get();

        return view('peminjaman.edit', compact(
            'peminjaman',
            'ruangans',
            'users'
        ));
    }

    /**
     * Memperbarui peminjaman.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keperluan' => 'required',
            'status' => 'required|in:menunggu,disetujui,ditolak',
            'keterangan' => 'nullable',
        ]);

        $peminjaman->update([
            'user_id' => $request->user_id,
            'ruangan_id' => $request->ruangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keperluan' => $request->keperluan,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Menghapus peminjaman.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}