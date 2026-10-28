<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = [
            [
                'id' => 1,
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '01-10-2026',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat'
            ],
            [
                'id' => 2,
                'nomor_surat' => '002/BAA/X/2026',
                'tanggal' => '02-10-2026',
                'pengirim' => 'BAA',
                'perihal' => 'Pemberitahuan Akademik'
            ],
            [
                'id' => 3,
                'nomor_surat' => '003/LPPM/X/2026',
                'tanggal' => '03-10-2026',
                'pengirim' => 'LPPM',
                'perihal' => 'Undangan Sosialisasi'
            ]
        ];

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function show($id)
    {
        $suratKeluar = [
            1 => [
                'id' => 1,
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '01-10-2026',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat',
                'keterangan' => 'Undangan rapat koordinasi Fakultas Teknik'
            ],
            2 => [
                'id' => 2,
                'nomor_surat' => '002/BAA/X/2026',
                'tanggal' => '02-10-2026',
                'pengirim' => 'BAA',
                'perihal' => 'Pemberitahuan Akademik',
                'keterangan' => 'Pemberitahuan kegiatan akademik'
            ],
            3 => [
                'id' => 3,
                'nomor_surat' => '003/LPPM/X/2026',
                'tanggal' => '03-10-2026',
                'pengirim' => 'LPPM',
                'perihal' => 'Undangan Sosialisasi',
                'keterangan' => 'Undangan kegiatan sosialisasi penelitian'
            ]
        ];

        $surat = $suratKeluar[$id] ?? null;

        return view('surat-keluar.show', compact('surat'));
    }
}