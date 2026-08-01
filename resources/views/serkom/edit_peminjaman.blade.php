<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB KELOLA BARANG - Edit Peminjaman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen md:h-screen md:overflow-hidden text-gray-800 flex flex-col md:flex-row"
    x-data="{ sidenav: false }">

    <!-- Overlay Latar Belakang (Mobile Only) -->
    <div x-show="sidenav" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="sidenav = false" class="fixed inset-0 bg-black/50 z-40 md:hidden"
        x-cloak></div>

    <!-- Sidebar Section -->
    <aside id="sidebar"
        class="fixed md:sticky top-0 left-0 bg-white h-screen overflow-y-auto shadow-xl px-4 w-64 shrink-0 z-50 transition-transform duration-300 ease-in-out md:translate-x-0"
        :class="sidenav ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

        <div class="flex flex-col justify-between h-full py-6">
            <div class="space-y-6 md:space-y-8">
                <!-- User Profile Section -->
                <div id="profile" class="space-y-3 text-center">
                    <img src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&auto=format&fit=crop&w=880&q=80"
                        alt="Avatar user"
                        class="w-12 h-12 md:w-16 md:h-16 rounded-full mx-auto object-cover border-2 border-blue-500/20" />
                    <div>
                        <h2 class="font-bold text-xs md:text-sm text-blue-600 tracking-wide">
                            WEB KELOLA BARANG
                        </h2>
                        <p class="text-xs text-gray-500 mt-0.5">Administrator Sekolah</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav id="menu" class="flex flex-col space-y-1">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 text-sm font-medium py-2.5 px-3 rounded-lg transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-grid-fill" viewBox="0 0 16 16">
                            <path
                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <!-- Inventory -->
                    <a href="{{ route('inventory') }}"
                        class="flex items-center gap-3 text-sm font-medium py-2.5 px-3 rounded-lg transition duration-150 ease-in-out {{ request()->routeIs('inventory*') ? 'bg-blue-600 text-white shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-boxes" viewBox="0 0 16 16">
                            <path
                                d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                        </svg>
                        <span>Inventory</span>
                    </a>

                    <!-- Buat Peminjaman -->
                    <a href="{{ route('buat_peminjaman') }}"
                        class="flex items-center gap-3 text-sm font-medium py-2.5 px-3 rounded-lg transition duration-150 ease-in-out {{ request()->routeIs('buat_peminjaman*') ? 'bg-blue-600 text-white shadow-sm' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-calendar-plus" viewBox="0 0 16 16">
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
            <form method="POST" action="{{ route('logout') }}" class="mt-auto pt-4 border-t border-gray-100">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 text-sm font-medium text-red-600 py-2.5 px-3 hover:bg-red-50 hover:text-red-700 rounded-lg transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-box-arrow-left" viewBox="0 0 16 16">
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
    <main class="flex-1 p-4 sm:p-6 lg:p-8 w-full md:h-screen md:overflow-y-auto" x-data="{
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
        <div class="max-w-4xl mx-auto pb-10">
            <!-- Header Section -->
            <header class="mb-6">
                <div
                    class="bg-white p-4 sm:p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <button @click="sidenav = !sidenav"
                            class="p-2 bg-gray-50 hover:bg-gray-100 rounded-lg border border-gray-200 text-gray-600 focus:outline-none md:hidden transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 tracking-wide">
                                Form Edit Peminjaman
                            </h1>
                            <p class="text-xs text-gray-500 mt-0.5">Perbarui data pengajuan peminjaman barang</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Form Card -->
            <div class="bg-white p-4 sm:p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-lg sm:text-xl font-bold text-gray-800 mb-6">Edit Data Peminjaman</h2>

                <form action="{{ route('update', $peminjaman->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Nama Peminjam -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam"
                                value="{{ old('nama_peminjam', $peminjaman->nama_peminjam) }}"
                                class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition">
                        </div>

                        <!-- Kategori Peminjam -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Peminjam</label>
                            <input type="text" name="kategori_peminjam"
                                value="{{ old('kategori_peminjam', $peminjaman->kategori_peminjam) }}"
                                class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition">
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pinjam</label>
                            <input type="date" name="tgl_peminjaman"
                                value="{{ old('tgl_peminjaman', $peminjaman->tgl_peminjaman) }}"
                                class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition">
                        </div>

                        <!-- Tanggal Pengembalian -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengembalian</label>
                            <input type="date" name="tgl_pengembalian"
                                value="{{ old('tgl_pengembalian', $peminjaman->tgl_pengembalian) }}"
                                class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition">
                        </div>

                        <!-- Status -->
                        <div class="sm:col-span-2 md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status"
                                class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition">
                                <option value="pending" {{ $peminjaman->status == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>
                                    Dipinjam</option>
                                <option value="dikembalikan"
                                    {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            </select>
                        </div>

                        <!-- Keperluan -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Keperluan</label>
                            <textarea name="keperluan" rows="3"
                                class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition">{{ old('keperluan', $peminjaman->keperluan) }}</textarea>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex flex-col-reverse sm:flex-row justify-end gap-3">
                        <a href="{{ route('dashboard') }}"
                            class="w-full sm:w-auto text-center px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="w-full sm:w-auto px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 shadow-sm transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>
