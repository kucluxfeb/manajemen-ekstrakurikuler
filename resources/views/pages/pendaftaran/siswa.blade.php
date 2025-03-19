@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Daftar Pendaftaran Ekstrakurikuler</h3>

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
                            <th>Status</th>
                            <th>Keterangan</th>
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
                                @if($data->status == 'menunggu')
                                    <span>Menunggu Konfirmasi</span>
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