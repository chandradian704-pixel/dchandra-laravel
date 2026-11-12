{{-- resources/views/dashboard.blade.php --}}

@extends('layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')

<div class="space-y-8">

    {{-- WELCOME BANNER --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-teal-900 p-7 text-white shadow-xl md:p-10">

        <div class="relative z-10 max-w-2xl">
            <span class="inline-flex items-center rounded-full border border-teal-300/30 bg-teal-400/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-teal-300">
                SISTEM ADMINISTRASI DIGITAL
            </span>

            <h1 class="mt-5 text-3xl font-bold leading-tight md:text-4xl">
                Selamat Datang di
                <span class="text-teal-300">Sistem Informasi Surat</span>
            </h1>

            <p class="mt-4 max-w-xl text-sm leading-relaxed text-slate-300 md:text-base">
                Kelola administrasi surat masuk dan surat keluar dengan lebih mudah,
                tertata, cepat, dan efisien dalam satu sistem.
            </p>

            <div class="mt-7 flex flex-wrap gap-3">
                <a href="{{ route('surat-masuk.index') }}"
                   class="rounded-xl bg-teal-500 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-teal-500/20 transition hover:bg-teal-400">
                    Lihat Surat Masuk →
                </a>

                <a href="{{ route('surat-keluar.index') }}"
                   class="rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/20">
                    Lihat Surat Keluar
                </a>
            </div>
        </div>

        {{-- DECORATION --}}
        <div class="pointer-events-none absolute -right-16 -top-24 h-80 w-80 rounded-full border-[35px] border-white/5"></div>
        <div class="pointer-events-none absolute -bottom-32 right-32 h-64 w-64 rounded-full border-[25px] border-teal-400/10"></div>

        <div class="pointer-events-none absolute right-12 top-1/2 hidden -translate-y-1/2 text-[150px] font-black text-white/[0.04] lg:block">
            S
        </div>

    </div>


    {{-- SECTION TITLE --}}
    <div class="flex flex-col justify-between gap-2 sm:flex-row sm:items-end">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-teal-600">
                Navigasi Cepat
            </p>

            <h2 class="mt-2 text-xl font-bold text-slate-800">
                Pengelolaan Persuratan
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Pilih layanan yang ingin Anda gunakan.
            </p>
        </div>
    </div>


    {{-- MENU CARDS --}}
    <div class="grid gap-5 md:grid-cols-2">

        {{-- SURAT MASUK --}}
        <a href="{{ route('surat-masuk.index') }}"
           class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-teal-300 hover:shadow-xl">

            <div class="flex items-start justify-between">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-50 text-2xl font-bold text-teal-600 transition group-hover:bg-teal-500 group-hover:text-white">
                    ↓
                </div>

                <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700">
                    Administrasi
                </span>

            </div>

            <h3 class="mt-6 text-xl font-bold text-slate-800">
                Surat Masuk
            </h3>

            <p class="mt-2 max-w-sm text-sm leading-relaxed text-slate-500">
                Kelola, catat, dan lihat seluruh data surat yang diterima.
            </p>

            <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-4">
                <span class="text-sm font-semibold text-teal-600">
                    Buka Pengelolaan
                </span>

                <span class="text-lg text-teal-600 transition group-hover:translate-x-2">
                    →
                </span>
            </div>

        </a>


        {{-- SURAT KELUAR --}}
        <a href="{{ route('surat-keluar.index') }}"
           class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-indigo-300 hover:shadow-xl">

            <div class="flex items-start justify-between">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-2xl font-bold text-indigo-600 transition group-hover:bg-indigo-600 group-hover:text-white">
                    ↑
                </div>

                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">
                    Administrasi
                </span>

            </div>

            <h3 class="mt-6 text-xl font-bold text-slate-800">
                Surat Keluar
            </h3>

            <p class="mt-2 max-w-sm text-sm leading-relaxed text-slate-500">
                Kelola, catat, dan pantau seluruh data surat yang diterbitkan.
            </p>

            <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-4">
                <span class="text-sm font-semibold text-indigo-600">
                    Buka Pengelolaan
                </span>

                <span class="text-lg text-indigo-600 transition group-hover:translate-x-2">
                    →
                </span>
            </div>

        </a>

    </div>


    {{-- INFORMATION PANEL --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-start gap-4">

            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-xl text-amber-600">
                i
            </div>

            <div>
                <h3 class="font-bold text-slate-800">
                    Informasi Sistem
                </h3>

                <p class="mt-2 text-sm leading-relaxed text-slate-500">
                    Sistem Informasi Surat dirancang untuk membantu pengelolaan
                    administrasi persuratan secara digital, sehingga pencatatan
                    dan pencarian dokumen menjadi lebih terstruktur.
                </p>
            </div>

        </div>

    </div>

</div>

@endsection