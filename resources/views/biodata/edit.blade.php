@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Biodata') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container mt-2">
                            <h1 class="mb-4">{{ $biodata->nama_lengkap }}</h1>
                            <form action="{{ route('biodata.update', $biodata->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        value="{{ $biodata->nama_lengkap }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="nik" class="form-label">NIK:</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        value="{{ $biodata->nik }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="umur" class="form-label">Umur:</label>
                                    <input type="number" class="form-control" id="umur" name="umur"
                                        value="{{ $biodata->umur }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="alamat" class="form-label">Alamat:</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="2" required>{{ $biodata->alamat }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Edit</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
