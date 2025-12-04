@extends('layout.master')

@section('title', 'Kehadiran')

@section('content')
  <div class="container mx-auto px-4 py-8 min-h-screen">
      <div class="bg-blue-500 p-3 mb-8 text-lg rounded-lg shadow" role="alert">
        <h4 class="font-bold text-white text-lg">Selamat Datang di Data Sbanda..!! 
        </h4>
        <span class="text-xl text-white opacity-90">
            Anda Dapat Memantau Absensi Anda Disini
        <span>
      </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
            <!-- Hari Hadir Card -->
            <div class="bg-white rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl hover:shadow-cyan-300 transform hover:-translate-y-2 transition-all duration-300 relative overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
                <div class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-400 mb-3">20</div>
                <div class="text-gray-600 font-semibold text-lg">Hari Hadir</div>
                <div class="absolute -bottom-2 -right-2 w-20 h-20 bg-sky-200 rounded-full opacity-20 group-hover:opacity-90 transition-opacity duration-300"></div>
            </div>

            <!-- Hari Izin Card -->
            <div class="bg-white rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl hover:shadow-orange-300 transform hover:-translate-y-2 transition-all duration-300 relative overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-pink-500 to-yellow-400"></div>
                <div class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-400 mb-3">2</div>
                <div class="text-gray-600 font-semibold text-lg">Hari Izin</div>
                <div class="absolute -bottom-2 -right-2 w-20 h-20 bg-orange-200 rounded-full opacity-20 group-hover:opacity-90 transition-opacity duration-300"></div>
            </div>

            <!-- Persentase Kehadiran Card -->
            <div class="bg-white rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl hover:shadow-emerald-300 transform hover:-translate-y-2 transition-all duration-300 relative overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-green-400 to-blue-500"></div>
                <div class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 mb-3">90%</div>
                <div class="text-gray-600 font-semibold text-lg">Persentase Kehadiran</div>
                <div class="absolute -bottom-2 -right-2 w-20 h-20 bg-teal-200 rounded-full opacity-20 group-hover:opacity-90 transition-opacity duration-300"></div>
            </div>
        </div>

        <!-- Riwayat Kehadiran Section -->
        <div class="bg-white rounded-2xl p-6 lg:p-8 shadow-lg mb-8">
            <!-- Section Header -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 pb-4 border-b-2 border-gray-100">
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4 lg:mb-0">Riwayat Kehadiran</h3>
                <button class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white px-6 py-2 !rounded-lg font-semibold hover:from-blue-600 hover:to-cyan-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <span>Filter</span>
                </button>
            </div>

            <!-- Subtitle -->
            <div class="mb-6">
                <span class="text-gray-600 font-semibold text-lg">5 Hari Terakhir</span>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto rounded-xl border border-gray-200">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">Tanggal</th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">Status</th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6 text-gray-700 font-medium">01-08-2025</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center  px-3 py-1 text-sm font-bold text-green-800 bg-green-100 rounded-lg">
                                    HADIR
                                </span>
                            </td>
                            <td class="py-4 px-6 text-gray-600">Tepat Waktu</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6 text-gray-700 font-medium">01-08-2025</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center justify-center px-3 py-1 text-sm font-bold text-yellow-800 bg-yellow-100 rounded-lg">
                                    SAKIT
                                </span>
                            </td>
                            <td class="py-4 px-6 text-gray-600">Sakit Demam</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6 text-gray-700 font-medium">01-08-2025</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-bold text-green-800 bg-green-100 rounded-lg">
                                    HADIR
                                </span>
                            </td>
                            <td class="py-4 px-6 text-gray-600">Tepat Waktu</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6 text-gray-700 font-medium">01-08-2025</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-bold text-blue-800 bg-blue-100 rounded-lg">
                                    IZIN
                                </span>
                            </td>
                            <td class="py-4 px-6 text-gray-600">Absen Keluarga</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6 text-gray-700 font-medium">01-08-2025</td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-bold text-green-800 bg-green-100 rounded-lg">
                                    HADIR
                                </span>
                            </td>
                            <td class="py-4 px-6 text-gray-600">Tepat Waktu</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection