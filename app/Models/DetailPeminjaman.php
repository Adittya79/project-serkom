<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;
    protected $table = 'detail_peminjaman';
    protected $fillable = [
        'peminjaman_id',
        'barangs_id',
        'jumlah'
    ];
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barangs::class, 'barangs_id');
    }
}
