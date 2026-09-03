<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruangan extends Model
{
    protected $fillable = [
        'nama_ruangan',
        'lokasi',
        'kapasitas',
        'fasilitas',
        'status',
    ];

    public function peminjamans(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }
}