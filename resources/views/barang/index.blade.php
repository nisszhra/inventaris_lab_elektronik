<x-layouts.app :title="$title ?? 'Data Barang Elektronik Laboratorium'">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Data Barang</flux:heading>
        <flux:subheading size="lg" class="mb-6">Kelola Data Barang Elektronik di Laboratorium</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah & Form Pencarian --}}
    <div class="flex justify-between items-center mb-6 gap-4">
        <a href="{{ route('barang.create') }}">
            <flux:button icon="plus">Tambah Barang</flux:button>
        </a>

        <form action="{{ route('barang.index') }}" method="GET" class="flex gap-2">
            <flux:input name="search" placeholder="Cari nama/kode" value="{{ request('search') }}" />
            <flux:button>Cari</flux:button>
        </form>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Nama</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Kode</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Kategori</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Merk</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Model</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Tahun</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Jumlah</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Kondisi</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Lokasi</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Keterangan</th>
                    <th class="px-5 py-2 text-center text-sm font-medium text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-center text-sm text-gray-700">
                @forelse ($barang as $item)
                    <tr>
                        <td class="px-5 py-2">{{ $item->nama_barang }}</td>
                        <td class="px-5 py-2">{{ $item->kode_barang }}</td>
                        <td class="px-5 py-2">{{ $item->kategori }}</td>
                        <td class="px-5 py-2">{{ $item->merk }}</td>
                        <td class="px-5 py-2">{{ $item->model }}</td>
                        <td class="px-5 py-2">{{ $item->tahun_pembelian }}</td>
                        <td class="px-5 py-2">{{ $item->jumlah }}</td>
                        <td class="px-5 py-2">{{ $item->kondisi }}</td>
                        <td class="px-5 py-2">{{ $item->lokasi_penyimpanan }}</td>
                        <td class="px-5 py-2">{{ $item->keterangan }}</td>
                        <td class="px-5 py-2">
                            <div class="flex flex-col gap-1">
                                <a href="{{ route('barang.edit', $item->id) }}">
                                    <flux:button size="sm">Edit</flux:button>
                                </a>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button size="sm" variant="danger" type="submit">Hapus</flux:button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center py-4 text-gray-500">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $barang->links() }}
    </div>
</x-layouts.app>
