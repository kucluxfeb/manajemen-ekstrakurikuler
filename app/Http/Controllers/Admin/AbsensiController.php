<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function create()
    {
        $siswa = Auth::guard('siswa')->user();
        $eskuls = $siswa->eskul;

        return view('pages.absensi.create', compact('eskuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'eskul_id' => 'required|exists:eskul,id',
            'tanggal_absen' => 'required|date',
            'status' => 'required|in:hadir,izin,sakit,alpa',
            'keterangan' => 'nullable|string'
        ]);

        Absensi::create([
            'siswa_id' => Auth::guard('siswa')->user()->id,
            'eskul_id' => $request->eskul_id,
            'tanggal_absen' => $request->tanggal_absen,
            'status' => 'menunggu',
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('absensi.create')->with('success', 'Absensi berhasil dikirim, meunggu konfirmasi!');
    }

    public function index()
    {
        $absensi = Absensi::with('siswa', 'eskul')->orderByRaw('FIELD(status, "menunggu", "hadir", "izin", "sakit", "alpa")')->get();

        return view('pages.absensi.index', compact('absensi'));
    }

    public function konfirmasi($id, $status)
    {
        $absensi = Absensi::findOrFail($id);

        if (!in_array($status, ['hadir', 'izin', 'sakit', 'alpa'])) {
            return back()->with('error','status tidak valid');
        }

        $absensi->update(['status' => $status]);

        return back()->with('success', 'Absensi berhasil dikonfirmasi');
    }

    public function showKonfrimasi($id)
    {
        $absensi = Absensi::with('siswa', 'eskul')->findOrFail($id);

        return view('pages.absensi.konfirmasi', compact('absensi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alpa',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update(['status' => $request->status]);

        return redirect()->route('admin.absensi.index')->with('success', 'Absensi berhasil diupdate');
    }

    public function myAbsensi()
    {
        $siswa = Auth::guard('siswa')->user();

        $absensi = Absensi::where('siswa_id', $siswa->id)->with('eskul')->get();

        return view('pages.absensi.siswa', compact('absensi'));
    }
}