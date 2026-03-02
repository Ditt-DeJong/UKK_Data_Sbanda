@extends('layout.master')

@section('title', 'Kehadiran')

@section('content')
  <div class="container mx-auto px-4 py-8 min-h-screen">
    
    {{-- Welcome Banner --}}
    <div class="relative overflow-hidden card-futuristic p-6 mb-8 animate-fade-in">
      {{-- Decorative gradient --}}
      <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-blue-600 to-cyan-500 opacity-95 rounded-2xl"></div>
      <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/5 to-white/10 rounded-2xl"></div>
      
      {{-- Decorative circles --}}
      <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
      <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-cyan-300/20 rounded-full blur-2xl"></div>
      
      <div class="relative z-10 flex items-center justify-between">
        <div>
          <h4 class="font-bold text-white text-xl flex items-center gap-3">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            Selamat Datang di Data Sbanda..!!
          </h4>
          <p class="text-lg text-white/90 mt-2 ml-13">
            Anda Dapat Memantau Absensi Anak Anda Disini
          </p>
        </div>
        <div class="hidden md:block">
          <div class="w-20 h-20 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm animate-float-slow">
            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3ZM18.82 9L12 12.72L5.18 9L12 5.28L18.82 9ZM17 15.99L12 18.72L7 15.99V12.27L12 15L17 12.27V15.99Z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
      
      {{-- Hari Hadir Card --}}
      <div class="card-futuristic p-8 text-center hover-lift animate-slide-up relative overflow-hidden group" style="animation-delay: 0.1s">
        {{-- Top accent line --}}
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
        {{-- Glow effect on hover --}}
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        
        <div class="relative z-10">
          {{-- Icon --}}
          <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-2xl flex items-center justify-center shadow-lg group-hover:animate-pulse-glow transition-all duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          
          <div class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-400 mb-2">
            {{ $statistik['hadir'] }}
          </div>
          <div class="text-gray-600 font-semibold text-lg">Hari Hadir</div>
        </div>
        
        {{-- Bottom decorative --}}
        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-gradient-to-br from-blue-200 to-cyan-200 rounded-full opacity-20 group-hover:opacity-40 group-hover:scale-125 transition-all duration-500"></div>
      </div>

      {{-- Hari Izin Card --}}
      <div class="card-futuristic p-8 text-center hover-lift animate-slide-up relative overflow-hidden group" style="animation-delay: 0.2s">
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-orange-400 to-pink-500"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-pink-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        
        <div class="relative z-10">
          <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-orange-400 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-orange-300/50 transition-all duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          </div>
          
          <div class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500 mb-2">
            {{ $statistik['izin'] }}
          </div>
          <div class="text-gray-600 font-semibold text-lg">Hari Izin/Sakit</div>
        </div>
        
        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-gradient-to-br from-orange-200 to-pink-200 rounded-full opacity-20 group-hover:opacity-40 group-hover:scale-125 transition-all duration-500"></div>
      </div>

      {{-- Persentase Kehadiran Card --}}
      <div class="card-futuristic p-8 text-center hover-lift animate-slide-up relative overflow-hidden group" style="animation-delay: 0.3s">
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-400 to-teal-500"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-400/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        
        <div class="relative z-10">
          <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-emerald-300/50 transition-all duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
          </div>
          
          <div class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-500 mb-2">
            {{ $statistik['persentase'] }}%
          </div>
          <div class="text-gray-600 font-semibold text-lg">Persentase Kehadiran</div>
        </div>
        
        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-gradient-to-br from-emerald-200 to-teal-200 rounded-full opacity-20 group-hover:opacity-40 group-hover:scale-125 transition-all duration-500"></div>
      </div>
    </div>

    {{-- Riwayat Kehadiran Section --}}
    <div class="card-futuristic p-6 lg:p-8 mb-8 animate-slide-up" style="animation-delay: 0.4s">
      {{-- Section Header --}}
      <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 pb-4 border-b border-gray-100">
        <div>
          <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            Riwayat Kehadiran
          </h3>
          <p class="text-gray-500 mt-1 ml-13">Pantau kehadiran 5 hari terakhir</p>
        </div>
        <button class="btn-futuristic mt-4 lg:mt-0 flex items-center gap-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
          </svg>
          <span>Filter</span>
        </button>
      </div>

      {{-- Table Container --}}
      <div class="overflow-x-auto rounded-xl border border-gray-200/50">
        @if($riwayatKehadiran->count() > 0)
        <table class="w-full">
          <thead>
            <tr class="bg-gradient-to-r from-gray-50 to-gray-100/50">
              <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Tanggal</th>
              <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Status</th>
              <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Keterangan</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @foreach($riwayatKehadiran as $index => $kehadiran)
            <tr class="hover:bg-blue-50/50 transition-all duration-200 group animate-fade-in" style="animation-delay: {{ 0.1 * $index }}s">
              <td class="py-4 px-6 text-gray-700 font-medium">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 font-bold group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                    {{ \Carbon\Carbon::parse($kehadiran->tanggal)->format('d') }}
                  </div>
                  <div>
                    <p class="font-semibold">{{ \Carbon\Carbon::parse($kehadiran->tanggal)->translatedFormat('l') }}</p>
                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($kehadiran->tanggal)->format('d M Y') }}</p>
                  </div>
                </div>
              </td>
              <td class="py-4 px-6">
                @if($kehadiran->status === 'HADIR')
                  <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-emerald-700 bg-emerald-100 rounded-xl group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    HADIR
                  </span>
                @elseif($kehadiran->status === 'SAKIT')
                  <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-amber-700 bg-amber-100 rounded-xl group-hover:bg-amber-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    SAKIT
                  </span>
                @elseif($kehadiran->status === 'IZIN')
                  <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-blue-700 bg-blue-100 rounded-xl group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    IZIN
                  </span>
                @else
                  <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-red-700 bg-red-100 rounded-xl group-hover:bg-red-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    ALPHA
                  </span>
                @endif
              </td>
              <td class="py-4 px-6 text-gray-600">{{ $kehadiran->keterangan ?? '-' }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        {{-- Empty State --}}
        <div class="text-center py-16">
          <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl flex items-center justify-center mb-6 animate-float-slow">
            <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-700">Belum Ada Data Kehadiran</h3>
          <p class="mt-2 text-gray-500">Data kehadiran akan otomatis muncul setiap hari kerja</p>
          <p class="mt-1 text-sm text-gray-400">Sistem akan generate kehadiran dengan status "HADIR" secara otomatis</p>
        </div>
        @endif
      </div>
    </div>
  </div>
@endsection