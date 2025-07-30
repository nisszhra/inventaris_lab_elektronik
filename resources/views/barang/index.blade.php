@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Inventaris Barang Elektronik</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang Elektronik</a>

    <!-- Search Form -->
    <form action="{{ route('barang.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari Barang" value="{{ request('search') }}">
    </form>

    <!-- Barang Elektronik Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Kategori</th>
                <th>Tahun Pembelian</th>
                <th>Jumlah</th>
                <th>Lokasi Penyimpanan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->tahun_pembelian }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->lokasi_penyimpanan }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <!-- Delete button -->
                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $barang->links() }}
</div>
@endsection