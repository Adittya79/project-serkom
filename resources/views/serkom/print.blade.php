<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Peminjaman - {{ $peminjaman->nama_peminjam }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="p-8 bg-white text-gray-800" onload="window.print()">

    <div class="max-w-2xl mx-auto border p-8 rounded-lg">
        <!-- Header Dokumen -->
        <div class="text-center border-b pb-4 mb-6">
            <h1 class="text-2xl font-bold uppercase">BUKTI PEMINJAMAN BARANG</h1>
            <p class="text-sm text-gray-500">Sistem Manajemen Inventaris & Peminjaman</p>
        </div>

        <!-- Detail Informasi -->
        <table class="w-full text-sm mb-6">
            <tr>
                <td class="font-semibold py-1 w-1/3">Nama Peminjam</td>
                <td>: {{ $peminjaman->nama_peminjam }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-1">Kategori</td>
                <td>: {{ $peminjaman->kategori_peminjam }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-1">Tanggal Pinjam</td>
                <td>: {{ \Carbon\Carbon::parse($peminjaman->tgl_peminjaman)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-1">Tanggal Kembali</td>
                <td>: {{ \Carbon\Carbon::parse($peminjaman->tgl_pengembalian)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td class="font-semibold py-1">Keperluan</td>
                <td>: {{ $peminjaman->keperluan }}</td>
            </tr>
        </table>

        <!-- List Barang -->
        <h3 class="font-bold text-sm mb-2">Daftar Barang Dipinjam:</h3>
        <table class="w-full text-sm border-collapse border border-gray-300 mb-8">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2 text-left">No</th>
                    <th class="border border-gray-300 p-2 text-left">Nama Barang</th>
                    <th class="border border-gray-300 p-2 text-center">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman->details as $index => $detail)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 p-2">{{ $detail->barang->nama_barang ?? 'Barang' }}</td>
                        <td class="border border-gray-300 p-2 text-center">{{ $detail->jumlah }} Unit</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tanda Tangan -->
        <div class="grid grid-cols-2 text-center text-sm mt-12">
            <div>
                <p>Peminjam,</p>
                <br><br><br>
                <p class="font-semibold">{{ $peminjaman->nama_peminjam }}</p>
            </div>
            <div>
                <p>Petugas Inventaris,</p>
                <br><br><br>
                <p class="font-semibold">(...........................) </p>
            </div>
        </div>
    </div>

    <!-- Tombol Manual Print -->
    <div class="text-center mt-6 no-print">
        <button onclick="window.print()" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Cetak
            Ulang</button>
    </div>

</body>

</html>
