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

    @if (session('error'))
      <div class="card-futuristic p-4 mb-6 border-l-4 border-red-500 flex items-center gap-3 animate-slide-up bg-red-50/50">
        <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
          </svg>
        </div>
        <span class="text-red-800 font-medium">{{ session('error') }}</span>
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
      <form action="{{ route('izin.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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
            value="{{ Auth::user()->dataSiswa->nama_siswa ?? Auth::user()->name }}"
            class="input-futuristic w-full bg-gray-50 cursor-not-allowed"
            readonly
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
            value="{{ date('Y-m-d') }}"
            class="input-futuristic w-full bg-gray-50 cursor-not-allowed"
            readonly
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
              <option value="I (Izin)">📝 I (Izin)</option>
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

        {{-- Lampiran (Opsional) --}}
        <div class="animate-fade-in" style="animation-delay: 0.32s">
            <label for="lampiran" class="flex items-center gap-2 text-gray-700 font-semibold mb-3">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.414a4 4 0 00-5.656-5.656l-6.415 6.414a6 6 0 108.486 8.486L20.5 13"></path>
                    </svg>
                </div>
                Lampiran (Opsional)
            </label>
            <input 
                type="file" 
                id="lampiran" 
                name="lampiran"
                class="input-futuristic w-full file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                accept="image/*,.pdf"
            >
            <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, PDF (Maks. 2MB)</p>
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

    {{-- Riwayat Section --}}
    <div class="card-futuristic p-8 mt-8 animate-slide-up" style="animation-delay: 0.2s">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-history text-white text-sm"></i>
            </div>
            Riwayat Pengajuan
        </h3>

        <div class="overflow-x-auto rounded-xl border border-gray-100">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Alasan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Keterangan Admin</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($riwayatIzin as $izin)
                    <tr class="hover:bg-gray-50/50 transition-all group">
                        <td class="px-6 py-4 text-sm font-medium text-gray-700">
                            {{ \Carbon\Carbon::parse($izin->tanggal_izin)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $izin->alasan }}
                        </td>
                        <td class="px-6 py-4">
                            @if($izin->status === 'pending')
                                <span class="badge-amber">Menunggu</span>
                            @elseif($izin->status === 'approved')
                                <span class="badge-emerald">Disetujui</span>
                            @else
                                <span class="badge-red">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 italic">
                            {{ $izin->alasan_penolakan ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            @if($izin->status === 'pending')
                            <form action="{{ route('izin.cancel', $izin->id) }}" method="POST" onsubmit="return confirm('Batalkan pengajuan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm transition">
                                    <i class="fa-solid fa-trash mr-1"></i> Batal
                                </button>
                            </form>
                            @else
                                <span class="text-gray-300">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                            Belum ada riwayat pengajuan izin
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
  </div>
@endsection
