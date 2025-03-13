@extends('layouts.main')

@section('content')

<div class="container-fluid">
    
    <!-- DataTales Example -->
    <form action="/eskul/create" method="POST">
        @csrf
        @method('POST')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Eskul</h6>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="name" class="form-label">Nama Eskul</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="admin_id" class="form-label">Nama Pembina</label>
                    <select name="admin_id" id="admin_id" class="form-control @error('admin_id') is-invalid @enderror">
                        @foreach ($coaches as $coach )
                        <option value="{{ $coach->id }}">{{ $coach->nama_lengkap }}</option>
                        @endforeach
                    </select>
                    @error('admin_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="day" class="form-label" class="form-label">Hari</label>
                    <select name="day" id="day" class="form-control @error('day') is-invalid @enderror">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                    @error('day')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="startTime" class="form-label">Jam Mulai (WIB)</label>
                    <input type="time" name="startTime" id="startTime" class="form-control @error('startTime') is-invalid @enderror" value="{{ old('startTime') }}">
                    @error('startTime')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="endTime" class="form-label">Jam Selesai (WIB)</label>
                    <input type="time" name="endTime" id="endTime" class="form-control @error('endTime') is-invalid @enderror" value="{{ old('endTime') }}">
                    @error('endTime')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="place" class="form-label">Tempat</label>
                    <input type="text" name="place" id="place" class="form-control @error('place') is-invalid @enderror" value="{{ old('place') }}">
                    @error('place')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description')}}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <a href="/eskul" class="btn btn-outline-secondary mr-3">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </div>
    </form>

</div>

@endsection