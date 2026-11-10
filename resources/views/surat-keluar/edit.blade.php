@extends('layouts.app')

@section('title', 'Edit Surat Keluar')

@section('content')

<h1>Edit Surat Keluar</h1>

<form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="nomor_surat">Nomor Surat</label><br>
        <input
            type="text"
            id="nomor_surat"
            name="nomor_surat"
            value="{{ old('nomor_surat', $surat->nomor_surat) }}"
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
            value="{{ old('tanggal', $surat->tanggal->format('Y-m-d')) }}"
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
            value="{{ old('tujuan', $surat->tujuan) }}"
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
            value="{{ old('perihal', $surat->perihal) }}"
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
        >{{ old('keterangan', $surat->keterangan) }}</textarea>
        @error('keterangan')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('surat-keluar.index') }}">Kembali</a>
</form>

@endsection