@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('header', 'Detail Surat Masuk')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- JUDUL --}}
    <div>
        <p class="text-sm font-medium text-teal-600">
            Administrasi Persuratan
        </p>

        <h1 class="mt-1 text-2xl font-bold text-slate-800">
            Detail Surat Masuk
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Informasi lengkap surat masuk yang tersimpan dalam sistem.
        </p>
    </div>

    @if ($surat)

        {{-- KARTU DETAIL --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50/70 px-6 py-5">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-teal-100 text-teal-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />
                    </svg>
                </div>

                <div>
                    <h2 class="font-bold text-slate-800">
                        Informasi Surat
                    </h2>
                    <p class="text-xs text-slate-500">
                        Data surat masuk
                    </p>
                </div>
            </div>

            <div class="divide-y divide-slate-100">

                <div class="grid gap-2 px-6 py-5 sm:grid-cols-3">
                    <p class="text-sm font-medium text-slate-500">
                        Nomor Surat
                    </p>
                    <p class="text-sm font-semibold text-slate-800 sm:col-span-2">
                        {{ $surat->nomor_surat }}
                    </p>
                </div>

                <div class="grid gap-2 px-6 py-5 sm:grid-cols-3">
                    <p class="text-sm font-medium text-slate-500">
                        Tanggal Surat
                    </p>
                    <p class="text-sm font-semibold text-slate-800 sm:col-span-2">
                        {{ $surat->tanggal->format('d-m-Y') }}
                    </p>
                </div>

                <div class="grid gap-2 px-6 py-5 sm:grid-cols-3">
                    <p class="text-sm font-medium text-slate-500">
                        Pengirim
                    </p>
                    <p class="text-sm font-semibold text-slate-800 sm:col-span-2">
                        {{ $surat->pengirim }}
                    </p>
                </div>

                <div class="grid gap-2 px-6 py-5 sm:grid-cols-3">
                    <p class="text-sm font-medium text-slate-500">
                        Perihal
                    </p>
                    <p class="text-sm font-semibold text-slate-800 sm:col-span-2">
                        {{ $surat->perihal }}
                    </p>
                </div>

                <div class="grid gap-2 px-6 py-5 sm:grid-cols-3">
                    <p class="text-sm font-medium text-slate-500">
                        Keterangan
                    </p>
                    <p class="whitespace-pre-line text-sm leading-relaxed text-slate-700 sm:col-span-2">
                        {{ $surat->keterangan ?? '-' }}
                    </p>
                </div>

            </div>

            {{-- TOMBOL KEMBALI --}}
            <div class="flex justify-end border-t border-slate-100 bg-slate-50/70 px-6 py-5">
                <a href="{{ route('surat-masuk.index') }}"
                   class="rounded-xl bg-teal-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-teal-600/20 transition hover:bg-teal-700">
                    Kembali ke Daftar Surat
                </a>
            </div>

        </div>

    @else

        {{-- JIKA DATA TIDAK DITEMUKAN --}}
        <div class="rounded-2xl border border-amber-200 bg-amber-50 p-6">
            <div class="flex items-start gap-3">
                <div class="text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                </div>

                <div>
                    <h2 class="font-bold text-amber-800">
                        Surat Tidak Ditemukan
                    </h2>
                    <p class="mt-1 text-sm text-amber-700">
                        Data surat yang Anda cari tidak tersedia.
                    </p>
                </div>
            </div>

            <a href="{{ route('surat-masuk.index') }}"
               class="mt-5 inline-block rounded-xl bg-amber-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-amber-700">
                Kembali ke Daftar Surat
            </a>
        </div>

    @endif

</div>

@endsection