<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, selamat datang di Laravel 13!';
});

Route::get('/waktu', fn () => now()->format('d-m-Y H:i:s'));

// Parameter wajib
Route::get('/profil/{satria}', function (string $satria) {
    return "Halo, {$satria}!";
});

// Parameter opsional dengan nilai default
Route::get('/kategori/{satria?}', function (?string $satria = 'semua') {
    return "Menampilkan kategori: {$satria}";
});

// Lebih dari satu parameter
Route::get('/kelas/{TIC}/mahasiswa/242520123', function (string $TIC) {
    return "Kelas {$TIC}, NIM 242520123";
});

Route::get('/artikel/{id}', function (int $id) {
    return "Artikel nomor {$id}";
})->whereNumber('id');

Route::get('/pengguna/{username}', function (string $username) {
    return "Pengguna: {$username}";
})->whereAlpha('username');

Route::get('/kode/{kode}', function (string $kode) {
    return "Kode: {$kode}";
})->where('kode', '[A-Z]{3}[0-9]{2}');

Route::view('/tentang', 'tentang')->name('tentang');

Route::get('/kontak', function () {
    return view('kontak', ['email' => 'info@kampus.ac.id']);
})->name('kontak');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => 'Dashboard Admin')->name('dashboard');
    Route::get('/pengaturan', fn () => 'Pengaturan Admin')->name('pengaturan');
});

Route::redirect('/beranda', '/');

Route::fallback(function () {
    return response('Halaman tidak ditemukan (kustom).', 404);
});

use App\Http\Controllers\ProdukController;

// Route untuk halaman daftar produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

// Route untuk halaman detail produk dengan parameter {id}
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

// Alternatif: Route resource otomatis membuat 7 route CRUD sekaligus
// Route::resource('produk', ProdukController::class);