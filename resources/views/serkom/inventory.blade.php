<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB KELOLA BARANG</title>

    <!-- Tailwind / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js CDN (Dipastikan bekerja mandiri) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="h-full bg-gray-100 antialiased text-gray-800" x-data="{ sidenav: false }">
    <!-- Main Layout Wrapper -->
    <div class="min-h-screen flex flex-col relative">

        <!-- Mobile Backdrop Overlay -->
        <div x-show="sidenav" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="sidenav = false"
            class="fixed inset-0 bg-gray-900/60 z-40 md:hidden" x-cloak></div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed top-0 left-0 h-screen bg-white shadow-xl px-4 w-64 shrink-0 z-50 transition-transform duration-300 ease-in-out md:translate-x-0"
            :class="sidenav ? 'translate-x-0' : '-translate-x-full'" x-cloak>

            <div class="flex flex-col justify-between h-full py-6 overflow-y-auto">
                <div class="space-y-6">
                    <!-- User Profile Section -->
                    <div id="profile" class="space-y-3">
                        <img src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&auto=format&fit=crop&w=880&q=80"
                            alt="Avatar user"
                            class="w-14 h-14 md:w-16 md:h-16 rounded-full mx-auto object-cover border-2 border-blue-500/20 shadow-sm" />
                        <div>
                            <h2 class="font-bold text-sm text-center text-blue-600 tracking-wide">
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

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="mt-auto pt-6 border-t border-gray-100">
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
        <div class="flex-1 flex flex-col min-w-0 min-h-screen md:ml-64">

            <!-- Sticky Top Header -->
            <header class="sticky top-0 z-30 bg-white border-b border-gray-200/80 px-4 sm:px-6 py-3.5 shadow-sm">
                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <!-- Hamburger Button (Mobile Only) -->
                        <button type="button" @click="sidenav = !sidenav"
                            class="p-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500/20 md:hidden shrink-0 transition cursor-pointer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div>
                            <h1
                                class="text-base sm:text-lg md:text-xl font-bold text-gray-800 tracking-tight leading-tight">
                                INVENTORY BARANG
                            </h1>
                            <p class="text-[11px] sm:text-xs text-gray-500 mt-0.5">Seluruh Stok Barang Berada Di Sini
                            </p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Container -->
            <main class="p-3 sm:p-5 md:p-6 space-y-6 flex-1">

                <!-- Cards Grid Section -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 pt-2">

                    <!-- Card 1: Total Stok -->
                    <div
                        class="relative flex flex-col bg-white text-gray-700 shadow-sm rounded-xl border border-gray-100">
                        <div
                            class="bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/20 shadow-lg absolute -mt-4 mx-4 rounded-xl grid h-12 w-12 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM2.25 7.93v8.55a.75.75 0 00.372.648L11.25 22.18v-9l-9-5.25z" />
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p class="text-xs sm:text-sm font-normal text-gray-600">Total Stok Aset</p>
                            <h4 class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">
                                {{ number_format($totalAset ?? 0) }}
                            </h4>
                        </div>
                        <div class="border-t border-gray-100 p-3 sm:p-4 mt-auto">
                            <p class="text-xs text-gray-500">Total jumlah stok seluruh barang</p>
                        </div>
                    </div>

                    <!-- Card 2: Sedang Dipinjam -->
                    <div
                        class="relative flex flex-col bg-white text-gray-700 shadow-sm rounded-xl border border-gray-100">
                        <div
                            class="bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/20 shadow-lg absolute -mt-4 mx-4 rounded-xl grid h-12 w-12 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25H21A.75.75 0 0121.75 6.375v12a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 18.375v-12A.75.75 0 013 5.625h4.5v-2.25zm1.5 0v2.25h6v-2.25a.375.375 0 00-.375-.375h-5.25a.375.375 0 00-.375.375z" />
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p class="text-xs sm:text-sm font-normal text-gray-600">Sedang Dipinjam</p>
                            <h4 class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">42</h4>
                        </div>
                        <div class="border-t border-gray-100 p-3 sm:p-4 mt-auto">
                            <p class="text-xs text-gray-500"><strong class="text-blue-600 font-semibold">8
                                    aktif</strong> dipinjam minggu ini</p>
                        </div>
                    </div>

                    <!-- Card 3: Rusak / Perbaikan -->
                    <div
                        class="relative flex flex-col bg-white text-gray-700 shadow-sm rounded-xl border border-gray-100">
                        <div
                            class="bg-gradient-to-tr from-amber-600 to-amber-400 text-white shadow-amber-500/20 shadow-lg absolute -mt-4 mx-4 rounded-xl grid h-12 w-12 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.215-.235.235l-1.072.178c-.904.151-1.567.933-1.567 1.85v.081c0 .414-.336.75-.75.75h-.082c-.917 0-1.699.663-1.85 1.567l-.178 1.072a.236.236 0 01-.235.235l-1.072.178c-.904.151-1.567.933-1.567 1.85v.858c0 .917.663 1.699 1.567 1.85l1.072.178c.12.02.215.115.235.235l.178 1.072c.151.904.933 1.567 1.85 1.567h.082c.414 0 .75.336.75.75v.082c0 .917.663 1.699 1.85 1.85l1.072.178c.12.02.215.115.235.235l.178 1.072c.151.904.933 1.567 1.85 1.567h.858c.917 0 1.699-.663 1.85-1.567l.178-1.072a.236.236 0 01.235-.235l1.072-.178c.904-.151 1.567-.933 1.567-1.85v-.082c0-.414.336-.75.75-.75h.082c.917 0 1.699-.663 1.85-1.567l.178-1.072a.236.236 0 01.235-.235l1.072-.178c.904-.151 1.567-.933 1.567-1.85v-.858c0-.917-.663-1.699-1.567-1.85l-1.072-.178a.236.236 0 01-.235-.235l-.178-1.072c-.151-.904-.933-1.567-1.85-1.567h-.082a.75.75 0 01-.75-.75v-.082c0-.917-.663-1.699-1.85-1.85l-1.072-.178a.236.236 0 01-.235-.235l-.178-1.072c-.151-.904-.933-1.567-1.85-1.567h-.858zM12 15a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p class="text-xs sm:text-sm font-normal text-gray-600">Rusak / Perbaikan</p>
                            <h4 class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">15</h4>
                        </div>
                        <div class="border-t border-gray-100 p-3 sm:p-4 mt-auto">
                            <p class="text-xs text-gray-500"><strong class="text-amber-600 font-semibold">3
                                    item</strong> perlu perbaikan</p>
                        </div>
                    </div>

                    <!-- Card 4: Kategori Aset -->
                    <div
                        class="relative flex flex-col bg-white text-gray-700 shadow-sm rounded-xl border border-gray-100">
                        <div
                            class="bg-gradient-to-tr from-purple-600 to-purple-400 text-white shadow-purple-500/20 shadow-lg absolute -mt-4 mx-4 rounded-xl grid h-12 w-12 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M19.5 21a3 3 0 003-3v-4.5a3 3 0 00-3-3h-15a3 3 0 00-3 3V18a3 3 0 003 3h15zM1.5 10.125a3 3 0 013-3h15a3 3 0 013 3V6a3 3 0 00-3-3h-6A3 3 0 0012 1.5H4.5A3 3 0 001.5 4.5v5.625z" />
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p class="text-xs sm:text-sm font-normal text-gray-600">Kategori Aset</p>
                            <h4 class="text-xl sm:text-2xl font-bold text-gray-900 mt-1">12</h4>
                        </div>
                        <div class="border-t border-gray-100 p-3 sm:p-4 mt-auto">
                            <p class="text-xs text-gray-500">Elektronik, Mebel, DLL</p>
                        </div>
                    </div>

                </div>

                <!-- Action Bar (Buttons + Search) -->
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-3 bg-white p-3.5 sm:p-4 rounded-xl shadow-sm border border-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 w-full md:w-auto">
                        <a href="{{ route('buat_peminjaman') }}"
                            class="inline-flex justify-center items-center rounded-lg bg-blue-600 py-2.5 px-4 text-xs font-bold uppercase text-white shadow-sm transition hover:bg-blue-700 active:scale-[0.98]">
                            + Buat Peminjaman
                        </a>
                        <a href="{{ route('buat_barang') }}"
                            class="inline-flex justify-center items-center rounded-lg bg-blue-600 py-2.5 px-4 text-xs font-bold uppercase text-white shadow-sm transition hover:bg-blue-700 active:scale-[0.98]">
                            + Tambah Barang
                        </a>
                    </div>

                    <!-- Search Input -->
                    <form action="#" method="GET" class="w-full md:w-72 relative">
                        <input name="search" value="{{ request('search') }}"
                            class="bg-white w-full pr-10 pl-3.5 py-2 text-slate-700 text-sm border border-slate-300 rounded-lg transition focus:outline-none focus:border-blue-500 shadow-sm"
                            placeholder="Cari barang..." />
                        <button
                            class="absolute h-8 w-8 right-1 top-1 flex items-center justify-center text-slate-400 hover:text-blue-600"
                            type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Katalog Barang Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5">

                    @forelse($barangs as $barang)
                        <div
                            class="flex flex-col rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition duration-200 overflow-hidden h-full">

                            <!-- Image Display -->
                            <div class="relative h-44 w-full bg-gray-100 shrink-0">
                                <img src="{{ $barang->image ? asset('storage/' . $barang->image) : 'https://images.unsplash.com/photo-1584438784894-089d6a62b8fa?auto=format&fit=crop&w=800&q=80' }}"
                                    alt="{{ $barang->nama_barang }}" class="w-full h-full object-cover" />

                                @if ($barang->stok > 0)
                                    <span
                                        class="absolute top-2.5 right-2.5 bg-emerald-500 text-white text-[10px] font-semibold px-2 py-0.5 rounded-full uppercase tracking-wider shadow-sm">
                                        Tersedia
                                    </span>
                                @else
                                    <span
                                        class="absolute top-2.5 right-2.5 bg-red-500 text-white text-[10px] font-semibold px-2 py-0.5 rounded-full uppercase tracking-wider shadow-sm">
                                        Habis
                                    </span>
                                @endif
                            </div>

                            <!-- Card Body -->
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wider">
                                        {{ $barang->kategori_barang ?? 'Umum' }}
                                    </span>
                                    <h3 class="font-bold text-gray-800 text-sm mt-0.5 line-clamp-1"
                                        title="{{ $barang->nama_barang }}">
                                        {{ $barang->nama_barang }}
                                    </h3>
                                    <p class="text-xs text-gray-500 mt-1 line-clamp-2">
                                        {{ $barang->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}
                                    </p>
                                </div>

                                <div
                                    class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between gap-2">
                                    <div class="text-xs text-gray-500">
                                        Stok: <span class="font-semibold text-gray-700">{{ $barang->stok }}
                                            Unit</span>
                                    </div>

                                    <div class="flex items-center gap-1.5 shrink-0">
                                        <a href="{{ route('editBarang', $barang->id) }}"
                                            class="text-xs bg-amber-500 hover:bg-amber-600 text-white px-2.5 py-1.5 rounded-md font-medium transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('hapus.barang', $barang->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-xs bg-red-600 hover:bg-red-700 text-white px-2.5 py-1.5 rounded-md font-medium transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 bg-white rounded-xl border border-gray-100 px-4">
                            <p class="text-gray-500 text-sm font-medium">Belum ada data barang di dalam inventaris.</p>
                        </div>
                    @endforelse

                </div>

            </main>
        </div>
    </div>

    <!-- Script penunjang untuk memastikan AlpineJS terinisialisasi secara otomatis jika tertahan -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.Alpine && !window.Alpine.initialized) {
                window.Alpine.start();
            }
        });
    </script>
</body>

</html>
