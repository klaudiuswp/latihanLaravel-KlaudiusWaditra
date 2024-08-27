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
                            <h1 class="mb-4">Biodata List</h1>

                            <div class="row">
                                @foreach ($biodatas as $biodata)
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img src="{{ asset('storage/' . $biodata->profile) }}" class="card-img-top" alt="Profile Picture" height="250px">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $biodata->nama_lengkap }}</h5>
                                                <p class="card-text">
                                                    <strong>NIK:</strong> {{ $biodata->nik }}<br>
                                                    <strong>Umur:</strong> {{ $biodata->umur }}<br>
                                                    <strong>Alamat:</strong> {{ $biodata->alamat }}
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('biodata.edit', $biodata->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('biodata.destroy', $biodata->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <a href="{{ route('biodata.create') }}" class="btn btn-primary">Tambah Biodata</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
