<!-- MODAL DETAIL KEHADIRAN -->
<div id="detailKehadiranModal" class="hidden fixed inset-0 flex items-center justify-center pt-4 px-4 z-[50]">
    <div class="bg-white w-[90%] max-w-3xl rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300">

        <!-- Header -->
        <div class="p-6 border-b bg-gradient-to-r from-blue-50 to-blue-100">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Detail Kehadiran</h2>
                    <p class="text-sm text-gray-600">Informasi lengkap kehadiran siswa</p>
                </div>
                <button id="closeDetailKehadiranModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Isi Konten -->
        <div class="p-6">

            <!-- Info Siswa -->
            <div class="flex items-center gap-4 mb-6 pb-6 border-b">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg" id="kehadiran-avatar">
                    A
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-gray-800 mb-1" id="kehadiran-nama">-</h3>
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <span class="flex items-center gap-1">
                            <i class="fa-solid fa-id-card text-blue-600"></i>
                            <span id="kehadiran-nis">-</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="fa-solid fa-school text-blue-600"></i>
                            <span id="kehadiran-kelas">-</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Informasi Kehadiran -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
                        <i class="fa-solid fa-calendar text-blue-600"></i>
                        Tanggal
                    </p>
                    <p class="font-semibold text-gray-800" id="kehadiran-tanggal">-</p>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-blue-600"></i>
                        Waktu Absen
                    </p>
                    <p class="font-semibold text-gray-800" id="kehadiran-waktu">-</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
                        <i class="fa-solid fa-clipboard-check text-blue-600"></i>
                        Status Kehadiran
                    </p>
                    <span id="kehadiran-status-badge" class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold mt-1">
                        <i class="fa-solid fa-check-circle"></i> Hadir
                    </span>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-500 mb-1 flex items-center gap-2">
                        <i class="fa-solid fa-info-circle text-blue-600"></i>
                        Keterangan
                    </p>
                    <p class="font-semibold text-gray-800" id="kehadiran-keterangan">-</p>
                </div>
            </div>

            <!-- Riwayat Kehadiran Bulan Ini -->
            <div class="border-t pt-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-chart-simple text-blue-600"></i>
                    Riwayat Kehadiran Bulan Ini
                </h4>
                
                <div class="grid grid-cols-4 gap-3">
                    <div class="bg-green-50 rounded-lg p-3 border border-green-200 text-center">
                        <p class="text-2xl font-bold text-green-600 mb-1">18</p>
                        <p class="text-xs text-green-700 font-medium">Hadir</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-3 border border-yellow-200 text-center">
                        <p class="text-2xl font-bold text-yellow-600 mb-1">2</p>
                        <p class="text-xs text-yellow-700 font-medium">Izin</p>
                    </div>
                    <div class="bg-red-50 rounded-lg p-3 border border-red-200 text-center">
                        <p class="text-2xl font-bold text-red-600 mb-1">1</p>
                        <p class="text-xs text-red-700 font-medium">Sakit</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3 border border-gray-200 text-center">
                        <p class="text-2xl font-bold text-gray-600 mb-1">0</p>
                        <p class="text-xs text-gray-700 font-medium">Alpha</p>
                    </div>
                </div>

                <!-- Persentase Kehadiran -->
                <div class="mt-4 bg-blue-50 rounded-lg p-4 border border-blue-200">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold text-blue-700">Persentase Kehadiran</span>
                        <span class="text-2xl font-bold text-blue-600">86%</span>
                    </div>
                    <div class="w-full bg-blue-200 rounded-full h-3">
                        <div class="bg-blue-600 h-3 rounded-full" style="width: 86%"></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="p-6 border-t bg-gray-50 flex justify-end gap-3">
            <button onclick="closeDetailKehadiranModal()" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition font-semibold text-gray-700">
                Tutup
            </button>
            <button onclick="printKehadiran()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold flex items-center gap-2">
                <i class="fa-solid fa-print"></i> Cetak
            </button>
        </div>

    </div>
</div>

@push('scripts')
<script>
    // Function untuk membuka modal detail kehadiran
    window.openDetailKehadiran = function(data) {
        // Update data di modal
        document.getElementById("kehadiran-nama").textContent = data.nama;
        document.getElementById("kehadiran-nis").textContent = "NIS: " + data.nis;
        document.getElementById("kehadiran-kelas").textContent = "Kelas " + data.kelas;
        document.getElementById("kehadiran-tanggal").textContent = data.tanggal;
        document.getElementById("kehadiran-waktu").textContent = data.waktu;
        document.getElementById("kehadiran-keterangan").textContent = data.keterangan;
        
        // Update avatar
        const avatar = document.getElementById("kehadiran-avatar");
        avatar.textContent = data.nama.charAt(0).toUpperCase();
        
        // Update status badge
        const statusBadge = document.getElementById("kehadiran-status-badge");
        statusBadge.className = "inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold mt-1";
        
        if (data.status === "Hadir") {
            statusBadge.innerHTML = '<i class="fa-solid fa-check-circle"></i> Hadir';
            statusBadge.classList.add("bg-green-100", "text-green-700");
        } else if (data.status === "Izin") {
            statusBadge.innerHTML = '<i class="fa-solid fa-file-lines"></i> Izin';
            statusBadge.classList.add("bg-yellow-100", "text-yellow-700");
        } else if (data.status === "Sakit") {
            statusBadge.innerHTML = '<i class="fa-solid fa-notes-medical"></i> Sakit';
            statusBadge.classList.add("bg-red-100", "text-red-700");
        } else if (data.status === "Terlambat") {
            statusBadge.innerHTML = '<i class="fa-solid fa-clock"></i> Terlambat';
            statusBadge.classList.add("bg-orange-100", "text-orange-700");
        } else {
            statusBadge.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> Alpha';
            statusBadge.classList.add("bg-gray-100", "text-gray-700");
        }

        // Tampilkan modal
        document.getElementById("detailKehadiranModal").classList.remove("hidden");
        document.getElementById("overlay").classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
    }

    // Function untuk menutup modal
    window.closeDetailKehadiranModal = function() {
        document.getElementById("detailKehadiranModal").classList.add("hidden");
        document.getElementById("overlay").classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }

    // Function print kehadiran
    window.printKehadiran = function() {
        window.print();
    }

    // Close button
    document.getElementById("closeDetailKehadiranModal")?.addEventListener("click", closeDetailKehadiranModal);
</script>
@endpush