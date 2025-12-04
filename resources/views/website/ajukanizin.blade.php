@extends('layout.master')

@section('title', 'Ajukan Izin')

@section('content')
  <div class="container mx-auto px-4 py-8 min-h-screen">
    <!-- Notifikasi -->
    @if (session('success'))
      <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
        {{ session('success') }}
      </div>
    @endif
      
      <!-- Header Section -->
      <div class="bg-blue-500 p-3 mb-8 text-lg rounded-lg shadow" role="alert">
        <h4 class="font-bold text-white text-lg">
          Ajukan Permohonan Izin
        </h4>
        <span class="text-xl text-white opacity-90">
            Kirim permohonan izin tidak masuk sekolah dengan mudah
          </span>
      </div>

      <!-- Form Section -->
      <div class="bg-white rounded-2xl p-8 shadow-lg">
        <form action="{{ route('izin.submit') }}" method="POST" class="space-y-6">
          @csrf
          
          <!-- Nama Siswa -->
          <div>
            <label for="nama_siswa" class="block text-gray-700 font-semibold mb-2">
              Nama Siswa
            </label>
            <input 
              type="text" 
              id="nama_siswa" 
              name="nama_siswa"
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200"
              placeholder="Masukkan nama siswa..."
              required
            >
          </div>

          <!-- Tanggal Izin -->
          <div>
            <label for="tanggal_izin" class="block text-gray-700 font-semibold mb-2">
              Tanggal Izin
            </label>
            <input 
              type="date" 
              id="tanggal_izin" 
              name="tanggal_izin"
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition"
              required
            >
          </div>

          <!-- Alasan -->
          <div class="flex flex-col relative">
            <label for="alasan" class="block text-gray-700 font-semibold mb-2">
               Alasan
            </label>
            <select 
              id="alasan" 
              name="alasan" 
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition bg-white appearance-none"
              required
            >
              <option value="">Pilih Alasan</option>
              <option value="S (Sakit)">S (Sakit)</option>
              <option value="I (Ijin)">I (Ijin)</option>
              <option value="A (Alfa)">A (Alfa)</option>
              <option value="Lainnya">Lainnya</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-3 top-9 flex items-center text-gray-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
          </div>

          <!-- Keterangan Detail -->
          <div>
            <label for="keterangan" class="block text-gray-700 font-semibold mb-2">
              Keterangan Detail
            </label>
            <textarea
              id="keterangan" 
              name="keterangan" 
              cols="50"
              rows="3"
              maxlength="250"
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition resize-none overflow-hidden"
              placeholder="Jelaskan keterangan lebih detail..."
            ></textarea>
          </div>

          <!-- Submit Button -->
          <div class="pt-4">
            <button 
              type="submit"
              class="w-full bg-blue-500 text-white font-semibold py-3 !rounded-lg hover:bg-blue-600 transition transform hover:-translate-y-1 shadow-md hover:shadow-lg"
            >
              Kirim Permohonan
            </button>
          </div>
        </form>
      </div>
  </div>
@endsection
