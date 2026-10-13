<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = [
            ['id' => 1, 'nama' => 'Keyboard', 'harga' => 150000, 'stok' => 12],
            ['id' => 2, 'nama' => 'Mouse', 'harga' => 85000, 'stok' => 0],
        ];
        return view('produk.index', compact('produk'));
    }

    public function show($id) 
    {
        // Daftar data produk tiruan (sementara)
        $daftarProduk = [
            1 => ['id' => 1, 'nama' => 'Keyboard', 'harga' => 150000, 'stok' => 12],
            2 => ['id' => 2, 'nama' => 'Mouse', 'harga' => 85000, 'stok' => 0],
        ];

        // Jika ID tidak ada di daftar, gagalkan dan tampilkan 404
        abort_unless(isset($daftarProduk[$id]), 404);

        $produk = $daftarProduk[$id];

        return view('produk.show', compact('produk'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required | max: 100', 
            'harga' => 'required | integer'
        ]);
        
        return redirect()->route('produk.index')->with('status', 'Tersimpan');
    }
}