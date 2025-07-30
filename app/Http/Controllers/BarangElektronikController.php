<?php

namespace App\Http\Controllers;

use App\Models\BarangElektronik;
use Illuminate\Http\Request;

class BarangElektronikController extends Controller
{
    public function index()
    {
        $barang = BarangElektronik::paginate(10);
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang_elektronik,nama_barang',
            'kode_barang' => 'required|unique:barang_elektronik,kode_barang',
            'tahun_pembelian' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi_penyimpanan' => 'required',
            'kategori' => 'required|string',
        ]);

        BarangElektronik::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Item created successfully!');
    }

    public function edit($id)
    {
        $barang = BarangElektronik::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang_elektronik,nama_barang,' . $id,
            'kode_barang' => 'required|unique:barang_elektronik,kode_barang,' . $id,
            'tahun_pembelian' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi_penyimpanan' => 'required',
        ]);

        $barang = BarangElektronik::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Item updated successfully!');
    }

    public function destroy($id)
    {
        $barang = BarangElektronik::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Item deleted successfully!');
    }
}
