<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['nama'];

    public function suratMasuk(): HasMany
    {
        return $this->hasMany(SuratMasuk::class);
    }
}