@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <h1>Detail Produk</h1>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID Produk</th>
            <td>{{ $produk['id'] }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td>{{ $produk['nama'] }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>Rp {{ number_format($produk['harga'], 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>
                {{ $produk['stok'] }} 
                (
                    @if ($produk['stok'] > 10) Aman
                    @elseif ($produk['stok'] > 0) Menipis
                    @else Habis
                    @endif
                )
            </td>
        </tr>
    </table>

    <br>
    <a href="{{ route('produk.index') }}">&laquo; Kembali ke Daftar Produk</a>
@endsection