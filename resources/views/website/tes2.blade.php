<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Ijin - Portal Orang Tua</title>

    <!-- Font Awesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <!-- Tailwind -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 font-sans antialiased">

<!-- OVERLAY dengan opacity yang lebih ringan -->
<div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-40 z-[40] transition-opacity duration-300"></div>

<!-- MODAL DETAIL PERMOHONAN IJIN -->
<div id="detailModal" class="hidden fixed inset-0 flex items-center justify-center pt-4 z-[50]">
    <div class="bg-white w-[90%] max-w-2xl rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300">

        <!-- Header -->
        <div class="p-6 border-b bg-blue-50">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Detail Permohonan Ijin</h2>
                    <p class="text-sm text-gray-600">Tinjau dan proses permohonan ijin dari orang tua siswa</p>
                </div>
                <button id="closeDetailModal" class="text-gray-500 hover:text-gray-700 text-2xl transition-colors">
                    &times;
                </button>
            </div>
        </div>

        <!-- Isi Konten -->
        <div class="p-6 max-h-[70vh] overflow-y-auto">

            <!-- Info Siswa & Orang Tua -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Nama Siswa</p>
                    <p class="font-semibold text-gray-800" id="modal-nama-siswa">Siti Nurhaliza</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Kelas</p>
                    <p class="font-semibold text-gray-800" id="modal-kelas">XI-B</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Nama Orang Tua</p>
                    <p class="font-semibold text-gray-800" id="modal-ortu">Ibu Haliza</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Alasan</p>
                    <p class="font-semibold text-gray-800" id="modal-alasan">Keperluan keluarga</p>
                </div>
            </div>

            <div class="border-t pt-6 grid grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Tanggal Mulai</p>
                    <p class="font-semibold text-gray-800" id="modal-tgl-mulai">2025-10-06</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Tanggal Selesai</p>
                    <p class="font-semibold text-gray-800" id="modal-tgl-selesai">2025-10-06</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Diajukan</p>
                    <p class="font-semibold text-gray-800" id="modal-diajukan">2025-10-05 16:20</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Status</p>
                    <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold" id="modal-status">Pending</span>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="border-t pt-6 mb-6">
                <p class="text-sm text-gray-500 mb-2">Keterangan</p>
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <p class="text-gray-700" id="modal-keterangan">Ada acara keluarga yang tidak bisa ditinggalkan.</p>
                </div>
            </div>

            <!-- Alasan Penolakan (hanya muncul jika menolak) -->
            <div id="reject-section" class="hidden border-t pt-6 mb-6">
                <label class="text-sm text-gray-700 mb-2 block">Alasan Penolakan (jika ditolak)</label>
                <textarea 
                    id="alasan-penolakan" 
                    class="w-full border border-blue-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    rows="3"
                    placeholder="Masukkan alasan jika menolak ijin ini..."></textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="grid grid-cols-2 gap-4">
                <button id="approveBtn" class="bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-check-circle"></i> Setujui Ijin
                </button>
                <button id="rejectBtn" class="bg-red-100 text-red-600 py-3 rounded-lg font-semibold border-2 border-red-400 hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-times-circle"></i> Tolak Ijin
                </button>
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
                    <p class="text-sm text-gray-500 -mt-1">Sistem Absensi</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 py-4 space-y-1">
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition">
                    <i class="fa-solid fa-house mr-3 w-5"></i> Dashboard
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition">
                    <i class="fa-solid fa-users mr-3 w-5"></i> Data Siswa
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition">
                    <i class="fa-solid fa-calendar-check mr-3 w-5"></i> Kehadiran
                </a>
                <a href="#" class="flex items-center px-6 py-3 bg-blue-50 text-blue-700 font-semibold border-l-4 border-blue-600">
                    <i class="fa-solid fa-clipboard-check mr-3 w-5"></i> Persetujuan Ijin
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition">
                    <i class="fa-solid fa-calendar-days mr-3 w-5"></i> Jadwal Kelas
                </a>
            </nav>

            <!-- Logout -->
            <div class="border-t border-gray-300">
                <button onclick="alert('Logout')" class="w-full flex items-center justify-center gap-2 px-6 py-4 text-red-500 hover:text-white hover:bg-red-500 font-semibold transition">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 ml-64">

            <!-- HEADER (sticky) -->
            <header class="sticky top-0 z-[30] flex justify-between items-center bg-white px-6 py-4 border-b border-gray-300 shadow-sm">

                <div>
                    <h2 class="text-2xl font-bold text-blue-600">Persetujuan Ijin</h2>
                    <p class="text-sm text-gray-500">Kelola sistem absensi dan pendataan siswa</p>
                </div>

                <!-- NOTIF + PROFILE -->
                <div class="flex items-center gap-6 relative">

                    <!-- NOTIF ICON -->
                    <div class="relative cursor-pointer group">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center shadow-sm hover:bg-blue-200 transition-colors">
                            <i class="fa-solid fa-bell text-lg"></i>
                        </div>

                        <!-- BADGE -->
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">5</span>
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

            <!-- STATISTIK CARDS -->
            <section class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-l-4 border-orange-500 rounded-xl shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="bg-orange-200 p-3 rounded-lg">
                            <i class="fa-solid fa-clock text-orange-600 text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-lg font-medium text-orange-700">Pending</p>
                            <h3 class="text-3xl font-bold text-orange-600">1</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 border-l-4 border-green-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="bg-green-200 p-3 rounded-lg">
                            <i class="fa-solid fa-check-circle text-green-600 text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-lg font-medium text-green-700">Disetujui</p>
                            <h3 class="text-3xl font-bold text-green-600">4</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-red-50 to-red-100 border-l-4 border-red-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="bg-red-200 p-3 rounded-lg">
                            <i class="fa-solid fa-times-circle text-red-600 text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-lg font-medium text-red-700">Ditolak</p>
                            <h3 class="text-3xl font-bold text-red-600">2</h3>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-600 rounded-xl shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-200 p-3 rounded-lg">
                            <i class="fa-solid fa-file-lines text-blue-600 text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-lg font-medium text-blue-700">Total izin</p>
                            <h3 class="text-3xl font-bold text-blue-600">2</h3>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FILTER & TABLE SECTION -->
            <section class="px-6 pb-10">

                <div class="bg-white border border-gray-300 rounded-xl shadow-sm">

                    <!-- Header dengan Filter -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Permohonan Ijin</h3>
                                <p class="text-sm text-gray-500">1 ijin menunggu persetujuan</p>
                            </div>
                        </div>

                        <!-- Filter Tabs -->
                        <div class="flex gap-2 flex-wrap">
                            <button class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold text-sm transition">
                                Pending
                            </button>
                            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 font-semibold text-sm transition">
                                Disetujui
                            </button>
                            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 font-semibold text-sm transition">
                                Ditolak
                            </button>
                            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 font-semibold text-sm transition">
                                Semua
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nama Siswa</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kelas</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Orang Tua</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Alasan</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                
                                <!-- Row 1 - Pending -->
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-medium text-gray-800">Siti Nurhaliza</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">XI-B</td>
                                    <td class="px-6 py-4 text-gray-600">Ibu Haliza</td>
                                    <td class="px-6 py-4 text-gray-600">Keperluan keluarga</td>
                                    <td class="px-6 py-4 text-gray-600">2025-10-06</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-xs font-semibold">Pending</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1 transition detail-btn"
                                                data-nama="Siti Nurhaliza"
                                                data-kelas="XI-B"
                                                data-ortu="Ibu Haliza"
                                                data-alasan="Keperluan keluarga"
                                                data-mulai="2025-10-06"
                                                data-selesai="2025-10-06"
                                                data-diajukan="2025-10-05 16:20"
                                                data-status="Pending"
                                                data-keterangan="Ada acara keluarga yang tidak bisa ditinggalkan.">
                                            <i class="fa-solid fa-eye"></i> Detail
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 2 - Disetujui -->
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-medium text-gray-800">Ahmad Fauzi</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">X-A</td>
                                    <td class="px-6 py-4 text-gray-600">Bapak Fauzi</td>
                                    <td class="px-6 py-4 text-gray-600">Sakit demam</td>
                                    <td class="px-6 py-4 text-gray-600">2025-10-05</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Disetujui</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1 transition detail-btn"
                                                data-nama="Ahmad Fauzi"
                                                data-kelas="X-A"
                                                data-ortu="Bapak Fauzi"
                                                data-alasan="Sakit demam"
                                                data-mulai="2025-10-05"
                                                data-selesai="2025-10-07"
                                                data-diajukan="2025-10-04 10:15"
                                                data-status="Disetujui"
                                                data-keterangan="Anak saya mengalami demam tinggi sejak kemarin malam.">
                                            <i class="fa-solid fa-eye"></i> Detail
                                        </button>
                                    </td>
                                </tr>

                                <!-- Row 3 - Ditolak -->
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-medium text-gray-800">Budi Santoso</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">XII-C</td>
                                    <td class="px-6 py-4 text-gray-600">Ibu Santi</td>
                                    <td class="px-6 py-4 text-gray-600">Liburan keluarga</td>
                                    <td class="px-6 py-4 text-gray-600">2025-10-03</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Ditolak</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1 transition detail-btn"
                                                data-nama="Budi Santoso"
                                                data-kelas="XII-C"
                                                data-ortu="Ibu Santi"
                                                data-alasan="Liburan keluarga"
                                                data-mulai="2025-10-03"
                                                data-selesai="2025-10-10"
                                                data-diajukan="2025-10-01 14:30"
                                                data-status="Ditolak"
                                                data-keterangan="Kami berencana liburan keluarga ke Bali selama seminggu.">
                                            <i class="fa-solid fa-eye"></i> Detail
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </section>

        </main>
    </div>

