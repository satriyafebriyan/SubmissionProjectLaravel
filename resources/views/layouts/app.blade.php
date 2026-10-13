<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    {{-- @yield berfungsi sebagai tempat penampung judul halaman anak --}}
    <title>@yield('title', 'Toko Praktikum')</title>
    @stack('styles')
</head>
<body>
    {{-- Menyisipkan potongan view navbar --}}
    @include('partials.navbar')
    
    <main>
        {{-- Tempat konten utama dari halaman anak akan dimasukkan --}}
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Toko Praktikum</p>
    </footer>

    @stack('scripts')
</body>
</html>