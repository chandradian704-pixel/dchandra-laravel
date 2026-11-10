<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar'; // Sesuaikan dengan nama tabel surat keluar di database Anda

    protected $fillable = [
        'nomor_surat',
        'tanggal',
        'tujuan', // Perhatikan: menggunakan 'tujuan' bukan 'pengirim'
        'perihal',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}