@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Barang Elektronik</h1>

    <!-- Error Message -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Form -->
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}" required>
        </div>

        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang') }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori') }}" required>
        </div>

        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" id="merk" class="form-control" value="{{ old('merk') }}">
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ old('model') }}">
        </div>

        <div class="form-group">
            <label for="tahun_pembelian">Tahun Pembelian</label>
            <input type="number" name="tahun_pembelian" id="tahun_pembelian" class="form-control" value="{{ old('tahun_pembelian') }}" required>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select name="kondisi" id="kondisi" class="form-control" required>
                <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required min="1">
        </div>

        <div class="form-group">
            <label for="lokasi_penyimpanan">Lokasi Penyimpanan</label>
            <input type="text" name="lokasi_penyimpanan" id="lokasi_penyimpanan" class="form-control" value="{{ old('lokasi_penyimpanan') }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection