@extends('layout.master')

@section('title', 'Ajukan Izin')

@section('content')
  <div class="container mx-auto px-4 py-8 min-h-screen">
    
    {{-- Notifikasi --}}
    @if (session('success'))
      <div class="card-futuristic p-4 mb-6 border-l-4 border-emerald-500 flex items-center gap-3 animate-slide-up bg-emerald-50/50">
        <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
          </svg>
        </div>
        <span class="text-emerald-800 font-medium">{{ session('success') }}</span>
      </div>
    @endif
    
    {{-- Header Section --}}
    <div class="relative overflow-hidden card-futuristic p-6 mb-8 animate-fade-in">
      <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-blue-600 to-cyan-500 opacity-95 rounded-2xl"></div>
      <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/5 to-white/10 rounded-2xl"></div>
      
      {{-- Decorative --}}
      <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
      <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-cyan-300/20 rounded-full blur-2xl"></div>
      
      <div class="relative z-10 flex items-center justify-between">
        <div>
          <h4 class="font-bold text-white text-xl flex items-center gap-3">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
            </div>
            Ajukan Permohonan Izin
          </h4>
          <p class="text-lg text-white/90 mt-2 ml-13">
            Kirim permohonan izin tidak masuk sekolah dengan mudah
          </p>
        </div>
        <div class="hidden md:block">
          <div class="w-20 h-20 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm animate-float-slow">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    {{-- Form Section --}}
    <div class="card-futuristic p-8 animate-slide-up" style="animation-delay: 0.1s">
      <form action="{{ route('izin.submit') }}" method="POST" class="space-y-6">
        @csrf
        
        {{-- Nama Siswa --}}
        <div class="animate-fade-in" style="animation-delay: 0.15s">
          <label for="nama_siswa" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
              <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
            </div>
            Nama Siswa
          </label>
          <input 
            type="text" 
            id="nama_siswa" 
            name="nama_siswa"
            class="input-futuristic w-full"
            placeholder="Masukkan nama siswa..."
            required
          >
        </div>

        {{-- Tanggal Izin --}}
        <div class="animate-fade-in" style="animation-delay: 0.2s">
          <label for="tanggal_izin" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
              <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            Tanggal Izin
          </label>
          <input 
            type="date" 
            id="tanggal_izin" 
            name="tanggal_izin"
            class="input-futuristic w-full"
            required
          >
        </div>

        {{-- Alasan --}}
        <div class="flex flex-col relative animate-fade-in" style="animation-delay: 0.25s">
          <label for="alasan" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
              <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            Alasan
          </label>
          <div class="relative">
            <select 
              id="alasan" 
              name="alasan" 
              class="input-futuristic w-full appearance-none cursor-pointer pr-12"
              required
            >
              <option value="">Pilih Alasan</option>
              <option value="S (Sakit)">🏥 S (Sakit)</option>
              <option value="I (Ijin)">📝 I (Ijin)</option>
              <option value="A (Alfa)">⚠️ A (Alfa)</option>
              <option value="Lainnya">📋 Lainnya</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
          </div>
        </div>

        {{-- Keterangan Detail --}}
        <div class="animate-fade-in" style="animation-delay: 0.3s">
          <label for="keterangan" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
              <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
              </svg>
            </div>
            Keterangan Detail
          </label>
          <textarea
            id="keterangan" 
            name="keterangan" 
            rows="4"
            maxlength="250"
            class="input-futuristic w-full resize-none"
            placeholder="Jelaskan keterangan lebih detail..."
          ></textarea>
          <p class="text-xs text-gray-400 mt-2 text-right">Maksimal 250 karakter</p>
        </div>

        {{-- Submit Button --}}
        <div class="pt-4 animate-fade-in" style="animation-delay: 0.35s">
          <button 
            type="submit"
            class="btn-futuristic w-full py-4 text-lg flex items-center justify-center gap-3"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
            </svg>
            Kirim Permohonan
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
