<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::all();

        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function show($id)
    {
        $surat = SuratMasuk::findOrFail($id);

        return view('surat-masuk.show', compact('surat'));
    }
}