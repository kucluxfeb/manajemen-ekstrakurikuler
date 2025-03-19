@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h3 class="mb-4">Daftar Absensi Siswa</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Ekstrakurikuler</th>
                            <th>Tanggal Absen</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensi as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->siswa->nama }}</td>
                            <td>{{ $data->eskul->nama_eskul }}</td>
                            <td>{{ $data->tanggal_absen }}</td>
                            <td>
                                @if($data->status == 'menunggu')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($data->status == 'hadir')
                                    <span class="badge bg-success">Hadir</span>
                                @elseif($data->status == 'izin')
                                    <span class="badge bg-primary">Izin</span>
                                @elseif($data->status == 'sakit')
                                    <span class="badge bg-info">Sakit</span>
                                @else
                                    <span class="badge bg-danger">Alpa</span>
                                @endif
                            </td>
                            <td>
                                @if(Auth::guard('admin')->check() && $data->status == 'menunggu')
                                    <a href="{{ route('admin.absensi.konfirmasi', $data->id) }}" class="btn btn-primary btn-sm">Konfirmasi</a>
                                @else
                                    <span class="text-muted">Sudah dikonfirmasi</span>
                                @endif
                            </td>                
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection