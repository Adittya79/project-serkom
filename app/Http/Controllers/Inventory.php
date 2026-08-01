<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;

class Inventory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Barangs::query();

        // Fitur Pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama_barang', 'like', '%' . $request->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $request->search . '%')
                    ->orWhere('kategori_barang', 'like', '%' . $request->search . '%');
            });
        }

        // Ambil data barang terbaru
        $barangs = $query->latest()->get();

        // Hitung total stok dari seluruh aset
        $totalAset = Barangs::sum('stok');

        return view('serkom.inventory', compact('barangs', 'totalAset'));
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
