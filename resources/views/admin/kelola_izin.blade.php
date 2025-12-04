<x-mainLayout 
    title="Persetujuan Ijin" 
    :active="'kelola-izin'"
    pageTitle="Persetujuan Ijin"
    pageSubtitle="Kelola sistem absensi dan pendataan siswa"
    :notifCount="3">

<!-- Notification Modal Component -->
<x-notifModal />

<!-- Detail Izin Modal Component -->
<x-ijinModal />

<!-- Detail Data Siswa Component -->
<x-siswa-modal />

<!-- Detail Data Kehadiran Component -->
<x-kehadiran-modal />

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
                    <h3 class="text-3xl font-bold text-blue-600">7</h3>
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
                    <button class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold text-sm transition hover:bg-blue-700">
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
                            <td class="px-6 py-4 text-gray-600">6</td>
                            <td class="px-6 py-4 text-gray-600">Ibu Haliza</td>
                            <td class="px-6 py-4 text-gray-600">Keperluan keluarga</td>
                            <td class="px-6 py-4 text-gray-600">2025-10-06</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-xs font-semibold">Pending</span>
                            </td>
                            <td class="px-6 py-4">
                                <button onclick="openDetailModal({
                                    nama: 'Siti Nurhaliza',
                                    kelas: 'XI-B',
                                    ortu: 'Ibu Haliza',
                                    alasan: 'Keperluan keluarga',
                                    mulai: '2025-10-06',
                                    selesai: '2025-10-06',
                                    diajukan: '2025-10-05 16:20',
                                    status: 'Pending',
                                    keterangan: 'Ada acara keluarga yang tidak bisa ditinggalkan.'
                                })" class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1 transition">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>

                        <!-- Row 2 - Disetujui -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-800">Ahmad Fauzi</p>
                            </td>
                            <td class="px-6 py-4 text-gray-600">6</td>
                            <td class="px-6 py-4 text-gray-600">Bapak Fauzi</td>
                            <td class="px-6 py-4 text-gray-600">Sakit demam</td>
                            <td class="px-6 py-4 text-gray-600">2025-10-05</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Disetujui</span>
                            </td>
                            <td class="px-6 py-4">
                                <button onclick="openDetailModal({
                                    nama: 'Ahmad Fauzi',
                                    kelas: '6',
                                    ortu: 'Bapak Fauzi',
                                    alasan: 'Sakit demam',
                                    mulai: '2025-10-05',
                                    selesai: '2025-10-06',
                                    diajukan: '2025-10-05 16:20',
                                    status: 'Disetujui',
                                    keterangan: 'Sakit demam sudah 3 hari.'
                                })" class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1 transition">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>

                        <!-- Row 3 - Ditolak -->
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-800">Budi Santoso</p>
                            </td>
                            <td class="px-6 py-4 text-gray-600">6</td>
                            <td class="px-6 py-4 text-gray-600">Ibu Santi</td>
                            <td class="px-6 py-4 text-gray-600">Liburan keluarga</td>
                            <td class="px-6 py-4 text-gray-600">2025-10-03</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Ditolak</span>
                            </td>
                            <td class="px-6 py-4">
                                <button onclick="openDetailModal({
                                    nama: 'Budi Santoso',
                                    kelas: '6',
                                    ortu: 'Ibu Santi',
                                    alasan: 'Liburan keluarga',
                                    mulai: '2025-10-03',
                                    selesai: '2025-10-05',
                                    diajukan: '2025-10-03 16:20',
                                    status: 'Disetujui',
                                    keterangan: 'Mau liburan dulu cuyy.'
                                })" class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1 transition">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-mainLayout>

