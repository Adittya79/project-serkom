<?php

namespace App\Http\Controllers;

use App\Models\Barangs;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamans = Peminjaman::with('details.barang')->latest()->get();
        return view('serkom.dashboard', compact('peminjamans'));
    }

    public function create()
    {
        $barangsList = Barangs::where('stok', '>', 0)->get(['id', 'nama_barang', 'stok']);
        return view('serkom.buat_peminjaman', compact('barangsList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'kategori_peminjam' => 'required|string',
            'tgl_peminjaman' => 'required|date',
            'tgl_pengembalian' => 'required|date|after_or_equal:tgl_peminjaman',
            'keperluan' => 'required|string',
            'barang_id' => 'required|array|min:1',
            'barang_id.*' => 'required|integer',
            'jumlah' => 'required|array|min:1',
            'jumlah.*' => 'required|integer|min:1'
        ], [
            'nama_peminjam.required'    => 'Nama peminjam wajib diisi.',
            'kategori_peminjam.required'  => 'Kategori peminjam wajib dipilih.',
            'tgl_peminjaman.required'   => 'Tanggal pinjam wajib diisi.',
            'tgl_pengembalian.required' => 'Tanggal pengembalian wajib diisi.',
            'tgl_pengembalian.after_or_equal' => 'Tanggal pengembalian tidak boleh sebelum tanggal pinjam.',
            'keperluan.required'        => 'Keperluan peminjaman wajib diisi.',
            'barang_id.required'        => 'Pilih minimal satu barang untuk dipinjam.',
            'jumlah.*.min'              => 'Jumlah barang yang dipinjam minimal 1.',
        ]);
        DB::beginTransaction();
        try {
            $tglPinjam = Carbon::parse($request->tgl_peminjaman)->format('Y-m-d H:i:s');
            $tglKembali = Carbon::parse($request->tgl_pengembalian)->format('Y-m-d H:i:s');
            $peminjam = Peminjaman::create([
                'nama_peminjam' => $request->nama_peminjam,
                'kategori_peminjam' => $request->kategori_peminjam,
                'tgl_peminjaman' => $tglPinjam,
                'tgl_pengembalian' => $tglKembali,
                'keperluan' => $request->keperluan,
                'status' => 'pending'
            ]);
            $detailController = new DetailPeminjamanController();
            $detailResult = $detailController->storeDetail($peminjam->id, $request->barang_id, $request->jumlah);
            if (!$detailResult['status']) {
                DB::rollBack();
                return back()->withErrors([$detailResult['message']])->withInput();
            }
            DB::commit();
            return redirect()->back()->with('succes', 'Transaksi Peminjaman Berhasil');
        } catch (Exception $e) {
            DB::rollback();
            return back()->withErrors(['Terjadi Kesalahan Ketika Menyimpan Data :' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peminjaman = Peminjaman::with('detailPeminjaman.barang')->findOrFail($id);
        return view('serkom.detail_peminjaman', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::with('details')->findOrFail($id);
        $barangsList = Barangs::all();
        return view('serkom.edit_peminjaman', compact('peminjaman', 'barangsList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_peminjam'     => 'required|string|max:255',
            'kategori_peminjam' => 'required|string',
            'tgl_peminjaman'    => 'required|date',
            'tgl_pengembalian'  => 'required|date|after_or_equal:tgl_peminjaman',
            'keperluan'         => 'required|string',
            'status'            => 'required|in:pending,dipinjam,dikembalikan',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'nama_peminjam'     => $request->nama_peminjam,
            'kategori_peminjam' => $request->kategori_peminjam,
            'tgl_peminjaman'    => $request->tgl_peminjaman,
            'tgl_pengembalian'  => $request->tgl_pengembalian,
            'keperluan'         => $request->keperluan,
            'status'            => $request->status,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $peminjaman = Peminjaman::with('details')->findOrFail($id);

            // Hapus detail peminjaman terlebih dahulu (jika tidak ada CASCADE di DB)
            $peminjaman->details()->delete();
            $peminjaman->delete();

            DB::commit();
            return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function print($id)
    {
        $peminjaman = Peminjaman::with('details.barang')->findOrFail($id);
        return view('serkom.print', compact('peminjaman'));
    }
}
