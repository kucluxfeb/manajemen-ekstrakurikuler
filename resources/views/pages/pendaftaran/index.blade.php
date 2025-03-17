@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Daftar Pendaftaran Ekstrakurikuler</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Ekstrakurikuler</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftaran as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->siswa->nama_lengkap }}</td>
                <td>{{ $data->eskul->nama_eskul }}</td>
                <td>
                    @if($data->status == 'menunggu')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($data->status == 'diterima')
                        <span class="badge bg-success">Diterima</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
                <td>
                    @if(Auth::guard('admin')->check() && $data->status == 'menunggu')
                        <a href="{{ route('admin.pendaftaran.konfirmasi', $data->id) }}" class="btn btn-primary">Konfirmasi</a>
                    @else
                        <span class="text-muted">Sudah di Konfirmasi</span>
                    @endif
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection