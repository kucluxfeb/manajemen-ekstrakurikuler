@extends('layouts.main')

@section('content')
<div class="container">
    <h3>Konfirmasi Pendaftaran</h3>

    <p><strong>Nama Siswa:</strong> {{ $pendaftaran->siswa->nama }}</p>
    <p><strong>Ekstrakurikuler:</strong> {{ $pendaftaran->eskul->nama_eskul }}</p>

    <form action="{{ route('admin.pendaftaran.update', $pendaftaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Status:</label>
        <select name="status" class="form-control">
            <option value="diterima">Diterima</option>
            <option value="ditolak">Ditolak</option>
        </select>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('admin.pendaftaran') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection