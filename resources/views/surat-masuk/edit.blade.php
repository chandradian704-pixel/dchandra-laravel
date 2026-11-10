@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('content')

<h1>Edit Surat Masuk</h1>

<form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST">
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
            <p>{{ $message }}</p>
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
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label for="pengirim">Pengirim</label><br>
        <input
            type="text"
            id="pengirim"
            name="pengirim"
            value="{{ old('pengirim', $surat->pengirim) }}"
            required
        >
        @error('pengirim')
            <p>{{ $message }}</p>
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
            <p>{{ $message }}</p>
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
            <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('surat-masuk.index') }}">Kembali</a>
</form>

@endsection