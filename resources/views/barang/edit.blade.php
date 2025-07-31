<x-layouts.app :title="__('Edit Barang Elektronik')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Edit Barang Elektronik</flux:heading>
        <flux:subheading size="lg" class="mb-6">Form untuk mengedit data barang elektronik</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if ($errors->any())
    <div class="mb-4 rounded-lg border border-red-300 bg-red-100 text-red-800 px-4 py-3 text-sm">
        <strong class="font-semibold block mb-2">Terjadi Kesalahan:</strong>
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('successMessage'))
    <div class="mb-4 rounded-lg border border-green-300 bg-green-100 text-green-800 px-4 py-3 text-sm">
        {{ session('successMessage') }}
    </div>
    @elseif(session('errorMessage'))
    <div class="mb-4 rounded-lg border border-red-300 bg-red-100 text-red-800 px-4 py-3 text-sm">
        {{ session('errorMessage') }}
    </div>
    @endif

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <flux:input label="Nama Barang" name="nama_barang" class="mb-3" value="{{ old('nama_barang', $barang->nama_barang) }}" required />

        <flux:input label="Kode Barang" name="kode_barang" class="mb-3" value="{{ old('kode_barang', $barang->kode_barang) }}" required />

        <flux:input label="Kategori" name="kategori" class="mb-3" value="{{ old('kategori', $barang->kategori) }}" required />

        <flux:input label="Merk" name="merk" class="mb-3" value="{{ old('merk', $barang->merk) }}" />

        <flux:input label="Model" name="model" class="mb-3" value="{{ old('model', $barang->model) }}" />

        <flux:input type="number" label="Tahun Pembelian" name="tahun_pembelian" class="mb-3" value="{{ old('tahun_pembelian', $barang->tahun_pembelian) }}" required />

        <flux:select label="Kondisi" name="kondisi" class="mb-3" required>
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak Ringan" {{ old('kondisi', $barang->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ old('kondisi', $barang->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
        </flux:select>

        <flux:input type="number" label="Jumlah" name="jumlah" class="mb-3" value="{{ old('jumlah', $barang->jumlah) }}" required min="1" />

        <flux:input label="Lokasi Penyimpanan" name="lokasi_penyimpanan" class="mb-3" value="{{ old('lokasi_penyimpanan', $barang->lokasi_penyimpanan) }}" required />

        <flux:textarea label="Keterangan" name="keterangan" class="mb-3">{{ old('keterangan', $barang->keterangan) }}</flux:textarea>

        <flux:button type="submit" class="mt-3" variant="primary">Perbarui</flux:button>
    </form>
</x-layouts.app>
