<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB KELOLA BARANG - Buat Peminjaman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 flex h-screen overflow-hidden text-gray-800" x-data="{ sidenav: false }">

    <!-- Overlay Latar Belakang (Mobile Only) -->
    <div x-show="sidenav" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="sidenav = false" class="fixed inset-0 bg-black/50 z-20 md:hidden"
        x-cloak></div>

    <!-- Sidebar Section -->
    <aside id="sidebar"
        class="fixed md:sticky top-0 left-0 bg-white h-screen overflow-y-auto shadow-xl px-4 w-64 md:w-60 shrink-0 z-30 transition-transform duration-300 ease-in-out"
        :class="sidenav ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

        <div class="flex flex-col justify-between h-full py-6">
            <div class="space-y-6 md:space-y-8">
                <!-- User Profile Section -->
                <div id="profile" class="space-y-3">
                    <img src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&auto=format&fit=crop&w=880&q=80"
                        alt="Avatar user"
                        class="w-14 h-14 md:w-16 md:h-16 rounded-full mx-auto object-cover border-2 border-blue-500/20 shadow-sm" />
                    <div>
                        <h2 class="font-bold text-xs md:text-sm text-center text-blue-600 tracking-wide">
                            WEB KELOLA BARANG
                        </h2>
                        <p class="text-xs text-gray-500 text-center mt-0.5">Administrator Sekolah</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav id="menu" class="flex flex-col space-y-1">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 text-sm font-medium py-2.5 px-3 rounded-lg transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-grid-fill shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <!-- Inventory -->
                    <a href="{{ route('inventory') }}"
                        class="flex items-center gap-3 text-sm font-medium py-2.5 px-3 rounded-lg transition duration-150 ease-in-out {{ request()->routeIs('inventory*') ? 'bg-blue-600 text-white shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-boxes shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                        </svg>
                        <span>Inventory</span>
                    </a>

                    <!-- Buat Peminjaman -->
                    <a href="{{ route('buat_peminjaman') }}"
                        class="flex items-center gap-3 text-sm font-medium py-2.5 px-3 rounded-lg transition duration-150 ease-in-out {{ request()->routeIs('buat_peminjaman*') ? 'bg-blue-600 text-white shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-calendar-plus shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>
                        <span>Buat Peminjaman</span>
                    </a>

                </nav>
            </div>

            <!-- Form Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 text-sm font-medium text-red-600 py-2.5 px-3 hover:bg-red-50 hover:text-red-700 rounded-lg transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-box-arrow-left shrink-0" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                        <path fill-rule="evenodd"
                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    <span>Log Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-3 sm:p-6 md:p-8 lg:p-10 w-full h-screen overflow-y-auto" x-data="{
        tglPinjam: '',
        tglKembali: '',
        searchQuery: '',
        barangsList: {{ Js::from(
            $barangsList->map(function ($b) {
                return [
                    'id' => $b->id,
                    'name' => $b->nama_barang,
                    'stok' => $b->stok,
                    'selected' => false,
                    'qty' => 1,
                ];
            }),
        ) }},

        get filteredBarang() {
            return !this.searchQuery ?
                this.barangsList :
                this.barangsList.filter(b => b.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
        },

        get selectedBarang() {
            return this.barangsList.filter(b => b.selected);
        },

        init() {
            const pad = (n) => n.toString().padStart(2, '0');
            const now = new Date();
            this.tglPinjam = `${now.getFullYear()}-${pad(now.getMonth() + 1)}-${pad(now.getDate())}T${pad(now.getHours())}:${pad(now.getMinutes())}`;

            const tomorrow = new Date(now);
            tomorrow.setDate(tomorrow.getDate() + 1);
            this.tglKembali = `${tomorrow.getFullYear()}-${pad(tomorrow.getMonth() + 1)}-${pad(tomorrow.getDate())}T${pad(tomorrow.getHours())}:${pad(tomorrow.getMinutes())}`;
        }
    }">
        <div class="max-w-3xl mx-auto pb-12">
            <!-- Header Section -->
            <header class="mb-4 sm:mb-6">
                <div
                    class="bg-white p-3.5 sm:p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <button @click="sidenav = !sidenav"
                            class="p-2 bg-gray-50 hover:bg-gray-100 rounded-lg border border-gray-200 text-gray-600 focus:outline-none md:hidden transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 tracking-wide">Form
                                Transaksi Peminjaman</h1>
                            <p class="text-xs text-gray-500 mt-0.5">Pengajuan peminjaman barang inventaris sekolah</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Form Card -->
            <form action="{{ route('peminjaman.store') }}" method="POST"
                class="bg-white p-4 sm:p-6 md:p-8 rounded-xl shadow-md space-y-5 sm:space-y-6">
                @csrf

                <!-- Notifikasi Error Validasi -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm space-y-1">
                        <p class="font-bold">Terjadi kesalahan input:</p>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Notifikasi Sukses -->
                @if (session('success') || session('succes'))
                    <div
                        class="bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded-lg text-sm font-medium">
                        {{ session('success') ?? session('succes') }}
                    </div>
                @endif

                <!-- Informasi Peminjam -->
                <div class="border-b border-gray-200 pb-5">
                    <h2 class="text-sm sm:text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 bg-blue-600 rounded-full inline-block shrink-0"></span>
                        Data Peminjam
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1.5"
                                for="nama_peminjam">
                                Nama Peminjam
                            </label>
                            <input
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                type="text" id="nama_peminjam" name="nama_peminjam"
                                value="{{ old('nama_peminjam') }}" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1.5"
                                for="kategori_peminjam">
                                Kategori Peminjam
                            </label>
                            <select id="kategori_peminjam" name="kategori_peminjam"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white"
                                required>
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="Siswa" {{ old('kategori_peminjam') == 'Siswa' ? 'selected' : '' }}>
                                    Siswa
                                </option>
                                <option value="Guru" {{ old('kategori_peminjam') == 'Guru' ? 'selected' : '' }}>
                                    Guru / Staf
                                </option>
                                <option value="Organisasi"
                                    {{ old('kategori_peminjam') == 'Organisasi' ? 'selected' : '' }}>
                                    Organisasi / Ekstrakurikuler
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Informasi Waktu & Tujuan -->
                <div class="border-b border-gray-200 pb-5">
                    <h2 class="text-sm sm:text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 bg-blue-600 rounded-full inline-block shrink-0"></span>
                        Waktu & Tujuan Peminjaman
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1.5"
                                for="tgl_pinjam">
                                Tanggal & Waktu Pinjam
                            </label>
                            <input x-model="tglPinjam"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50"
                                type="datetime-local" id="tgl_pinjam" name="tgl_peminjaman" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1.5"
                                for="tgl_kembali">
                                Rencana Pengembalian
                            </label>
                            <input x-model="tglKembali"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                type="datetime-local" id="tgl_kembali" name="tgl_pengembalian" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs sm:text-sm font-semibold mb-1.5" for="keperluan">
                            Keperluan / Catatan
                        </label>
                        <textarea id="keperluan" name="keperluan" rows="2"
                            class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="Contoh: Kegiatan presentasi tugas kelompok" required>{{ old('keperluan') }}</textarea>
                    </div>
                </div>

                <!-- Modul Pemilihan Barang Interaktif -->
                <div>
                    <div class="flex flex-wrap items-center justify-between gap-1 mb-2">
                        <h2 class="text-sm sm:text-base font-bold text-gray-800 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 bg-blue-600 rounded-full inline-block shrink-0"></span>
                            Pilih Barang yang Dipinjam
                        </h2>
                        <span class="text-xs text-gray-500 font-normal">
                            Dipilih: <strong class="text-blue-600 font-bold" x-text="selectedBarang.length"></strong>
                            barang
                        </span>
                    </div>

                    <!-- Input Pencarian -->
                    <div class="relative mb-3">
                        <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" x-model="searchQuery" placeholder="Cari nama barang..."
                            class="w-full pl-9 pr-8 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:outline-none transition">
                        <button type="button" x-show="searchQuery" @click="searchQuery = ''"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Area List Pilih Barang -->
                    <div
                        class="max-h-60 sm:max-h-64 overflow-y-auto border border-gray-200 rounded-xl p-2 bg-gray-50/50 space-y-2 mb-5">
                        <template x-for="barang in filteredBarang" :key="barang.id">
                            <div @click="barang.selected = !barang.selected"
                                class="flex items-center justify-between p-2.5 sm:p-3 rounded-lg border cursor-pointer transition select-none"
                                :class="barang.selected ? 'bg-blue-50/80 border-blue-500' :
                                    'bg-white border-gray-200 hover:border-gray-300'">

                                <div class="flex items-center gap-2.5 sm:gap-3">
                                    <input type="checkbox" :checked="barang.selected"
                                        class="w-4 h-4 text-blue-600 rounded border-gray-300 pointer-events-none shrink-0">
                                    <div>
                                        <p class="text-xs sm:text-sm font-bold text-gray-800 leading-snug"
                                            x-text="barang.name"></p>
                                        <span class="text-[11px] sm:text-xs text-gray-500">
                                            Stok Tersedia: <strong x-text="barang.stok"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Jika Data Kosong -->
                        <div x-show="filteredBarang.length === 0"
                            class="text-center py-8 text-xs sm:text-sm text-gray-500">
                            <p class="font-medium">Barang tidak ditemukan / stok habis</p>
                        </div>
                    </div>

                    <!-- Ringkasan Barang Terpilih & Form Input Array -->
                    <div class="border-t border-gray-200 pt-4" x-show="selectedBarang.length > 0" x-transition>
                        <h3 class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-gray-500 mb-3">
                            Atur Jumlah Barang Pinjaman
                        </h3>

                        <div class="space-y-2.5">
                            <template x-for="barang in selectedBarang" :key="barang.id">
                                <div
                                    class="flex flex-col sm:flex-row sm:items-center justify-between p-3 bg-white border border-blue-200 rounded-lg shadow-sm gap-2.5 sm:gap-0">
                                    <div class="flex-1 pr-2">
                                        <p class="text-xs sm:text-sm font-bold text-gray-800 leading-snug"
                                            x-text="barang.name"></p>
                                        <input type="hidden" name="barang_id[]" :value="barang.id">
                                    </div>

                                    <div class="flex items-center justify-between sm:justify-end gap-3 shrink-0">
                                        <div
                                            class="flex items-center border border-gray-300 rounded-lg overflow-hidden bg-gray-50">
                                            <button type="button" @click="if(barang.qty > 1) barang.qty--"
                                                class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-200 font-bold text-sm active:bg-gray-300"
                                                :disabled="barang.qty <= 1">-</button>

                                            <input type="number" name="jumlah[]" x-model.number="barang.qty"
                                                min="1" :max="barang.stok"
                                                class="w-12 h-8 text-center text-xs sm:text-sm font-bold bg-white text-blue-900 focus:outline-none border-x border-gray-200"
                                                required>

                                            <button type="button" @click="if(barang.qty < barang.stok) barang.qty++"
                                                class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-200 font-bold text-sm active:bg-gray-300"
                                                :disabled="barang.qty >= barang.stok">+</button>
                                        </div>

                                        <button type="button" @click="barang.selected = false"
                                            class="text-gray-400 hover:text-red-600 p-2 transition rounded-lg hover:bg-red-50"
                                            title="Hapus barang">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" :disabled="selectedBarang.length === 0"
                        :class="selectedBarang.length === 0 ? 'bg-gray-300 cursor-not-allowed' :
                            'bg-blue-600 hover:bg-blue-700 shadow-md active:scale-[0.99]'"
                        class="w-full text-white font-semibold py-3 px-4 rounded-lg focus:ring-4 focus:ring-blue-200 transition duration-200 flex items-center justify-center gap-2 text-sm sm:text-base">
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
