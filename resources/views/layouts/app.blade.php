{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>

<header>
    <h2>Sistem Informasi Surat</h2>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        |
        <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a>
        |
        <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
    </nav>
    
    <!-- Bagian Autentikasi yang ditambahkan -->
    @auth
        <div style="margin-top: 5px;">
            <span>Masuk sebagai: {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left: 10px;">
                @csrf
                <button type="submit">Keluar</button>
            </form>
        </div>
    @endauth

    <hr>
</header>

<main>
    @yield('content')
</main>

<hr>
<footer>
    <p>Sistem Informasi Surat</p>
</footer>

</body>
</html>