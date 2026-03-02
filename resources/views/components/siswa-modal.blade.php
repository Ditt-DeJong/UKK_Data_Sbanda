@push('modals')
<!-- MODAL DETAIL SISWA -->
<div id="detailSiswaModal" class="hidden fixed inset-0 flex items-center justify-center pt-4 px-4 z-[70]">
    <div class="bg-white w-[90%] max-w-3xl rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300">

        <!-- Header -->
        <div class="p-6 border-b bg-gradient-to-r from-blue-50 to-blue-100">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Detail Siswa</h2>
                    <p class="text-sm text-gray-600">Informasi lengkap data siswa</p>
                </div>
                <button id="closeDetailSiswaModal" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Isi Konten -->
        <div class="p-6 max-h-[70vh] overflow-y-auto">

            <!-- Foto & Info Dasar -->
            <div class="flex items-start gap-6 mb-6 pb-6 border-b">
                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-3xl font-bold shadow-lg" id="siswa-avatar">
                    A
                </div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-800 mb-1" id="siswa-nama">-</h3>
                    <div class="flex items-center gap-4 text-sm text-gray-600">
                        <span class="flex items-center gap-1">
                            <i class="fa-solid fa-id-card text-blue-600"></i>
                            <span id="siswa-nis">-</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="fa-solid fa-school text-blue-600"></i>
                            <span id="siswa-kelas">-</span>
                        </span>
                        <span id="siswa-status-badge" class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Aktif</span>
                    </div>
                </div>
            </div>

            <!-- Informasi Pribadi -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-user text-blue-600"></i>
                    Informasi Pribadi
                </h4>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500 mb-1">Jenis Kelamin</p>
                        <p class="font-semibold text-gray-800" id="siswa-jk">-</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500 mb-1">Tanggal Lahir</p>
                        <p class="font-semibold text-gray-800" id="siswa-tgl-lahir">-</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 col-span-2">
                        <p class="text-sm text-gray-500 mb-1">Alamat</p>
                        <p class="font-semibold text-gray-800" id="siswa-alamat">-</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Orang Tua -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-users text-blue-600"></i>
                    Informasi Orang Tua / Wali
                </h4>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500 mb-1">Nama Orang Tua</p>
                        <p class="font-semibold text-gray-800" id="siswa-ortu">-</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500 mb-1">No. Telepon</p>
                        <p class="font-semibold text-gray-800" id="siswa-telp">-</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 col-span-2">
                        <p class="text-sm text-gray-500 mb-1">Pekerjaan</p>
                        <p class="font-semibold text-gray-800" id="siswa-pekerjaan">-</p>
                    </div>
                </div>
            </div>

            <!-- Statistik Kehadiran -->
            <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-chart-simple text-blue-600"></i>
                    Statistik Kehadiran (Bulan Ini)
                </h4>
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm text-green-700 font-medium">Hadir</p>
                            <i class="fa-solid fa-check-circle text-green-600"></i>
                        </div>
                        <p class="text-2xl font-bold text-green-600">18 hari</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-4 border border-yellow-200">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm text-yellow-700 font-medium">Izin</p>
                            <i class="fa-solid fa-file-lines text-yellow-600"></i>
                        </div>
                        <p class="text-2xl font-bold text-yellow-600">2 hari</p>
                    </div>
                    <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm text-red-700 font-medium">Sakit</p>
                            <i class="fa-solid fa-notes-medical text-red-600"></i>
                        </div>
                        <p class="text-2xl font-bold text-red-600">1 hari</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Actions -->
        <div class="p-6 border-t bg-gray-50 flex justify-end gap-3">
            <button onclick="closeDetailSiswaModal()" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition font-semibold text-gray-700">
                Tutup
            </button>
            <button onclick="openEditSiswaModal()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square"></i> Edit Data
            </button>
        </div>

    </div>
</div>

@endpush

@push('scripts')
<script>
    // Function untuk membuka modal detail siswa
    window.openDetailSiswaModal = function(data) {
        // Update data di modal
        document.getElementById("siswa-nama").textContent = data.nama;
        document.getElementById("siswa-nis").textContent = "NIS: " + data.nis;
        document.getElementById("siswa-kelas").textContent = "Kelas " + data.kelas;
        document.getElementById("siswa-jk").textContent = data.jenisKelamin;
        document.getElementById("siswa-tgl-lahir").textContent = data.tanggalLahir;
        document.getElementById("siswa-alamat").textContent = data.alamat;
        document.getElementById("siswa-ortu").textContent = data.namaOrtu;
        document.getElementById("siswa-telp").textContent = data.noTelp;
        document.getElementById("siswa-pekerjaan").textContent = data.pekerjaan;
        
        // Update avatar
        const avatar = document.getElementById("siswa-avatar");
        avatar.textContent = data.nama.charAt(0).toUpperCase();
        
        // Update status badge
        const statusBadge = document.getElementById("siswa-status-badge");
        statusBadge.textContent = data.status;
        statusBadge.className = "inline-block px-3 py-1 rounded-full text-xs font-semibold";
        
        if (data.status === "Aktif") {
            statusBadge.classList.add("bg-green-100", "text-green-700");
        } else if (data.status === "Cuti") {
            statusBadge.classList.add("bg-yellow-100", "text-yellow-700");
        } else {
            statusBadge.classList.add("bg-gray-100", "text-gray-700");
        }

        // Tampilkan modal
        document.getElementById("detailSiswaModal").classList.remove("hidden");
        document.getElementById("overlay").classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
    }

    // Function untuk menutup modal
    window.closeDetailSiswaModal = function() {
        document.getElementById("detailSiswaModal").classList.add("hidden");
        document.getElementById("overlay").classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }

    // Close button
    document.getElementById("closeDetailSiswaModal")?.addEventListener("click", closeDetailSiswaModal);
</script>
@endpush