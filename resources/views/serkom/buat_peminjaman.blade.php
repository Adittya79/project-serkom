<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB KELOLA BARANG - Buat Peminjaman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js untuk logika waktu & pencarian interaktif -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 flex min-h-screen" x-data="{ sidenav: true }">
    <!-- Sidebar Section -->
    <aside id="sidebar"
        class="bg-white min-h-screen shadow-xl px-4 w-60 shrink-0 transition-transform duration-300 ease-in-out"
        x-show="sidenav" @click.away="sidenav = false">
        <div class="space-y-6 md:space-y-8 mt-6">
            <!-- User Profile Section -->
            <div id="profile" class="space-y-3">
                <img src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                    alt="Avatar user" class="w-12 h-12 md:w-16 md:h-16 rounded-full mx-auto object-cover" />
                <div>
                    <h2 class="font-bold text-xs md:text-sm text-center text-blue-600 tracking-wide">
                        WEB KELOLA BARANG
                    </h2>
                    <p class="text-xs text-gray-500 text-center mt-1">Administrator Sekolah</p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav id="menu" class="flex flex-col space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 text-sm font-medium text-gray-700 py-2.5 px-3 hover:bg-blue-600 hover:text-white rounded-lg transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-grid-fill fill-current" viewBox="0 0 16 16">
                        <path
                            d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('inventory') }}"
                    class="flex items-center gap-3 text-sm font-medium text-gray-700 py-2.5 px-3 hover:bg-blue-600 hover:text-white rounded-lg transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-boxes fill-current" viewBox="0 0 16 16">
                        <path
                            d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                    </svg>
                    <span>Inventory</span>
                </a>
                <a href="{{ route('buat_peminjaman') }}"
                    class="flex items-center gap-3 text-sm font-medium text-gray-700 py-2.5 px-3 hover:bg-blue-600 hover:text-white rounded-lg transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-calendar-plus fill-current" viewBox="0 0 16 16">
                        <path
                            d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                    </svg>
                    <span>Buat Peminjaman</span>
                </a>
                <a href="{{ route('history') }}"
                    class="flex items-center gap-3 text-sm font-medium text-gray-700 py-2.5 px-3 hover:bg-blue-600 hover:text-white rounded-lg transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-clock-history fill-current inline-block h-6 w-6" viewBox="0 0 16 16">
                        <path
                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                        <path
                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                    </svg>
                    <span>History</span>
                </a>
                <a href="#"
                    class="flex items-center gap-3 text-sm font-medium text-red-600 py-2.5 px-3 hover:bg-red-50 hover:text-red-700 rounded-lg transition duration-150 ease-in-out mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-box-arrow-left fill-current" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                        <path fill-rule="evenodd"
                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    <span>Log Out</span>
                </a>
            </nav>
        </div>
    </aside>


    <!-- Main Content Area -->
    <main class="flex-1 p-6 lg:p-10" x-data="{
        tglPinjam: '',
        tglKembali: '',
        searchQuery: '',

        // Data Barang dari Database/Controller Laravel
        barangList: [
            { id: 1, kode: 'PRJ-001', name: 'Proyektor EPSON EB-X400', stok: 5, selected: false, qty: 1 },
            { id: 2, name: 'Kabel Roll 15 Meter', kode: 'KBL-015', stok: 10, selected: false, qty: 1 },
            { id: 3, name: 'Microphone Wireless', kode: 'MIC-002', stok: 8, selected: false, qty: 1 },
            { id: 4, name: 'Sound System Portable', kode: 'SND-001', stok: 3, selected: false, qty: 1 },
            { id: 5, name: 'Laptop Asus Core i5', kode: 'LTP-005', stok: 15, selected: false, qty: 1 },
            { id: 6, name: 'HDMI Cable 5 Meter', kode: 'HDM-005', stok: 12, selected: false, qty: 1 },
            { id: 7, name: 'Tripod Kamera Slik', kode: 'TRP-001', stok: 4, selected: false, qty: 1 }
        ],

        // Filter pencarian berdasarkan nama atau kode barang
        get filteredBarang() {
            if (!this.searchQuery) return this.barangList;
            return this.barangList.filter(b =>
                b.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                b.kode.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        },

        // Mengambil daftar barang yang centangnya diaktifkan
        get selectedBarang() {
            return this.barangList.filter(b => b.selected);
        },

        formatDateTime(dateObj) {
            const pad = (n) => n.toString().padStart(2, '0');
            return `${dateObj.getFullYear()}-${pad(dateObj.getMonth() + 1)}-${pad(dateObj.getDate())}T${pad(dateObj.getHours())}:${pad(dateObj.getMinutes())}`;
        },

        initWaktu() {
            const now = new Date();
            this.tglPinjam = this.formatDateTime(now);
            const tomorrow = new Date(now);
            tomorrow.setDate(tomorrow.getDate() + 1);
            this.tglKembali = this.formatDateTime(tomorrow);
        }
    }" x-init="initWaktu()">
        <div class="max-w-3xl mx-auto">
            <!-- Header Section -->
            <header class="mb-6">
                <div
                    class="bg-white p-4 md:p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <button @click="sidenav = !sidenav"
                            class="p-2 bg-gray-50 hover:bg-gray-100 rounded-lg border border-gray-200 text-gray-600 focus:outline-none md:hidden transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-lg md:text-xl font-bold text-gray-800 tracking-wide">Form Transaksi
                                Peminjaman</h1>
                            <p class="text-xs text-gray-500 mt-0.5">Pengajuan peminjaman barang inventaris sekolah</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Form Card -->
            <form action="#" method="POST" class="bg-white p-6 md:p-8 rounded-xl shadow-md space-y-6">
                @csrf

                <!-- Informasi Peminjam -->
                <div class="border-b border-gray-200 pb-5">
                    <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full inline-block"></span>
                        Data Peminjam
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="nama_peminjam">
                                Nama Peminjam
                            </label>
                            <input
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                type="text" id="nama_peminjam" name="nama_peminjam"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="status_peminjam">
                                Kategori Peminjam
                            </label>
                            <select id="status_peminjam" name="status_peminjam"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                                required>
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="Siswa">Siswa</option>
                                <option value="Guru">Guru / Staf</option>
                                <option value="Organisasi">Organisasi / Ekstrakurikuler</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Informasi Waktu Otomatis -->
                <div class="border-b border-gray-200 pb-5">
                    <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full inline-block"></span>
                        Waktu & Tujuan Peminjaman
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="tgl_pinjam">
                                Tanggal & Waktu Pinjam <span class="text-xs text-blue-600 font-normal">(Otomatis Hari
                                    Ini)</span>
                            </label>
                            <input x-model="tglPinjam"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50"
                                type="datetime-local" id="tgl_pinjam" name="tgl_pinjam" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="tgl_kembali">
                                Rencana Pengembalian
                            </label>
                            <input x-model="tglKembali"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                type="datetime-local" id="tgl_kembali" name="tgl_kembali" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="keperluan">
                            Keperluan / Catatan
                        </label>
                        <textarea id="keperluan" name="keperluan" rows="2"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="Contoh: Kegiatan presentasi tugas kelompok XI RPL 2" required></textarea>
                    </div>
                </div>

                <!-- Modul Pencarian & Pemilihan Barang Interaktif -->
                <div>
                    <h2 class="text-base font-bold text-gray-800 mb-1 flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full inline-block"></span>
                        Pilih Barang yang Dipinjam
                    </h2>
                    <p class="text-xs text-gray-500 mb-3">Cari barang berdasarkan nama/kode lalu centang untuk
                        meminjam.</p>

                    <!-- Input Pencarian Real-time -->
                    <div class="relative mb-4">
                        <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" x-model="searchQuery" placeholder="Cari nama atau kode barang..."
                            class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none">
                    </div>

                    <!-- Area Scrollable Daftar Barang (Sangat Nyaman Digunakan Meski Data Ribuan) -->
                    <div
                        class="max-h-60 overflow-y-auto border border-gray-200 rounded-lg p-2 bg-gray-50 space-y-2 mb-6">
                        <template x-for="(barang, index) in filteredBarang" :key="barang.id">
                            <label class="flex items-center justify-between p-3 rounded-md cursor-pointer transition"
                                :class="barang.selected ? 'bg-blue-50 border border-blue-400' :
                                    'bg-white border border-gray-200 hover:bg-gray-100'">

                                <div class="flex items-center gap-3">
                                    <input type="checkbox" x-model="barang.selected"
                                        class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500 cursor-pointer">
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800" x-text="barang.name"></p>
                                        <p class="text-xs text-gray-500">
                                            Kode: <span class="font-mono" x-text="barang.kode"></span> | Stok: <span
                                                class="font-semibold" x-text="barang.stok"></span> Unit
                                        </p>
                                    </div>
                                </div>

                                <span x-show="barang.selected"
                                    class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-0.5 rounded">
                                    Dipilih
                                </span>
                            </label>
                        </template>

                        <!-- Jika pencarian tidak ketemu -->
                        <div x-show="filteredBarang.length === 0" class="text-center py-4 text-sm text-gray-500">
                            Barang yang dicari tidak ditemukan.
                        </div>
                    </div>

                    <!-- Ringkasan Barang Terpilih & Pengaturan Jumlah Unit -->
                    <div class="border-t border-gray-200 pt-4" x-show="selectedBarang.length > 0" x-transition>
                        <h3 class="text-sm font-bold text-gray-700 mb-3 flex items-center justify-between">
                            <span>Daftar Barang Terpilih</span>
                            <span class="text-xs bg-blue-600 text-white px-2 py-0.5 rounded-full"
                                x-text="`${selectedBarang.length} Barang`"></span>
                        </h3>

                        <div class="space-y-3">
                            <template x-for="(barang, idx) in selectedBarang" :key="barang.id">
                                <div
                                    class="flex items-center justify-between p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-blue-950" x-text="barang.name"></p>
                                        <!-- Input tersembunyi yang dikirim ke Backend Laravel -->
                                        <input type="hidden" :name="`items[${idx}][barang_id]`"
                                            :value="barang.id">
                                    </div>

                                    <!-- Input Jumlah Unit -->
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center gap-1.5">
                                            <label class="text-xs font-semibold text-gray-600">Jumlah:</label>
                                            <input type="number" :name="`items[${idx}][jumlah]`" x-model="barang.qty"
                                                min="1" :max="barang.stok"
                                                class="w-16 px-2 py-1 border border-blue-300 rounded text-sm text-center font-bold text-blue-800 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                required>
                                        </div>

                                        <!-- Tombol Hapus Pilihan -->
                                        <button type="button" @click="barang.selected = false"
                                            class="text-red-500 hover:text-red-700 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" :disabled="selectedBarang.length === 0"
                        :class="selectedBarang.length === 0 ? 'bg-gray-300 cursor-not-allowed' :
                            'bg-blue-600 hover:bg-blue-700 shadow-md'"
                        class="w-full text-white font-semibold py-3 px-4 rounded-lg focus:ring-4 focus:ring-blue-200 transition duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        Simpan & Ajukan Peminjaman
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
