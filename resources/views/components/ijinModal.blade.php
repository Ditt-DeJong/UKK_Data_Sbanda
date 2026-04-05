@push('modals')
<!-- MODAL DETAIL SURAT IJIN -->
<div id="detailModal" class="hidden fixed inset-0 flex items-center justify-center pt-4 px-4 z-[70]">
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
                    <p class="font-semibold text-gray-800" id="modal-nama-siswa">-</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Kelas</p>
                    <p class="font-semibold text-gray-800" id="modal-kelas">-</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Nama Orang Tua</p>
                    <p class="font-semibold text-gray-800" id="modal-ortu">-</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Alasan</p>
                    <p class="font-semibold text-gray-800" id="modal-alasan">-</p>
                </div>
            </div>

            <div class="border-t pt-6 grid grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Tanggal Mulai</p>
                    <p class="font-semibold text-gray-800" id="modal-tgl-mulai">-</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Tanggal Selesai</p>
                    <p class="font-semibold text-gray-800" id="modal-tgl-selesai">-</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Diajukan</p>
                    <p class="font-semibold text-gray-800" id="modal-diajukan">-</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Status</p>
                    <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold" id="modal-status">-</span>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="border-t pt-6 mb-6">
                <p class="text-sm text-gray-500 mb-2">Keterangan</p>
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <p class="text-gray-700" id="modal-keterangan">-</p>
                </div>
            </div>

            <!-- Lampiran -->
            <div id="modal-lampiran-section" class="border-t pt-6 mb-6 hidden">
                <p class="text-sm text-gray-500 mb-2">Lampiran</p>
                <button type="button" id="modal-lampiran-btn" onclick="openLampiranFromDetail()" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold bg-blue-50 px-4 py-2 rounded-xl transition-all cursor-pointer">
                    <i class="fa-solid fa-paperclip"></i> Lihat Lampiran
                </button>
            </div>


            <!-- Tombol Aksi -->
            <div id="modal-actions" class="grid grid-cols-2 gap-4">
                <form id="approveForm" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check-circle"></i> Setujui Ijin
                    </button>
                </form>
                
                <button type="button" id="toggleRejectBtn" class="bg-red-100 text-red-600 py-3 rounded-lg font-semibold border-2 border-red-400 hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-times-circle"></i> Tolak Ijin
                </button>
            </div>

            <!-- Form Penolakan Tersembunyi -->
            <form id="rejectFormReal" method="POST" class="hidden mt-4 pt-4 border-t">
                @csrf
                <div class="mb-4">
                    <label class="text-sm text-gray-700 mb-2 block font-semibold">Alasan Penolakan</label>
                    <textarea 
                        name="alasan_penolakan" 
                        class="w-full border border-red-300 rounded-lg p-3 focus:ring-2 focus:ring-red-500 outline-none"
                        rows="3"
                        required
                        placeholder="Masukkan alasan jika menolak ijin ini..."></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <button type="button" id="cancelRejectBtn" class="bg-gray-100 text-gray-600 py-2 rounded-lg font-semibold">Batal</button>
                    <button type="submit" class="bg-red-600 text-white py-2 rounded-lg font-semibold">Kirim Penolakan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endpush

@push('scripts')
<script>
    // === DETAIL MODAL FUNCTIONS ===
const detailModal = document.getElementById("detailModal");
const closeDetailBtn = document.getElementById("closeDetailModal");

// Function untuk membuka detail modal
window.openDetailModal = function(data) {
    // Update data di modal
    document.getElementById("modal-nama-siswa").textContent = data.nama;
    document.getElementById("modal-kelas").textContent = data.kelas;
    document.getElementById("modal-ortu").textContent = data.ortu;
    document.getElementById("modal-alasan").textContent = data.alasan;
    document.getElementById("modal-tgl-mulai").textContent = data.mulai;
    document.getElementById("modal-tgl-selesai").textContent = data.selesai;
    document.getElementById("modal-diajukan").textContent = data.diajukan;
    document.getElementById("modal-keterangan").textContent = data.keterangan;
    
    // Lampiran
    const lampiranSection = document.getElementById("modal-lampiran-section");
    window._currentLampiranUrl = data.lampiran || '';
    window._currentLampiranNama = data.nama || '';
    if (data.lampiran) {
        lampiranSection.classList.remove("hidden");
    } else {
        lampiranSection.classList.add("hidden");
    }

    const statusBadge = document.getElementById("modal-status");
    statusBadge.textContent = data.status;
    statusBadge.className = "inline-block px-3 py-1 rounded-full text-sm font-semibold";
    
    // Form Actions
    const approveForm = document.getElementById("approveForm");
    const rejectForm = document.getElementById("rejectFormReal");
    const modalActions = document.getElementById("modal-actions");
    
    approveForm.action = `/admin/kelola-izin/${data.id}/approve`;
    rejectForm.action = `/admin/kelola-izin/${data.id}/reject`;

    // Reset reject form visibility
    rejectForm.classList.add("hidden");

    if (data.status === "Pending") {
        statusBadge.classList.add("bg-orange-100", "text-orange-700");
        modalActions.classList.remove("hidden");
    } else {
        modalActions.classList.add("hidden");
        if (data.status === "Approved" || data.status === "Disetujui") {
            statusBadge.classList.add("bg-green-100", "text-green-700");
        } else {
            statusBadge.classList.add("bg-red-100", "text-red-700");
        }
    }

    // Tampilkan modal detail
    detailModal.classList.remove("hidden");
    overlay.classList.remove("hidden");
    document.body.classList.add("overflow-hidden");
}

// Close detail modal
closeDetailBtn?.addEventListener("click", () => {
    detailModal.classList.add("hidden");
    overlay.classList.add("hidden");
    document.body.classList.remove("overflow-hidden");
    document.getElementById("rejectFormReal").classList.add("hidden");
    document.getElementById("modal-actions").classList.remove("hidden");
});

// Toggle reject form
document.getElementById("toggleRejectBtn")?.addEventListener("click", () => {
    document.getElementById("modal-actions").classList.add("hidden");
    document.getElementById("rejectFormReal").classList.remove("hidden");
});

document.getElementById("cancelRejectBtn")?.addEventListener("click", () => {
    document.getElementById("modal-actions").classList.remove("hidden");
    document.getElementById("rejectFormReal").classList.add("hidden");
});

// Open lampiran popup from detail modal
window.openLampiranFromDetail = function() {
    if (window._currentLampiranUrl) {
        // Close detail modal first
        detailModal.classList.add("hidden");
        overlay.classList.add("hidden");
        // Open lampiran popup
        openLampiranPopup(window._currentLampiranUrl, window._currentLampiranNama);
    }
}
</script>
@endpush