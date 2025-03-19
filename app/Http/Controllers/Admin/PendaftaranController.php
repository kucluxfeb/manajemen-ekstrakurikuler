<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    // Menampilkan halaman daftar pendaftaran (Admin)
    public function index()
    {
        $pendaftaran = Pendaftaran::with('siswa', 'eskul')->get();

        return view('pages.pendaftaran.index', compact('pendaftaran'));
    }

    public function indexSiswa()
    {
        $pendaftaran = Pendaftaran::with('siswa', 'eskul')->get();

        return view('pages.pendaftaran.siswa', compact('pendaftaran'));
    }

    // Menampilkan form pendaftaran (Siswa)
    public function create()
    {
        $eskuls = Eskul::all();
        return view('pages.pendaftaran.create', compact('eskuls'));
    }

    // Menyimpan pendaftaran baru
    public function store(Request $request)
    {
        $request->validate([
            'eskul_id' => 'required|exists:eskul,id',
        ]);

        // Mengambil ID siswa yang sedang login menggunakan guard 'siswa'
        $siswa = Auth::guard('siswa')->user();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Anda harus login sebagai siswa untuk mendaftar.');
        }

        $siswa_id = $siswa->id;
        $eskul_id = $request->eskul_id;

        // Cek apakah siswa sudah mendaftar ke eskul ini sebelumnya
        $existing = Pendaftaran::where('siswa_id', $siswa_id)
            ->where('eskul_id', $eskul_id)
            ->exists();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah mendaftar eskul ini!');
        }

        // Simpan pendaftaran ke database
        Pendaftaran::create([
            'siswa_id' => $siswa_id,
            'eskul_id' => $eskul_id,
            'status' => 'menunggu',
            'tanggal_pendaftaran' => now(),
        ]);

        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    // Menampilkan halaman konfirmasi pendaftaran (Admin)
    public function konfirmasi($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('pages.pendaftaran.konfirmasi', compact('pendaftaran'));
    }

    // Mengupdate status pendaftaran (Admin)
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update(['status' => $request->status]);

        return redirect()->route('admin.pendaftaran')->with('success', 'Status pendaftaran berhasil diperbarui!');
    }

    // Menampilkan daftar pendaftaran siswa sendiri
    public function myPendaftaran()
    {
        $siswa = Auth::guard('siswa')->user();

        if (!$siswa) {
            return redirect()->route('login')->with('error', 'Silakan login sebagai siswa untuk melihat pendaftaran Anda.');
        }

        $pendaftaran = Pendaftaran::where('siswa_id', $siswa->id)->with('eskul')->get();
        return view('pages.pendaftaran.siswa', compact('pendaftaran'));
    }
}