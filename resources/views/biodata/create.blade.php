@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Biodata') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="container mt-2">
                            <h1 class="mb-4">Tambah Biodata</h1>
                            <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">Profile Picture:</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        value="{{ old('image') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        value="{{ old('nama_lengkap') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="nik" class="form-label">NIK:</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        value="{{ old('nik') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="umur" class="form-label">Umur:</label>
                                    <input type="number" class="form-control" id="umur" name="umur"
                                        value="{{ old('umur') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="alamat" class="form-label">Alamat:</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="2" required>{{ old('alamat') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
