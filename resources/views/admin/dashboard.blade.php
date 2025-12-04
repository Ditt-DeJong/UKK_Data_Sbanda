<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Portal Orang Tua</title>

    <!-- Font Awesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <!-- Tailwind -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 font-sans antialiased">

<!-- OVERLAY dengan opacity yang lebih ringan -->
<div id="overlay" class="hidden fixed inset-0 bg-black opacity-60 z-[40] transition-opacity duration-300"></div>

<!-- MODAL NOTIFIKASI -->
<div id="notifModal" class="hidden fixed inset-0 flex items-center justify-center pt-4 z-[50]">
    <div class="bg-white w-[90%] max-w-2xl rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300">

        <!-- Header -->
        <div class="p-6 border-b bg-blue-50">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Notifikasi Persetujuan</h2>
                    <p class="text-sm text-gray-600">Kelola persetujuan data siswa dan surat ijin</p>
                </div>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl transition-colors">
                    &times;
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex border-b">
            <button class="flex-1 py-3 text-center text-gray-600 hover:bg-gray-100 transition-colors">
                <i class="fa-solid fa-user-plus mr-2"></i> Data Siswa Baru
            </button>

            <button class="flex-1 py-3 text-center text-blue-600 border-b-4 border-blue-600 bg-blue-50 relative">
                <i class="fa-solid fa-file-lines mr-2"></i> Surat Ijin
                <span class="absolute top-3 right-5 bg-blue-600 text-white text-xs px-2 py-1 rounded-full">3</span>
            </button>
        </div>

        <!-- Isi Konten -->
        <div class="p-6 max-h-[60vh] overflow-y-auto">

            <div class="bg-white rounded-xl border border-gray-200 p-5 shadow-sm hover:shadow-md transition-shadow">

                <div class="flex justify-between">
                    <div class="flex gap-3">
                        <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 text-xl flex-shrink-0">
                            <i class="fa-solid fa-file"></i>
                        </div>
                        <div>
                            <p class="font-bold text-lg">Budi Setiawan</p>
                            <p class="text-gray-600 text-sm">Kelas 7B</p>
                        </div>
                    </div>

                    <p class="text-gray-500 text-sm flex items-center">
                        <i class="fa-regular fa-clock mr-1"></i> 1 jam lalu
                    </p>
                </div>

                <div class="mt-4 text-gray-700 space-y-3">
                    <p><span class="font-semibold">Orang Tua:</span><br> Pak Hadi</p>

                    <p><span class="font-semibold">Alasan:</span><br>
                        Sakit demam dan batuk
                    </p>

                    <div class="flex justify-between">
                        <p><span class="font-semibold">Tanggal Mulai:</span><br> 20 Nov 2025</p>
                        <p><span class="font-semibold">Tanggal Selesai:</span><br> 22 Nov 2025</p>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-4">
                    <button class="bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                        <i class="fa-solid fa-check-circle"></i> Setujui Ijin
                    </button>
                    <button class="bg-red-100 text-red-600 py-3 rounded-lg font-semibold border border-red-400 hover:bg-red-200 transition-colors">
                        <i class="fa-solid fa-times-circle"></i> Tolak Ijin
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="fixed top-0 left-0 h-screen w-64 bg-white border-r border-gray-300 shadow-sm flex flex-col justify-between">

            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-300">
                <div class="bg-blue-600 text-white p-2 rounded-lg">
                    <i class="fa-solid fa-graduation-cap text-lg"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-gray-800">Admin Panel</h1>
                    <p class="text-sm text-gray-500 -mt-1">Portal Orang Tua</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 py-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3
                {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition' }}">
                    <i class="fa-solid fa-house mr-3 w-5"></i> Dashboard
                </a>
                <a href="{{ route('admin.datasiswa') }}" class="flex items-center px-6 py-3
                {{ request()->routeIs('admin.datasiswa') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition' }}">
                    <i class="fa-solid fa-users mr-3 w-5"></i> Data Siswa
                </a>
                <a href="{{ route('admin.kehadiransiswa') }}" class="flex items-center px-6 py-3
                 {{ request()->routeIs('admin.kehadiransiswa') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition' }}">
                    <i class="fa-solid fa-calendar-check mr-3 w-5"></i> Kehadiran
                </a>
                <a href="{{ route('admin.kelola_izin') }}" class="flex items-center px-6 py-3
                {{ request()->routeIs('admin.kelola_izin') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition' }}">
                    <i class="fa-solid fa-clipboard-check mr-3 w-5"></i> Persetujuan Izin
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition">
                    <i class="fa-solid fa-calendar-days mr-3 w-5"></i> Jadwal Kelas
                </a>
            </nav>

            <!-- Logout -->
            <form action="{{ route('admin.logout') }}" method="POST" class="border-t border-gray-300">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-6 py-4 text-red-500 hover:text-white hover:bg-red-500 font-semibold transition">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 ml-64">

            <!-- HEADER (sticky) -->
            <header class="sticky top-0 z-[30] flex justify-between items-center bg-white px-6 py-4 border-b border-gray-300 shadow-sm">

                <div>
                    <h2 class="text-2xl font-bold text-blue-600">Dashboard</h2>
                    <p class="text-sm text-gray-500">Kelola sistem absensi dan pendataan siswa</p>
                </div>

                <!-- NOTIF + PROFILE -->
                <div class="flex items-center gap-6 relative">

                    <!-- NOTIF ICON -->
                    <div class="relative cursor-pointer group" id="notifButton">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center shadow-sm hover:bg-blue-200 transition-colors">
                            <i class="fa-solid fa-bell text-lg"></i>
                        </div>

                        <!-- BADGE -->
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">3</span>
                    </div>

                    <!-- PROFILE -->
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="font-semibold text-gray-800">Admin</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>

                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white font-semibold shadow-sm">
                            A
                        </div>
                    </div>

                </div>
            </header>

            <!-- STATISTIK -->
            <section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white border-l-4 border-blue-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <i class="fa-solid fa-users text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total Siswa Terdaftar</p>
                            <h3 class="text-2xl font-bold text-gray-800">36</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-l-4 border-yellow-500 rounded-xl shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="bg-yellow-100 p-3 rounded-lg">
                            <i class="fa-solid fa-file-circle-exclamation text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Izin Pending</p>
                            <h3 class="text-2xl font-bold text-gray-800">4</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-l-4 border-green-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fa-solid fa-circle-check text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Data Terverifikasi</p>
                            <h3 class="text-2xl font-bold text-gray-800">32</h3>
                        </div>
                    </div>
                </div>

            </section>

            <!-- CONTENT SECTION -->
            <section class="px-6 pb-10 grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- DAFTAR SISWA -->
                <div class="bg-white border border-gray-300 rounded-xl shadow-sm p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Daftar Siswa Kelas 6</h3>
                            <p class="text-sm text-gray-400">Per 21 Oktober 2025</p>
                        </div>
                        <button class="bg-blue-600 hover:bg-blue-700 font-semibold text-white text-sm px-4 py-2 rounded-lg shadow-sm transition">
                            Tambah
                        </button>
                    </div>

                    <div class="space-y-3">
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="flex items-center justify-between border border-gray-300 p-4 rounded-xl hover:bg-blue-50 hover:border-blue-400 transition group">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold">
                                    {{ substr('Ahmad Fandi Nurkholis', 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800 group-hover:text-blue-700 transition">Ahmad Fandi Nurkholis</p>
                                    <p class="text-sm text-gray-500">NIS: 230{{ $i }} / Kelas 6A</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-xs px-3 py-1 rounded-lg bg-green-100 text-green-600 group-hover:bg-green-500 group-hover:text-white font-semibold transition">Hadir</span>
                                <button class="text-blue-500 hover:text-blue-700 transition">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        @endfor
                    </div>

                    <div class="mt-5 text-center">
                        <button class="text-blue-600 hover:text-blue-800 font-medium text-sm transition">Lihat Semua Siswa →</button>
                    </div>
                </div>

                <!-- IZIN TERBARU -->
                <div class="bg-white border border-gray-300 rounded-xl shadow-sm p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Izin Terbaru</h3>
                            <p class="text-sm text-gray-400">Per 21 Oktober 2025</p>
                        </div>
                        <button class="bg-green-600 hover:bg-green-700 font-semibold text-white text-sm px-4 py-2 rounded-lg shadow-sm transition">
                            Tambah
                        </button>
                    </div>

                    <div class="space-y-4">

                        <div class="flex justify-between items-center bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200 hover:shadow-md transition">
                            <div class="flex items-center gap-3">
                                <div class="bg-blue-600 text-white p-3 rounded-lg shadow-sm">
                                    <i class="fa-solid fa-person-walking text-lg"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Faiz Suki Ambalabu</p>
                                    <p class="text-sm text-gray-500">Sakit — 06 Okt 2025</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold shadow-sm">Pending</span>
                        </div>

                        <div class="flex justify-between items-center bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl border border-green-200 hover:shadow-md transition">
                            <div class="flex items-center gap-3">
                                <div class="bg-green-600 text-white p-3 rounded-lg shadow-sm">
                                    <i class="fa-solid fa-person-walking-arrow-right text-lg"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Ahmad Fandi Nurkholis</p>
                                    <p class="text-sm text-gray-500">Acara Keluarga — 05 Okt 2025</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold shadow-sm">Disetujui</span>
                        </div>

                        <div class="flex justify-between items-center bg-gradient-to-r from-red-50 to-red-100 p-4 rounded-xl border border-red-200 hover:shadow-md transition">
                            <div class="flex items-center gap-3">
                                <div class="bg-red-600 text-white p-3 rounded-lg shadow-sm">
                                    <i class="fa-solid fa-user-clock text-lg"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Naila Putri</p>
                                    <p class="text-sm text-gray-500">Izin Pribadi — 03 Okt 2025</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold shadow-sm">Ditolak</span>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <button class="text-green-600 hover:text-green-800 font-medium text-sm transition">
                            Lihat Semua Izin →
                        </button>
                    </div>
                </div>

            </section>

        </main>
    </div>

<script>
    const openBtn = document.getElementById("notifButton");
    const modal = document.getElementById("notifModal");
    const closeBtn = document.getElementById("closeModal");
    const overlay = document.getElementById("overlay");

    // Buka modal
    openBtn?.addEventListener("click", () => {
        modal.classList.remove("hidden");
        overlay.classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
    });

    // Tutup modal
    function closeModal() {
        modal.classList.add("hidden");
        overlay.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }

    closeBtn.addEventListener("click", closeModal);
    overlay.addEventListener("click", closeModal);

    // Tutup dengan tombol ESC
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && !modal.classList.contains("hidden")) {
            closeModal();
        }
    });
</script>

</body>
</html>