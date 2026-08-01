<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB KELOLA BARANG</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS CDN Fallback untuk memastikan Toggle Mobile berfungsi -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-poppins antialiased min-h-screen bg-gray-50 text-gray-800">

    <!-- Wrapper Utama dengan State Sidebar Default FALSE -->
    <div id="view" class="min-h-screen w-full flex flex-col md:flex-row relative" x-data="{ sidenav: false }">

        <!-- Mobile Backdrop (Latar Gelap saat Sidebar Buka di HP) -->
        <div x-show="sidenav" x-cloak x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="sidenav = false"
            class="fixed inset-0 bg-gray-900/50 z-40 md:hidden">
        </div>

        <!-- Sidebar Responsive -->
        <aside id="sidebar"
            class="fixed md:sticky top-0 left-0 bg-white h-screen overflow-y-auto shadow-2xl md:shadow-none px-4 w-64 shrink-0 z-50 transition-transform duration-300 ease-in-out -translate-x-full md:translate-x-0"
            :class="sidenav ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

            <div class="flex flex-col justify-between h-full py-6">
                <div class="space-y-6">

                    <!-- Header Sidebar + Tombol Close Mobile -->
                    <div class="flex items-center justify-between md:justify-center">
                        <div id="profile" class="space-y-2 text-center w-full">
                            <img src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&auto=format&fit=crop&w=880&q=80"
                                alt="Avatar user"
                                class="w-14 h-14 md:w-16 md:h-16 rounded-full mx-auto object-cover border-2 border-blue-500/20" />
                            <div>
                                <h2 class="font-bold text-xs md:text-sm text-blue-600 tracking-wide uppercase">
                                    WEB KELOLA BARANG
                                </h2>
                                <p class="text-[10px] md:text-xs text-gray-500 mt-0.5">Administrator Sekolah</p>
                            </div>
                        </div>

                        <!-- Tombol Tutup (X) khusus layar HP -->
                        <button @click="sidenav = false"
                            class="md:hidden text-gray-400 hover:text-gray-700 p-1 rounded-lg focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Navigation Menu -->
                    <nav id="menu" class="flex flex-col space-y-1.5 pt-2">

                        <!-- Dashboard -->
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center gap-3 text-sm font-medium py-2.5 px-3.5 rounded-xl transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-grid-fill shrink-0" viewBox="0 0 16 16">
                                <path
                                    d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        <!-- Inventory -->
                        <a href="{{ route('inventory') }}"
                            class="flex items-center gap-3 text-sm font-medium py-2.5 px-3.5 rounded-xl transition duration-150 ease-in-out {{ request()->routeIs('inventory*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-boxes shrink-0" viewBox="0 0 16 16">
                                <path
                                    d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                            </svg>
                            <span>Inventory</span>
                        </a>

                        <!-- Buat Peminjaman -->
                        <a href="{{ route('buat_peminjaman') }}"
                            class="flex items-center gap-3 text-sm font-medium py-2.5 px-3.5 rounded-xl transition duration-150 ease-in-out {{ request()->routeIs('buat_peminjaman*') ? 'bg-blue-600 text-white shadow-md shadow-blue-500/20' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
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

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 text-sm font-medium text-red-600 py-2.5 px-3.5 hover:bg-red-50 hover:text-red-700 rounded-xl transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
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
        <main class="flex-1 p-3 sm:p-5 md:p-8 min-w-0 overflow-y-auto w-full">

            <!-- Top Navbar Mobile & Desktop -->
            <header class="mb-6">
                <div
                    class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <!-- Hamburger Button (Muncul di Mobile) -->
                        <button @click="sidenav = !sidenav"
                            class="p-2.5 bg-blue-50 hover:bg-blue-100 rounded-xl border border-blue-100 text-blue-600 focus:outline-none md:hidden transition shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-base sm:text-lg md:text-xl font-bold text-gray-800 tracking-wide">WEB KELOLA
                                BARANG</h1>
                            <p class="text-[11px] sm:text-xs text-gray-500">Sistem Manajemen Inventaris & Peminjaman</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Grid Cards Stat Dashboard -->
            <div class="mt-8 mb-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-8 gap-x-5">

                <!-- Card 1 -->
                <div
                    class="relative flex flex-col bg-clip-border rounded-2xl bg-white text-gray-700 shadow-sm border border-gray-100">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/30 shadow-lg absolute -mt-4 grid h-12 w-12 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 text-white">
                            <path
                                d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM2.25 7.93v8.55a.75.75 0 00.372.648L11.25 22.18v-9l-9-5.25z" />
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="text-xs font-medium text-gray-500">Total Item Aset</p>
                        <h4 class="text-2xl font-bold text-gray-900 mt-1">1,248</h4>
                    </div>
                    <div class="border-t border-gray-100 p-3.5">
                        <p class="text-xs text-gray-500">Total keseluruhan barang</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="relative flex flex-col bg-clip-border rounded-2xl bg-white text-gray-700 shadow-sm border border-gray-100">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/30 shadow-lg absolute -mt-4 grid h-12 w-12 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 text-white">
                            <path
                                d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25H21A.75.75 0 0121.75 6.375v12a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 18.375v-12A.75.75 0 013 5.625h4.5v-2.25zm1.5 0v2.25h6v-2.25a.375.375 0 00-.375-.375h-5.25a.375.375 0 00-.375.375z" />
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="text-xs font-medium text-gray-500">Sedang Dipinjam</p>
                        <h4 class="text-2xl font-bold text-gray-900 mt-1">42</h4>
                    </div>
                    <div class="border-t border-gray-100 p-3.5">
                        <p class="text-xs text-gray-500"><strong class="text-blue-600 font-semibold">8 aktif</strong>
                            minggu ini</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="relative flex flex-col bg-clip-border rounded-2xl bg-white text-gray-700 shadow-sm border border-gray-100">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-amber-600 to-amber-400 text-white shadow-amber-500/30 shadow-lg absolute -mt-4 grid h-12 w-12 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 text-white">
                            <path fill-rule="evenodd"
                                d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.215-.235.235l-1.072.178c-.904.151-1.567.933-1.567 1.85v.081c0 .414-.336.75-.75.75h-.082c-.917 0-1.699.663-1.85 1.567l-.178 1.072a.236.236 0 01-.235.235l-1.072.178c-.904.151-1.567.933-1.567 1.85v.858c0 .917.663 1.699 1.567 1.85l1.072.178c.12.02.215.115.235.235l.178 1.072c.151.904.933 1.567 1.85 1.567h.082c.414 0 .75.336.75.75v.082c0 .917.663 1.699 1.85 1.85l1.072.178c.12.02.215.115.235.235l.178 1.072c.151.904.933 1.567 1.85 1.567h.858c.917 0 1.699-.663 1.85-1.567l.178-1.072a.236.236 0 01.235-.235l1.072-.178c.904-.151 1.567-.933 1.567-1.85v-.082c0-.414.336-.75.75-.75h.082c.917 0 1.699-.663 1.85-1.567l.178-1.072a.236.236 0 01.235-.235l1.072-.178c.904-.151 1.567-.933 1.567-1.85v-.858c0-.917-.663-1.699-1.567-1.85l-1.072-.178a.236.236 0 01-.235-.235l-.178-1.072c-.151-.904-.933-1.567-1.85-1.567h-.082a.75.75 0 01-.75-.75v-.082c0-.917-.663-1.699-1.85-1.85l-1.072-.178a.236.236 0 01-.235-.235l-.178-1.072c-.151-.904-.933-1.567-1.85-1.567h-.858zM12 15a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="text-xs font-medium text-gray-500">Kondisi Rusak</p>
                        <h4 class="text-2xl font-bold text-gray-900 mt-1">15</h4>
                    </div>
                    <div class="border-t border-gray-100 p-3.5">
                        <p class="text-xs text-gray-500"><strong class="text-amber-600 font-semibold">3 item</strong>
                            butuh perbaikan</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div
                    class="relative flex flex-col bg-clip-border rounded-2xl bg-white text-gray-700 shadow-sm border border-gray-100">
                    <div
                        class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-purple-600 to-purple-400 text-white shadow-purple-500/30 shadow-lg absolute -mt-4 grid h-12 w-12 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 text-white">
                            <path
                                d="M19.5 21a3 3 0 003-3v-4.5a3 3 0 00-3-3h-15a3 3 0 00-3 3V18a3 3 0 003 3h15zM1.5 10.125a3 3 0 013-3h15a3 3 0 013 3V6a3 3 0 00-3-3h-6A3 3 0 0012 1.5H4.5A3 3 0 001.5 4.5v5.625z" />
                        </svg>
                    </div>
                    <div class="p-4 text-right">
                        <p class="text-xs font-medium text-gray-500">Kategori Aset</p>
                        <h4 class="text-2xl font-bold text-gray-900 mt-1">12</h4>
                    </div>
                    <div class="border-t border-gray-100 p-3.5">
                        <p class="text-xs text-gray-500">Elektronik, Mebel, dll</p>
                    </div>
                </div>

            </div>

            <!-- Area Filter & Tabel -->
            <div class="space-y-6">

                <!-- Filter Form Card -->
                <div class="p-4 sm:p-5 rounded-2xl bg-white shadow-sm border border-gray-100">
                    <form action="{{ route('dashboard') }}" method="GET"
                        class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">

                        <a href="{{ route('buat_peminjaman') }}"
                            class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-white shadow-md shadow-blue-500/20 transition-all hover:bg-blue-700 focus:outline-none shrink-0 w-full lg:w-auto">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Buat Peminjaman
                        </a>

                        <div
                            class="flex flex-col sm:flex-row flex-1 items-stretch sm:items-center gap-3 lg:justify-end">

                            <!-- Input Search -->
                            <div class="relative flex-1 sm:max-w-xs lg:max-w-md">
                                <span
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </span>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari peminjam, barang..."
                                    class="w-full pl-9 pr-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition placeholder-gray-400">
                            </div>

                            <!-- Dropdown Status -->
                            <select name="status" onchange="this.form.submit()"
                                class="py-2 pl-3 pr-8 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-gray-700 cursor-pointer">
                                <option value="">-- Semua Status --</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>
                                    Dipinjam</option>
                                <option value="dikembalikan"
                                    {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            </select>

                            <!-- Date Filter -->
                            <input type="date" name="tanggal_pinjam" value="{{ request('tanggal_pinjam') }}"
                                onchange="this.form.submit()"
                                class="py-2 px-3 text-sm bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-gray-700">

                            <!-- Submit & Reset Button -->
                            <div class="flex items-center gap-2">
                                <button type="submit"
                                    class="flex-1 sm:flex-none justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-xl transition shadow-sm flex items-center space-x-1 shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.707V19a1 1 0 01-.447.894l-4 2A1 1 0 017 21v-7.293L2.293 6.707A1 1 0 012 6V4z">
                                        </path>
                                    </svg>
                                    <span>Filter</span>
                                </button>

                                @if (request('search') || request('status') || request('tanggal_pinjam'))
                                    <a href="{{ route('dashboard') }}"
                                        class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 font-medium text-sm rounded-xl transition shadow-sm flex items-center shrink-0"
                                        title="Reset Filter">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </form>
                </div>

                <!-- Responsive Table Card -->
                <div
                    class="relative flex flex-col w-full overflow-hidden rounded-2xl bg-white shadow-sm border border-gray-100">
                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="bg-blue-600 text-white uppercase text-xs tracking-wider whitespace-nowrap">
                                <tr>
                                    <th class="px-6 py-4">No</th>
                                    <th class="px-6 py-4">Nama Peminjam</th>
                                    <th class="px-6 py-4">Kategori Peminjam</th>
                                    <th class="px-6 py-4">Barang Dipinjam</th>
                                    <th class="px-6 py-4">Tgl Peminjaman</th>
                                    <th class="px-6 py-4">Tgl Pengembalian</th>
                                    <th class="px-6 py-4">Keperluan</th>
                                    <th class="px-6 py-4 text-center">Status</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">
                                @forelse ($peminjamans as $index => $item)
                                    <tr class="hover:bg-blue-50/50 transition duration-200">
                                        <td class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                            {{ $item->nama_peminjam }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2.5 py-1 rounded-md bg-gray-100 text-gray-700 text-xs font-medium">
                                                {{ $item->kategori_peminjam }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 min-w-[200px]">
                                            <ul class="space-y-1">
                                                @forelse ($item->details ?? [] as $detail)
                                                    <li>
                                                        <span
                                                            class="font-semibold text-blue-600">{{ $detail->barang->nama_barang ?? 'Barang' }}</span>
                                                        <span
                                                            class="text-xs text-gray-500">({{ $detail->jumlah ?? 1 }}
                                                            unit)</span>
                                                    </li>
                                                @empty
                                                    <span class="text-xs text-gray-400 italic">Tidak ada rincian
                                                        barang</span>
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($item->tgl_peminjaman)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($item->tgl_pengembalian)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 max-w-xs truncate" title="{{ $item->keperluan }}">
                                            {{ $item->keperluan }}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            @if (strtolower($item->status) == 'pending')
                                                <span
                                                    class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold">Pending</span>
                                            @elseif(strtolower($item->status) == 'dipinjam')
                                                <span
                                                    class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">Dipinjam</span>
                                            @elseif(strtolower($item->status) == 'dikembalikan')
                                                <span
                                                    class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Dikembalikan</span>
                                            @else
                                                <span
                                                    class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            <div class="flex items-center justify-center space-x-1">
                                                <!-- Detail -->
                                                <a href="{{ route('show', $item->id) }}"
                                                    class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                                    title="Lihat Detail">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>

                                                <!-- Edit -->
                                                <a href="{{ route('edit', $item->id) }}"
                                                    class="p-2 text-gray-600 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition"
                                                    title="Edit Data">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                                <!-- Print -->
                                                <a href="{{ route('print', $item->id) }}" target="_blank"
                                                    class="p-2 text-gray-600 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition"
                                                    title="Cetak Surat Peminjaman">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ route('destroy', $item->id) }}" method="POST"
                                                    class="inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                                                        title="Hapus Data">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-6 py-12 text-center text-gray-500">
                                            <div class="flex flex-col items-center justify-center space-y-2">
                                                <svg class="w-10 h-10 text-gray-300" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                                <p class="text-sm font-semibold text-gray-600">Data peminjaman tidak
                                                    ditemukan</p>
                                                <p class="text-xs text-gray-400">Coba ubah kata kunci atau hapus filter
                                                    pencarian Anda.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>

</html>
