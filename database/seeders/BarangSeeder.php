<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create(['nama_barang' => 'Proyektor Epson', 'stok' => 5]);
        Barang::create(['nama_barang' => 'Kabel HDMI 15m', 'stok' => 12]);
        Barang::create(['nama_barang' => 'Microphone Wireless', 'stok' => 4]);
    }
}
