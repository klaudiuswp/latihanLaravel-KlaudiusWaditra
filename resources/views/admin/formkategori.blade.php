@extends('admin.kategori')

@section('formkategori')
    <div class="container">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Unique ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Harga Setelah Diskon</th>
                </tr>
            </thead>
            <tbody class="table-group-divider table-secondary">
                @foreach ($kategori as $kat)
                    <tr>
                        <td rowspan="{{ count($kat['produk']) + 1 }}">{{ $kat['nama_kategori'] }}</td>
                        <td rowspan="{{ count($kat['produk']) + 1 }}">{{ $kat['unique_id'] }}</td>
                    </tr>
                    @foreach ($kat['produk'] as $produk)
                        <tr>
                            <td>{{ $produk['nama_produk'] }}</td>
                            <td>Rp{{ number_format($produk['harga']) }}</td>
                            <td>{{ $produk['diskon']*100 }} %</td>

                            <td>Rp{{ number_format($produk['harga']*(100-$produk['diskon'])) }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <h1 class="mb-4">Tambah Biodata</h1>
        <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                    value="{{ old('nama_lengkap') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="nik" class="form-label">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="umur" class="form-label">Umur:</label>
                <input type="number" class="form-control" id="umur" name="umur" value="{{ old('umur') }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" required>{{ old('alamat') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection
