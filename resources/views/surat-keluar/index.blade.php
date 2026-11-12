@extends('layouts.app')

@section('title', 'Surat Keluar')

@section('header', 'Surat Keluar')

@section('content')

<div class="space-y-6">

    {{-- JUDUL HALAMAN --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-medium text-teal-600">
                Administrasi Persuratan
            </p>

            <h1 class="mt-1 text-2xl font-bold text-slate-800">
                Daftar Surat Keluar
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Kelola dan pantau seluruh data surat keluar.
            </p>
        </div>

        @can('manage-letters')
            <a href="{{ route('surat-keluar.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-teal-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-teal-600/20 transition hover:bg-teal-700">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>

                Tambah Surat Keluar
            </a>
        @endcan
    </div>


    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>

            {{ session('success') }}
        </div>
    @endif


    {{-- TABEL SURAT KELUAR --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-col gap-2 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-bold text-slate-800">
                    Data Surat Keluar
                </h2>

                <p class="mt-1 text-xs text-slate-500">
                    Daftar surat yang telah diterbitkan.
                </p>
            </div>

            <span class="w-fit rounded-lg bg-teal-50 px-3 py-2 text-xs font-semibold text-teal-700">
                Total: {{ $suratKeluar->count() }} surat
            </span>
        </div>


        <div class="overflow-x-auto">

            <table class="w-full min-w-[850px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-bold">No</th>
                        <th class="px-5 py-4 font-bold">Nomor Surat</th>
                        <th class="px-5 py-4 font-bold">Tanggal</th>
                        <th class="px-5 py-4 font-bold">Tujuan</th>
                        <th class="px-5 py-4 font-bold">Perihal</th>
                        <th class="px-5 py-4 text-center font-bold">Aksi</th>
                    </tr>
                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($suratKeluar as $surat)

                        <tr class="transition hover:bg-slate-50/80">

                            <td class="px-5 py-4 text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4 font-semibold text-slate-800">
                                {{ $surat->nomor_surat }}
                            </td>

                            <td class="whitespace-nowrap px-5 py-4 text-slate-600">
                                {{ $surat->tanggal->format('d-m-Y') }}
                            </td>

                            <td class="px-5 py-4 text-slate-700">
                                {{ $surat->tujuan }}
                            </td>

                            <td class="px-5 py-4 text-slate-700">
                                {{ $surat->perihal }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    <a href="{{ route('surat-keluar.show', $surat->id) }}"
                                       class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-100">
                                        Detail
                                    </a>

                                    @can('manage-letters')

                                        <a href="{{ route('surat-keluar.edit', $surat->id) }}"
                                           class="rounded-lg bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">
                                            Edit
                                        </a>

                                        <form action="{{ route('surat-keluar.destroy', $surat->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus surat ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100">
                                                Hapus
                                            </button>
                                        </form>

                                    @endcan

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>

                                <p class="mt-4 font-semibold text-slate-700">
                                    Belum Ada Data Surat Keluar
                                </p>

                                <p class="mt-1 text-sm text-slate-400">
                                    Data surat keluar belum tersedia dalam sistem.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="border-t border-slate-100 bg-slate-50/50 px-6 py-4">
            <p class="text-xs text-slate-500">
                Sistem Informasi Surat — Data Surat Keluar
            </p>
        </div>

    </div>

</div>

@endsection