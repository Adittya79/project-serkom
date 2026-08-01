<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Controllers\WithoutMiddleware;
use Illuminate\Support\Facades\Storage;

class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $barangs = Barangs::latest()->get();
        $totalAset = Barangs::sum('stok');

        return view('serkom.inventory', compact('barangs', 'totalAset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('serkom.buat_barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_barang' => 'required|string',
            'stok' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string'
        ]);
        $imgPath = null;
        if ($request->has('gambar')) {
            $imgPath = $request->file('gambar')->store('uploads/barang', 'public');
        }
        $barang = new Barangs();
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_barang = $request->kategori_barang;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->image = $request->imgPath;
        $barang->save();
        return redirect()->route('inventory')->with('succes', 'Barang Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barangs::findOrFail($id);
        return view('serkom.edit_barang', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barangs::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_barang' => 'required|string',
            'stok' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama_barang', 'kategori_barang', 'stok', 'deskripsi']);

        // Jika user mengunggah gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($barang->image && Storage::disk('public')->exists($barang->image)) {
                Storage::disk('public')->delete($barang->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('barangs', 'public');
        }

        $barang->update($data);

        return redirect()->route('inventory')->with('success', 'Data barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Barangs $barangs, string $id)
    {
        try {
            $barang = Barangs::findOrFail($id);

            // Hapus file gambar jika ada
            if ($barang->image && Storage::disk('public')->exists($barang->image)) {
                Storage::disk('public')->delete($barang->image);
            }

            $barang->delete();

            return redirect()->back()->with('success', 'Barang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus! Barang ini masih terikat dengan data peminjaman.');
        }
    }
}