<script>
    const detailButtons = document.querySelectorAll(".detail-btn");
    const detailModal = document.getElementById("detailModal");
    const closeDetailBtn = document.getElementById("closeDetailModal");
    const overlay = document.getElementById("overlay");
    const rejectBtn = document.getElementById("rejectBtn");
    const approveBtn = document.getElementById("approveBtn");
    const rejectSection = document.getElementById("reject-section");

    // Buka modal detail
    detailButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            // Ambil data dari tombol
            document.getElementById("modal-nama-siswa").textContent = btn.dataset.nama;
            document.getElementById("modal-kelas").textContent = btn.dataset.kelas;
            document.getElementById("modal-ortu").textContent = btn.dataset.ortu;
            document.getElementById("modal-alasan").textContent = btn.dataset.alasan;
            document.getElementById("modal-tgl-mulai").textContent = btn.dataset.mulai;
            document.getElementById("modal-tgl-selesai").textContent = btn.dataset.selesai;
            document.getElementById("modal-diajukan").textContent = btn.dataset.diajukan;
            document.getElementById("modal-keterangan").textContent = btn.dataset.keterangan;
            
            const status = btn.dataset.status;
            const statusBadge = document.getElementById("modal-status");
            
            // Update status badge styling
            statusBadge.textContent = status;
            statusBadge.className = "inline-block px-3 py-1 rounded-full text-sm font-semibold";
            
            if (status === "Pending") {
                statusBadge.classList.add("bg-orange-100", "text-orange-700");
            } else if (status === "Disetujui") {
                statusBadge.classList.add("bg-green-100", "text-green-700");
            } else if (status === "Ditolak") {
                statusBadge.classList.add("bg-red-100", "text-red-700");
            }

            // Tampilkan modal
            detailModal.classList.remove("hidden");
            overlay.classList.remove("hidden");
            document.body.classList.add("overflow-hidden");
        });
    });

    // Tutup modal
    function closeModal() {
        detailModal.classList.add("hidden");
        overlay.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
        rejectSection.classList.add("hidden");
    }

    closeDetailBtn.addEventListener("click", closeModal);
    overlay.addEventListener("click", closeModal);

    // Toggle reject section
    rejectBtn.addEventListener("click", () => {
        rejectSection.classList.toggle("hidden");
    });

    // Approve button
    approveBtn.addEventListener("click", () => {
        if (confirm("Apakah Anda yakin ingin menyetujui ijin ini?")) {
            alert("Ijin berhasil disetujui!");
            closeModal();
        }
    });

    // Tutup dengan tombol ESC
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && !detailModal.classList.contains("hidden")) {
            closeModal();
        }
    });
</script>

</body>
</html>