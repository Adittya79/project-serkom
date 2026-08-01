<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';
    protected $fillable = [
        'nama_peminjam',
        'kategori_peminjam',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'keperluan',
        'status'
    ];
    public function details(){
        return $this->hasMany(DetailPeminjaman::class, 'peminjaman_id');
    }
}
