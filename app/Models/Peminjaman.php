<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $fillable = [
        'user_id',
        'ruangan_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keperluan',
        'status',
        'keterangan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ruangan(): BelongsTo
    {
        return $this->belongsTo(Ruangan::class);
    }
}