@extends('layouts.main')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Card Form Absensi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Absensi</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="eskul_id" class="form-label">Ekstrakurikuler</label>
                    <select name="eskul_id" id="eskul_id" class="form-control @error('eskul_id') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Ekstrakurikuler</option>
                        @foreach ($eskuls as $eskul)
                            <option value="{{ $eskul->id }}">{{ $eskul->nama_eskul }}</option>
                        @endforeach
                    </select>
                    @error('eskul_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_absen" class="form-label">Tanggal Absen</label>
                    <input type="date" name="tanggal_absen" id="tanggal_absen" class="form-control @error('tanggal_absen') is-invalid @enderror" required>
                    @error('tanggal_absen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3"></textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="/" class="btn btn-outline-secondary mr-3">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection