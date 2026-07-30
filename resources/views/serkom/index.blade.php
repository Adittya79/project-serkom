<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB KELOLA BARANG </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins antialiased min-h-screen bg-gray-50 flex flex-col justify-between">
    <!-- Header Semantik -->
    <header class="sr-only">
        <h1>LOGIN SISTEM KELOLA BARANG SEKOLAH</h1>
    </header>

    <!-- Main Container -->
    <main class="flex-grow flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white rounded-xl shadow-xl p-8 border border-gray-100">
            <!-- User/App Branding Section -->
            <div id="profile" class="text-center mb-8 space-y-2">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full mx-auto flex items-center justify-center shadow-inner">
                    <!-- Ikon Inventory/Box -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM2.25 7.93v8.55a.75.75 0 00.372.648L11.25 22.18v-9l-9-5.25z" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-xl text-center text-blue-600 tracking-wide">
                        WEB KELOLA BARANG
                    </h2>
                    <p class="text-xs text-gray-500 text-center mt-1">Sistem Informasi Inventaris & Aset Sekolah</p>
                </div>
            </div>

            <!-- Role Selector Tabs -->
            <div class="grid grid-cols-2 gap-1.5 p-1 bg-gray-100 rounded-lg mb-6">
                <button type="button"
                    class="py-2 text-xs font-medium rounded-md bg-blue-600 text-white shadow-sm transition duration-150 ease-in-out">
                    Siswa / User
                </button>
                <button type="button"
                    class="py-2 text-xs font-medium text-gray-700 hover:text-blue-600 transition duration-150 ease-in-out">
                    Administrator
                </button>
            </div>

            <!-- Form Section -->
            <form action="#" method="POST" class="space-y-4">
                <!-- Username Input -->
                <div>
                    <label for="username" class="block text-xs font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" id="username" name="username" required
                        class="w-full px-3.5 py-2.5 border border-gray-300 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                        placeholder="Masukkan username Anda" />
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-xs font-medium text-gray-700">Password</label>
                        <a href="#" class="text-xs text-blue-600 hover:underline font-medium">
                            Lupa password?
                        </a>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3.5 py-2.5 border border-gray-300 rounded-md text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                        placeholder="••••••••" />
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-medium py-2.5 rounded-md shadow transition duration-150 ease-in-out text-sm mt-2">
                    Masuk ke Sistem
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-6 text-center text-xs text-gray-500 border-t border-gray-100 pt-4">
                Belum memiliki akun?
                <a href="#" class="text-blue-600 font-medium hover:underline ml-1">
                    Daftar Akun Baru
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-3 text-center text-xs text-gray-500 border-t border-gray-200 bg-white">
        <p>© 2026, Kelola Aset Sekolah. All rights reserved.</p>
    </footer>
</body>

</html>
