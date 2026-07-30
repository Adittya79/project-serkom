<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam', 250);
            $table->enum('status_peminjam', ['Guru', 'Siswa', 'Ekskul/Organisasi']);
            $table->dateTime('tgl_pinjam');
            $table->dateTime('tgl_pengembalian');
            $table->text('keperluan');
            $table->enum('status', ['Pending', 'Dipinjam', 'Kembali', 'Ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_barang');
    }
};
