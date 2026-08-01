<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function storeDetail($peminjamanId, array $barangIds, array $jumlahs)
    {
        foreach ($barangIds as $index => $barangId) {
            $qty = $jumlahs[$index];
            $barang = Barangs::find($barangId);

            if ($barang) {
                if ($barang->stok < $qty) {
                    return [
                        'status'  => false,
                        'message' => "Stok Barang '{$barang->nama_barang}' Tidak Mencukupi (Tersedia: {$barang->stok})."
                    ];
                }

                $barang->decrement('stok', $qty);
            }

            DetailPeminjaman::create([
                'peminjaman_id' => $peminjamanId,
                'barangs_id'    => $barangId,
                'jumlah'        => $qty
            ]);
        }

        return ['status' => true];
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailPeminjaman $detailPeminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailPeminjaman $detailPeminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailPeminjaman $detailPeminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyItem(string $id)
    {
        $detail = DetailPeminjaman::findOrFail($id);

        // Kembalikan stok barang
        $barang = Barangs::find($detail->barangs_id);
        if ($barang) {
            $barang->increment('stok', $detail->jumlah);
        }

        $detail->delete();

        return redirect()->back()->with('success', 'Item barang berhasil dihapus dari peminjaman.');
    }
}
