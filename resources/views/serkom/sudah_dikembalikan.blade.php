<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB PENGELOLAAN BARANG</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 font-sans antialiased">

    <!-- Container Layout Utama (Flexbox) -->
    <div class="min-h-screen flex" x-data="{ sidenav: true }">

        <!-- Sidebar Navigation -->
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


        <!-- Area Konten Utama -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

            <main class="flex-1 overflow-y-auto p-4 md:p-8">

                <!-- 1. Section Header -->
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-slate-800 tracking-tight">DAFTAR BARANG YANG SUDAH DIKEMBALIKAN
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">Ini adalah daftar detail barang yang sudah dikembalikan
                    </p>
                </div>

                <!-- 2. Tombol Back (Di bawah Header, di atas Tabel) -->
                <div class="mb-4">
                    <a href="dashboard.php"
                        class="inline-flex items-center gap-2 px-3 py-1.5 bg-white hover:bg-slate-50 text-slate-700 text-sm font-semibold rounded-lg border border-slate-200 shadow-sm transition-all duration-150 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor"
                            class="w-4 h-4 text-slate-500 group-hover:text-blue-600 transition-transform group-hover:-translate-x-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        <span>Kembali ke Dashboard</span>
                    </a>
                </div>

                <!-- 3. Table Card Container -->
                <div
                    class="relative flex flex-col w-full text-gray-700 bg-white shadow-sm border border-slate-200 rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left table-auto min-w-max">
                            <thead>
                                <tr class="border-b border-slate-200 bg-slate-50">
                                    <th class="p-4 text-xs font-semibold uppercase tracking-wider text-slate-500">No
                                    </th>
                                    <th class="p-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Nama
                                        Barang</th>
                                    <th
                                        class="p-4 text-xs font-semibold uppercase tracking-wider text-slate-500 text-center">
                                        Jumlah</th>
                                    <th class="p-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                        Tanggal Peminjaman</th>
                                    <th class="p-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Jadwal
                                        Pengembalian</th>
                                    <th
                                        class="p-4 text-xs font-semibold uppercase tracking-wider text-slate-500 text-center">
                                        Status</th>
                                    <th
                                        class="p-4 text-xs font-semibold uppercase tracking-wider text-slate-500 text-center">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">

                                <!-- Row 1 -->
                                <tr class="hover:bg-slate-50/80 transition duration-150">
                                    <td class="p-4 text-sm text-slate-600 font-medium">01</td>
                                    <td class="p-4">
                                        <p class="font-semibold text-sm text-slate-800">Charger Laptop</p>
                                    </td>
                                    <td class="p-4 text-sm text-slate-600 text-center font-medium">1</td>
                                    <td class="p-4 text-sm text-slate-600">5 January 2026</td>
                                    <td class="p-4 text-sm text-slate-600">6 January 2026</td>
                                    <td class="p-4 text-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                                            <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-amber-500"></span>
                                            Sedang Dipinjam
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <button type="button" title="Hapus / Batal"
                                            class="text-slate-400 hover:text-red-500 transition duration-150 p-1.5 rounded-md hover:bg-red-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                class="w-5 h-5 mx-auto">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr class="hover:bg-slate-50/80 transition duration-150">
                                    <td class="p-4 text-sm text-slate-600 font-medium">02</td>
                                    <td class="p-4">
                                        <p class="font-semibold text-sm text-slate-800">Chair</p>
                                    </td>
                                    <td class="p-4 text-sm text-slate-600 text-center font-medium">25</td>
                                    <td class="p-4 text-sm text-slate-600">7 December 2026</td>
                                    <td class="p-4 text-sm text-slate-600">10 December 2026</td>
                                    <td class="p-4 text-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-emerald-500"></span>
                                            Sudah Dikembalikan
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <button type="button" title="Hapus / Batal"
                                            class="text-slate-400 hover:text-red-500 transition duration-150 p-1.5 rounded-md hover:bg-red-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                class="w-5 h-5 mx-auto">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="hover:bg-slate-50/80 transition duration-150">
                                    <td class="p-4 text-sm text-slate-600 font-medium">03</td>
                                    <td class="p-4">
                                        <p class="font-semibold text-sm text-slate-800">Kantong</p>
                                    </td>
                                    <td class="p-4 text-sm text-slate-600 text-center font-medium">1</td>
                                    <td class="p-4 text-sm text-slate-600">6 February 2026</td>
                                    <td class="p-4 text-sm text-slate-600">7 February 2026</td>
                                    <td class="p-4 text-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                                            <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-amber-500"></span>
                                            Sedang Dipinjam
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <button type="button" title="Hapus / Batal"
                                            class="text-slate-400 hover:text-red-500 transition duration-150 p-1.5 rounded-md hover:bg-red-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                class="w-5 h-5 mx-auto">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>

    </div>

</body>

</html>
