<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sistem Informasi Surat')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">

    <div class="min-h-screen md:flex">

        {{-- SIDEBAR DESKTOP --}}
        <aside class="hidden w-72 shrink-0 flex-col bg-slate-950 text-white md:flex">

            <div class="flex h-24 items-center gap-3 border-b border-white/10 px-7">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-teal-500 text-xl font-bold shadow-lg shadow-teal-500/20">
                    S
                </div>

                <div>
                    <h1 class="text-lg font-bold tracking-wide">SIM SURAT</h1>
                    <p class="text-xs text-slate-400">Sistem Informasi Persuratan</p>
                </div>
            </div>

            <div class="px-5 pt-8">
                <p class="mb-4 px-3 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">
                    Menu Utama
                </p>

                <nav class="space-y-2">

                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 transition
                       {{ request()->routeIs('dashboard') ? 'bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-slate-400 hover:bg-white/10 hover:text-white' }}">

                        <span class="text-lg">▦</span>
                        <span class="text-sm font-semibold">Dashboard</span>
                    </a>

                    <a href="{{ route('surat-masuk.index') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 transition
                       {{ request()->routeIs('surat-masuk.*') ? 'bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-slate-400 hover:bg-white/10 hover:text-white' }}">

                        <span class="text-lg">↙</span>
                        <span class="text-sm font-semibold">Surat Masuk</span>
                    </a>

                    <a href="{{ route('surat-keluar.index') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 transition
                       {{ request()->routeIs('surat-keluar.*') ? 'bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-slate-400 hover:bg-white/10 hover:text-white' }}">

                        <span class="text-lg">↗</span>
                        <span class="text-sm font-semibold">Surat Keluar</span>
                    </a>

                </nav>
            </div>

            <div class="mt-auto p-5">
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                    <p class="text-xs font-semibold text-slate-300">SISTEM ADMINISTRASI</p>
                    <p class="mt-2 text-xs leading-relaxed text-slate-500">
                        Pengelolaan surat masuk dan surat keluar secara terstruktur.
                    </p>
                </div>
            </div>

        </aside>


        {{-- AREA KONTEN --}}
        <div class="flex min-h-screen min-w-0 flex-1 flex-col">

            {{-- HEADER --}}
            <header class="border-b border-slate-200 bg-white">

                <div class="flex min-h-20 items-center justify-between gap-4 px-5 py-4 md:px-8">

                    <div>
                        <p class="text-xs font-medium uppercase tracking-widest text-teal-600">
                            SISTEM INFORMASI
                        </p>

                        <h2 class="mt-1 text-lg font-bold text-slate-800 md:text-xl">
                            @yield('header', 'Dashboard')
                        </h2>
                    </div>

                    @auth
                        <div class="flex items-center gap-3">

                            <div class="hidden text-right sm:block">
                                <p class="text-sm font-bold text-slate-800">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs text-slate-500">Pengguna Sistem</p>
                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-teal-100 font-bold text-teal-700">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="rounded-xl border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600">
                                    Keluar
                                </button>
                            </form>

                        </div>
                    @endauth

                </div>

                {{-- NAVIGASI MOBILE --}}
                <nav class="flex gap-2 overflow-x-auto border-t border-slate-100 px-5 py-3 md:hidden">

                    <a href="{{ route('dashboard') }}"
                       class="whitespace-nowrap rounded-lg px-4 py-2 text-sm font-semibold
                       {{ request()->routeIs('dashboard') ? 'bg-teal-500 text-white' : 'bg-slate-100 text-slate-600' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('surat-masuk.index') }}"
                       class="whitespace-nowrap rounded-lg px-4 py-2 text-sm font-semibold
                       {{ request()->routeIs('surat-masuk.*') ? 'bg-teal-500 text-white' : 'bg-slate-100 text-slate-600' }}">
                        Surat Masuk
                    </a>

                    <a href="{{ route('surat-keluar.index') }}"
                       class="whitespace-nowrap rounded-lg px-4 py-2 text-sm font-semibold
                       {{ request()->routeIs('surat-keluar.*') ? 'bg-teal-500 text-white' : 'bg-slate-100 text-slate-600' }}">
                        Surat Keluar
                    </a>

                </nav>

            </header>


            {{-- KONTEN HALAMAN --}}
            <main class="flex-1 p-5 md:p-8">

                <div class="mx-auto w-full max-w-7xl">

                    @yield('content')

                </div>

            </main>


            {{-- FOOTER --}}
            <footer class="border-t border-slate-200 bg-white px-5 py-5 md:px-8">

                <div class="flex flex-col justify-between gap-2 text-xs text-slate-500 sm:flex-row">

                    <p>
                        © {{ date('Y') }} Sistem Informasi Surat
                    </p>

                    <p>
                        Administrasi Persuratan Digital
                    </p>

                </div>

            </footer>

        </div>

    </div>

</body>
</html>