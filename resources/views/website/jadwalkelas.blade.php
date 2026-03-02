@extends('layout.master')

@section('title', 'Jadwal Kelas')

@section('content')
  <div class="container mx-auto px-4 py-8 min-h-screen">
    
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            Jadwal Pelajaran
          </h4>
          <p class="text-lg text-white/90 mt-2 ml-13">
            Lihat jadwal pelajaran anak Anda disini
          </p>
        </div>
        <div class="hidden md:block">
          <div class="w-20 h-20 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm animate-float-slow">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    {{-- Coming Soon Content --}}
    <div class="card-futuristic p-12 animate-slide-up" style="animation-delay: 0.1s">
      <div class="text-center">
        {{-- Animated Icon --}}
        <div class="relative w-32 h-32 mx-auto mb-8">
          <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-3xl animate-pulse-glow"></div>
          <div class="absolute inset-1 bg-white rounded-3xl flex items-center justify-center">
            <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
          </div>
          {{-- Floating dots --}}
          <div class="absolute -top-2 -right-2 w-4 h-4 bg-blue-400 rounded-full animate-float"></div>
          <div class="absolute -bottom-1 -left-1 w-3 h-3 bg-cyan-400 rounded-full animate-float-slow"></div>
        </div>
        
        <h3 class="text-2xl font-bold text-gray-800 mb-3">Fitur Segera Hadir</h3>
        <p class="text-gray-500 max-w-md mx-auto mb-8">
          Jadwal pelajaran sedang dalam tahap pengembangan. Anda akan dapat melihat jadwal lengkap pelajaran anak Anda segera.
        </p>
        
        {{-- Feature Preview Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-2xl mx-auto">
          <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-100 hover-lift">
            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-3">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <p class="text-sm font-medium text-gray-700">Jadwal Harian</p>
          </div>
          
          <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-100 hover-lift">
            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-3">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
            </div>
            <p class="text-sm font-medium text-gray-700">Info Guru</p>
          </div>
          
          <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-100 hover-lift">
            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-3">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
              </svg>
            </div>
            <p class="text-sm font-medium text-gray-700">Notifikasi</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection