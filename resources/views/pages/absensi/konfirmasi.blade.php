@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <form action="{{ route('admin.absensi.update', $absensi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Absensi</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" id="nama_siswa" class="form-control" value="{{ $absensi->siswa->nama }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="nama_eskul" class="form-label">Ekstrakurikuler</label>
                    <input type="text" id="nama_eskul" class="form-control" value="{{ $absensi->eskul->nama_eskul }}" readonly>
                </div>

                <div class="form-group">
                    <label for="tanggal_absen" class="form-label">Tanggal Absen</label>
                    <input type="text" id="tanggal_absen" class="form-control" value="{{ $absensi->tanggal_absen }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpa">Alpa</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.absensi.index') }}" class="btn btn-outline-secondary mr-3">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection