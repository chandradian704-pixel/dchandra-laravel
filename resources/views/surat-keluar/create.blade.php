@extends('layouts.app')

@section('title', 'Tambah Surat Keluar')

@section('content')

<h1>Tambah Surat Keluar</h1>

<form action="{{ route('surat-keluar.store') }}" method="POST">
    @csrf

    <div>
        <label for="nomor_surat">Nomor Surat</label><br>
        <input
            type="text"
            id="nomor_surat"
            name="nomor_surat"
            value="{{ old('nomor_surat') }}"
            required
        >
        @error('nomor_surat')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label for="tanggal">Tanggal</label><br>
        <input
            type="date"
            id="tanggal"
            name="tanggal"
            value="{{ old('tanggal') }}"
            required
        >
        @error('tanggal')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label for="tujuan">Tujuan</label><br>
        <input
            type="text"
            id="tujuan"
            name="tujuan"
            value="{{ old('tujuan') }}"
            required
        >
        @error('tujuan')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label for="perihal">Perihal</label><br>
        <input
            type="text"
            id="perihal"
            name="perihal"
            value="{{ old('perihal') }}"
            required
        >
        @error('perihal')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label for="keterangan">Keterangan</label><br>
        <textarea
            id="keterangan"
            name="keterangan"
        >{{ old('keterangan') }}</textarea>
        @error('keterangan')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">Simpan</button>
    <a href="{{ route('surat-keluar.index') }}">Kembali</a>
</form>

@endsection