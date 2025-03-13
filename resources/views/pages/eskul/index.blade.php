@extends('layouts.main')

@section('content')

<div class="container-fluid">
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Eskul</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="eskul/createForm" class="btn btn-primary mb-3">Tambah Eskul</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Eskul</th>
                            <th>Guru Eskul</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Tempat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eskuls as $eskul)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $eskul->nama_eskul }}</td>
                            <td>{{ $eskul->admin->nama_lengkap }}</td>
                            <td>{{ $eskul->hari }}</td>
                            <td>{{ $eskul->jam_mulai }}</td>
                            <td>{{ $eskul->jam_selesai }}</td>
                            <td>{{ $eskul->tempat }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="/eskul/{{ $eskul->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mr-2">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="/eskul/edit/{{ $eskul->id }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
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