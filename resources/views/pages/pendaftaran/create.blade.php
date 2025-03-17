@extends('layouts.main')

@section('content')

<div class="container-fluid">

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
    
    <!-- DataTales Example -->
    <form action="/pendaftaran/store" method="POST">
        @csrf
        @method('POST')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Pendaftaran Eskul</h6>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="eskul_id" class="form-label">Nama Eskul</label>
                    <select name="eskul_id" id="eskul_id" class="form-control" required>
                        @foreach ($eskuls as $eskul)
                        <option value="{{ $eskul->id }}">{{ $eskul->nama_eskul }}</option>
                        @endforeach
                    </select>
                </div>

            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <a href="/" class="btn btn-outline-secondary mr-3">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </div>
    </form>

</div>

@endsection