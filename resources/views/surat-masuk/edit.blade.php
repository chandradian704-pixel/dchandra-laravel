@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('header', 'Edit Surat Masuk')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- JUDUL --}}
    <div>
        <p class="text-sm font-medium text-teal-600">
            Administrasi Persuratan
        </p>

        <h1 class="mt-1 text-2xl font-bold text-slate-800">
            Edit Surat Masuk
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi surat masuk yang sudah tersimpan.
        </p>
    </div>

    {{-- FORM EDIT --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 bg-slate-50/70 px-6 py-5">
            <h2 class="font-bold text-slate-800">
                Formulir Perubahan Data
            </h2>
            <p class="mt-1 text-xs text-slate-500">
                Silakan periksa dan sesuaikan data surat berikut.
            </p>
        </div>

        <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 p-6">

                {{-- NOMOR SURAT --}}
                <div>
                    <label for="nomor_surat" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nomor Surat <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="nomor_surat"
                        name="nomor_surat"
                        value="{{ old('nomor_surat', $surat->nomor_surat) }}"
                        required
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10"
                    >

                    @error('nomor_surat')
                        <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TANGGAL DAN PENGIRIM --}}
                <div class="grid gap-6 md:grid-cols-2">

                    <div>
                        <label for="tanggal" class="mb-2 block text-sm font-semibold text-slate-700">
                            Tanggal Surat <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="date"
                            id="tanggal"
                            name="tanggal"
                            value="{{ old('tanggal', $surat->tanggal->format('Y-m-d')) }}"
                            required
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10"
                        >

                        @error('tanggal')
                            <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pengirim" class="mb-2 block text-sm font-semibold text-slate-700">
                            Pengirim <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="pengirim"
                            name="pengirim"
                            value="{{ old('pengirim', $surat->pengirim) }}"
                            required
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10"
                        >

                        @error('pengirim')
                            <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- PERIHAL --}}
                <div>
                    <label for="perihal" class="mb-2 block text-sm font-semibold text-slate-700">
                        Perihal Surat <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="perihal"
                        name="perihal"
                        value="{{ old('perihal', $surat->perihal) }}"
                        required
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10"
                    >

                    @error('perihal')
                        <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KETERANGAN --}}
                <div>
                    <label for="keterangan" class="mb-2 block text-sm font-semibold text-slate-700">
                        Keterangan
                    </label>

                    <textarea
                        id="keterangan"
                        name="keterangan"
                        rows="4"
                        class="w-full resize-y rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10"
                    >{{ old('keterangan', $surat->keterangan) }}</textarea>

                    @error('keterangan')
                        <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <p class="text-xs text-slate-400">
                    <span class="text-red-500">*</span>
                    Wajib diisi.
                </p>

            </div>

            {{-- TOMBOL --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 bg-slate-50/70 px-6 py-5 sm:flex-row sm:justify-end">

                <a href="{{ route('surat-masuk.index') }}"
                   class="rounded-xl border border-slate-300 bg-white px-6 py-3 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-teal-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-teal-600/20 transition hover:bg-teal-700">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection