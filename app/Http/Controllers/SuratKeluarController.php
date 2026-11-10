<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::all();

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|unique:surat_keluar,nomor_surat',
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255', // Mengganti pengirim menjadi tujuan
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        SuratKeluar::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $surat = SuratKeluar::findOrFail($id);

        return view('surat-keluar.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);

        return view('surat-keluar.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratKeluar::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => [
                'required',
                Rule::unique('surat_keluar', 'nomor_surat')->ignore($surat->id),
            ],
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255', // Mengganti pengirim menjadi tujuan
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat->update($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}