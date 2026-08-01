<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'kategori_barang',
        'stok',
        'deskripsi'
    ];
}
