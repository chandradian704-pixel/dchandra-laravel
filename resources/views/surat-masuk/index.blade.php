{{-- resources/views/surat-masuk/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('header', 'Surat Masuk')

@section('content')

<div class="space-y-6">

    {{-- JUDUL DAN TOMBOL TAMBAH --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <p class="text-sm font-medium text-teal-600">
                Administrasi Persuratan
            </p>

            <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-800">
                Daftar Surat Masuk
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Kelola dan pantau seluruh surat yang diterima.
            </p>
        </div>

        @can('manage-letters')
            <a href="{{ route('surat-masuk.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-teal-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-teal-600/20 transition hover:bg-teal-700">

                <span class="text-xl leading-none">+</span>
                Tambah Surat Masuk

            </a>
        @endcan

    </div>


    {{-- NOTIFIKASI SUKSES --}}
    @if (session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-700">

            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-100 font-bold">
                ✓
            </span>

            <p class="font-medium">
                {{ session('success') }}
            </p>

        </div>
    @endif


    {{-- KARTU TABEL --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- HEADER TABEL --}}
        <div class="flex flex-col justify-between gap-2 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center">

            <div>
                <h2 class="font-bold text-slate-800">
                    Data Surat Masuk
                </h2>

                <p class="mt-1 text-xs text-slate-500">
                    Informasi dan arsip surat yang diterima.
                </p>
            </div>

            <div class="rounded-lg bg-teal-50 px-3 py-2 text-xs font-semibold text-teal-700">
                Arsip Surat Masuk
            </div>

        </div>


        {{-- ISI TABEL --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[850px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">

                    <tr>
                        <th class="px-5 py-4 font-bold">No.</th>
                        <th class="px-5 py-4 font-bold">Nomor Surat</th>
                        <th class="px-5 py-4 font-bold">Tanggal</th>
                        <th class="px-5 py-4 font-bold">Pengirim</th>
                        <th class="px-5 py-4 font-bold">Perihal</th>
                        <th class="px-5 py-4 text-center font-bold">Aksi</th>
                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($suratMasuk as $surat)

                        <tr class="transition hover:bg-slate-50/80">

                            <td class="px-5 py-4 font-semibold text-slate-400">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4">
                                <span class="font-semibold text-slate-800">
                                    {{ $surat->nomor_surat }}
                                </span>
                            </td>

                            <td class="whitespace-nowrap px-5 py-4 text-slate-600">
                                {{ $surat->tanggal->format('d-m-Y') }}
                            </td>

                            <td class="px-5 py-4 font-medium text-slate-700">
                                {{ $surat->pengirim }}
                            </td>

                            <td class="max-w-xs px-5 py-4 text-slate-600">
                                {{ $surat->perihal }}
                            </td>

                            <td class="px-5 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    {{-- DETAIL --}}
                                    <a href="{{ route('surat-masuk.show', $surat->id) }}"
                                       class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600 transition hover:bg-blue-100">
                                        Detail
                                    </a>

                                    @can('manage-letters')

                                        {{-- EDIT --}}
                                        <a href="{{ route('surat-masuk.edit', $surat->id) }}"
                                           class="rounded-lg bg-amber-50 px-3 py-2 text-xs font-bold text-amber-700 transition hover:bg-amber-100">
                                            Edit
                                        </a>

                                        {{-- HAPUS --}}
                                        <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus surat ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600 transition hover:bg-red-100">
                                                Hapus
                                            </button>

                                        </form>

                                    @endcan

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-5 py-16 text-center">

                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-2xl text-slate-400">
                                    ✉
                                </div>

                                <h3 class="mt-4 font-bold text-slate-700">
                                    Belum Ada Surat Masuk
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Data surat masuk belum tersedia.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- FOOTER TABEL --}}
        <div class="border-t border-slate-100 bg-slate-50/70 px-6 py-4">

            <p class="text-xs text-slate-500">
                Menampilkan
                <span class="font-bold text-slate-700">
                    {{ $suratMasuk->count() }}
                </span>
                data surat pada halaman ini.
            </p>

        </div>

    </div>

</div>

@endsection