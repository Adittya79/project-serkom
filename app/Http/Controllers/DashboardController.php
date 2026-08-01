<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Tangkap input dari form
        $search        = $request->input('search');
        $status        = $request->input('status');
        $tanggalPinjam = $request->input('tanggal_pinjam');

        // Query dengan Eloquent Model Peminjaman
        $peminjamans = Peminjaman::with(['details.barang']) // Eager loading relasi
            // 1. FILTER TANGGUNG JAWAB PENCARIAN (Search)
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nama_peminjam', 'like', "%{$search}%")
                        ->orWhere('kategori_peminjam', 'like', "%{$search}%")
                        ->orWhere('keperluan', 'like', "%{$search}%")
                        // Cari juga berdasarkan nama barang di dalam relasi 'details'
                        ->orWhereHas('details.barang', function ($b) use ($search) {
                            $b->where('nama_barang', 'like', "%{$search}%");
                        });
                });
            })

            // 2. FILTER STATUS (pending, dipinjam, dikembalikan)
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })

            // 3. FILTER TANGGAL PEMINJAMAN
            ->when($tanggalPinjam, function ($query, $tanggalPinjam) {
                return $query->whereDate('tgl_peminjaman', $tanggalPinjam);
            })

            ->latest() // Menampilkan data terbaru paling atas
            ->paginate(10)
            ->withQueryString(); // Menjaga link pagination tidak menghilangkan filter saat pindah halaman

        return view('dashboard', compact('peminjamans'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
