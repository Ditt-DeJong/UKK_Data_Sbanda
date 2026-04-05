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

    {{-- Mading / Pengumuman --}}
    @if(isset($pengumuman) && count($pengumuman) > 0)
    <div class="mb-8">
      <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
        </svg>
        Mading Digital
      </h3>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        @foreach($pengumuman as $index => $item)
        <div class="card-futuristic p-5 hover-lift relative overflow-hidden group animate-slide-up" style="animation-delay: {{ 0.1 * $index }}s">
          @if($item->tipe == 'penting')
            <div class="absolute top-0 left-0 w-1.5 h-full bg-gradient-to-b from-red-400 to-red-600"></div>
          @elseif($item->tipe == 'libur')
            <div class="absolute top-0 left-0 w-1.5 h-full bg-gradient-to-b from-emerald-400 to-emerald-600"></div>
          @else
            <div class="absolute top-0 left-0 w-1.5 h-full bg-gradient-to-b from-blue-400 to-blue-600"></div>
          @endif
          
          <div class="flex justify-between items-start mb-2 pl-2">
            <h4 class="font-bold text-gray-800 text-lg">{{ $item->judul }}</h4>
            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full whitespace-nowrap">{{ $item->created_at->diffForHumans() }}</span>
          </div>
          <p class="text-gray-600 text-sm leading-relaxed whitespace-pre-line pl-2">{{ $item->konten }}</p>
        </div>
        @endforeach
      </div>
    </div>
    @endif

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

    {{-- Nilai Akademik Section --}}
    @if(isset($nilaiAkademik) && count($nilaiAkademik) > 0)
    <div class="card-futuristic p-6 lg:p-8 mb-8 animate-slide-up" style="animation-delay: 0.35s">
      <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-6 pb-4 border-b border-gray-100">
        <div>
          <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-fuchsia-500 to-fuchsia-600 rounded-xl flex items-center justify-center">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
              </svg>
            </div>
            Nilai Tugas & Ulangan
          </h3>
          <p class="text-gray-500 mt-1 ml-13">Pembaruan data nilai akademik terbaru</p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($nilaiAkademik as $index => $nilai)
        <div class="border border-gray-200 rounded-2xl p-4 flex items-center justify-between hover:bg-fuchsia-50 transition-colors">
          <div>
            <span class="text-xs font-semibold text-fuchsia-600 bg-fuchsia-100 px-2 py-1 rounded-lg">{{ $nilai->jenis_nilai }}</span>
            <h4 class="font-bold text-gray-800 mt-2">{{ $nilai->mata_pelajaran }}</h4>
            <p class="text-xs text-gray-500 mt-1">{{ $nilai->created_at->format('d M Y') }}</p>
          </div>
          <div class="w-14 h-14 shrink-0 rounded-full flex flex-col items-center justify-center font-bold text-lg {{ $nilai->nilai_angka >= 75 ? 'bg-gradient-to-br from-emerald-100 to-emerald-200 text-emerald-700 ring-4 ring-emerald-50' : 'bg-gradient-to-br from-red-100 to-red-200 text-red-700 ring-4 ring-red-50' }}">
            {{ $nilai->nilai_angka }}
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif

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
          <p class="text-gray-500 mt-1 ml-13">Bulan {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
        </div>
        <div class="mt-4 lg:mt-0 relative">
          <select id="statusFilter" onchange="filterKehadiran()" class="input-futuristic appearance-none pr-12 cursor-pointer">
            <option value="">Semua Status</option>
            <option value="HADIR">✅ Hadir</option>
            <option value="IZIN">📋 Izin</option>
            <option value="SAKIT">🏥 Sakit</option>
            <option value="ALPHA">❌ Alpha</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </div>
        </div>
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
            <tr class="hover:bg-blue-50/50 transition-all duration-200 group animate-fade-in kehadiran-row" data-status="{{ $kehadiran->status }}" style="animation-delay: {{ 0.05 * $index }}s">
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

<script>
function filterKehadiran() {
    const selectedStatus = document.getElementById('statusFilter').value;
    const rows = document.querySelectorAll('.kehadiran-row');
    
    rows.forEach(row => {
        if (!selectedStatus || row.dataset.status === selectedStatus) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>
@endsection