@extends('layout.master')

@section('title', 'Cek Kehadiran Anak')

@section('content')
  <div class="w-full px-4 sm:px-8 xl:px-12">
    
    {{-- Main Header Bulete --}}
    <div class="card-friendly mb-8  mt-6 bg-gradient-to-r from-blue-600 to-indigo-600 border-none text-white overflow-hidden relative p-8 sm:p-10">
        <div class="absolute -top-16 -right-16 w-48 h-48 bg-white/20 rounded-full blur-[30px]"></div>
        <div class="relative z-10">
            <h1 class="text-2xl sm:text-3xl font-bold mb-2 tracking-tight">Cek Kehadiran Anak Anda</h1>
            <p class="text-base font-semibold text-blue-100 mb-0">Lihat ringkasan hari anak bersekolah atau meminta izin bulan ini.</p>
        </div>
    </div>

    @if($belumDiabsen)
    <div class="card-friendly mb-8 border-4 border-amber-100 bg-amber-50 p-6 sm:p-8 animate-pulse-slow">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="w-20 h-20 shrink-0 bg-amber-200 text-amber-800 rounded-2xl flex items-center justify-center shadow-sm">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-xl font-bold text-amber-900 mb-2 leading-tight">Kehadiran Hari Ini Belum Tercatat</h2>
                <p class="text-base font-semibold text-amber-800 mb-4 opacity-90">Batas jam masuk ({{ config('app.batas_jam_hadir') }}) sudah terlewati, namun guru kelas belum melakukan absensi. Harap tanyakan status kehadiran anak Anda.</p>
                <a href="{{ $linkWaGuru }}" target="_blank" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-full text-sm font-bold shadow-lg shadow-emerald-600/20 transition-all hover:-translate-y-0.5 active:translate-y-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.937 3.659 1.431 5.63 1.432h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    Tanyakan Ke Guru Lewat WhatsApp
                </a>
            </div>
        </div>
    </div>
    @endif

    {{-- Big Summary Tiles --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
      
      {{-- Card Hadir --}}
      <div class="card-friendly border-2 border-emerald-100 bg-emerald-50 relative group p-6">
          <div class="flex flex-col items-center justify-center text-center">
              <div class="w-20 h-20 mb-4 bg-emerald-200 text-emerald-800 rounded-full flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform">
                  <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              </div>
              <h3 class="text-lg font-bold text-emerald-900 mb-1 tracking-wide">Hari Anak Masuk</h3>
              <div class="text-4xl font-bold text-emerald-700">{{ $statistik['hadir'] ?? 0 }} <span class="text-base font-semibold text-emerald-800">Hari</span></div>
          </div>
      </div>

      {{-- Card Izin --}}
      <div class="card-friendly border-2 border-rose-100 bg-rose-50 relative group p-6">
          <div class="flex flex-col items-center justify-center text-center">
              <div class="w-20 h-20 mb-4 bg-rose-200 text-rose-800 rounded-full flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform">
                  <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              </div>
              <h3 class="text-lg font-bold text-rose-900 mb-1 tracking-wide">Izin & Sakit</h3>
              <div class="text-4xl font-bold text-rose-700">{{ $statistik['izin'] ?? 0 }} <span class="text-base font-semibold text-rose-800">Hari</span></div>
          </div>
      </div>

      {{-- Card Persentase --}}
      <div class="card-friendly border-2 border-blue-100 bg-blue-50 relative group md:col-span-2 lg:col-span-1 p-6">
          <div class="flex flex-col items-center justify-center text-center">
              <div class="w-20 h-20 mb-4 bg-blue-200 text-blue-800 rounded-full flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform">
                  <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
              </div>
              <h3 class="text-lg font-bold text-blue-900 mb-1 tracking-wide">Persentase Masuk</h3>
              <div class="text-4xl font-bold text-blue-700">{{ $statistik['persentase'] ?? 100 }}<span class="text-2xl">%</span></div>
          </div>
      </div>

    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
        {{-- Mading / Pengumuman --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800 m-0 leading-none">Mading Sekolah</h2>
            </div>
            
            <div class="flex flex-col gap-4">
                @forelse($pengumuman as $info)
                <div class="card-friendly p-5 bg-white border-2 border-slate-200 hover:border-blue-300 transition-colors">
                    <div class="flex items-center justify-between mb-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold leading-non bg-blue-100 text-blue-800">
                            {{ $info->tipe ?? 'PENGUMUMAN' }}
                        </span>
                        <span class="text-xs font-bold text-slate-400">{{ \Carbon\Carbon::parse($info->created_at)->diffForHumans() }}</span>
                    </div>
                    <h3 class="text-lg font-black text-slate-900 mb-1 leading-tight">{{ $info->judul }}</h3>
                    <p class="text-slate-600 text-sm font-semibold leading-relaxed m-0">{{ $info->konten }}</p>
                </div>
                @empty
                <div class="card-friendly p-8 bg-slate-50 border-2 border-slate-200 text-center flex flex-col items-center justify-center text-slate-500 font-bold">
                    <svg class="w-12 h-12 mb-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Belum ada pengumuman terbaru.
                </div>
                @endforelse
            </div>
        </div>

        {{-- Nilai Akademik --}}
        <div>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <h2 class="text-2xl font-black text-slate-800 m-0 leading-none">Nilai Terbaru</h2>
            </div>
            
            <div class="card-friendly bg-white p-0 overflow-hidden border-2 border-slate-200">
                @if(isset($nilaiAkademik) && $nilaiAkademik->count() > 0)
                <ul class="divide-y-2 divide-slate-100">
                    @foreach($nilaiAkademik as $nilai)
                    <li class="p-4 sm:p-5 flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="bg-indigo-100 text-indigo-800 text-[0.65rem] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">{{ $nilai->jenis_nilai }}</span>
                                <span class="text-xs text-slate-400 font-bold">{{ \Carbon\Carbon::parse($nilai->created_at)->format('d/m/Y') }}</span>
                            </div>
                            <h4 class="text-base font-black text-slate-800 m-0">{{ $nilai->mata_pelajaran }}</h4>
                            @if($nilai->keterangan)
                            <p class="text-xs text-slate-500 font-semibold mt-0.5">{{ $nilai->keterangan }}</p>
                            @endif
                        </div>
                        <div class="shrink-0 flex items-center justify-center w-14 h-14 rounded-2xl {{ $nilai->nilai_angka >= 75 ? 'bg-emerald-100 text-emerald-700 border-2 border-emerald-200' : 'bg-rose-100 text-rose-700 border-2 border-rose-200' }}">
                            <span class="text-xl font-black">{{ $nilai->nilai_angka }}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                <div class="px-6 py-10 text-center flex flex-col items-center justify-center text-slate-500 font-bold bg-slate-50">
                    <svg class="w-12 h-12 mb-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Belum ada nilai baru untuk bulan ini.
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Detail Table Riwayat --}}
    <div class="card-friendly bg-white p-0 overflow-hidden border-2 border-slate-200">
      <div class="bg-blue-600 px-6 py-5 text-white flex flex-col md:flex-row justify-between items-center gap-4">
          <h2 class="text-xl font-bold mb-0">Catatan Tanggal Absen</h2>
          <div class="bg-white rounded-full p-1.5 w-full md:w-auto shadow-sm">
            <select id="statusFilter" onChange="filterKehadiran(this.value)" class="w-full text-sm font-semibold bg-transparent text-slate-800 px-3 py-1.5 rounded-full cursor-pointer border-none focus:outline-none appearance-none">
                <option value="">-- TAMPILKAN SEMUA DATA --</option>
                <option value="HADIR">Tampilkan Hadir Saja</option>
                <option value="IZIN">Tampilkan Izin & Sakit</option>
            </select>
          </div>
      </div>

      <div class="overflow-x-auto w-full pb-4">
        @if(isset($riwayatKehadiran) && $riwayatKehadiran->count() > 0)
        <table class="w-full min-w-max border-collapse">
          <thead>
            <tr class="bg-blue-50 text-slate-700 font-semibold text-sm uppercase tracking-wide text-left border-b-2 border-slate-200">
              <th class="p-4 rounded-tl-2xl">Bulan & Tanggal</th>
              <th class="p-4 text-center">Status</th>
              <th class="p-4 rounded-tr-2xl">Catatan dari Guru</th>
            </tr>
          </thead>
          <tbody class="divide-y-4 divide-white">
            @foreach($riwayatKehadiran as $kehadiran)
            <tr class="bg-slate-50 hover:bg-blue-50 transition-colors kehadiran-row" data-status="{{ $kehadiran->status }}">
              <td class="p-4 text-base font-semibold text-slate-900">
                {{ \Carbon\Carbon::parse($kehadiran->tanggal)->translatedFormat('l, d F Y') }}
              </td>
              <td class="p-4 text-center">
                @if($kehadiran->status === 'HADIR')
                  <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-bold bg-emerald-100 text-emerald-800 border-2 border-emerald-200"><svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg> MASUK</span>
                @elseif($kehadiran->status === 'SAKIT')
                  <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-bold bg-rose-100 text-rose-800 border-2 border-rose-200"><svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> SAKIT</span>
                @elseif($kehadiran->status === 'IZIN')
                  <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-bold bg-blue-100 text-blue-800 border-2 border-blue-200"><svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg> IZIN</span>
                @else
                  <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-sm font-bold bg-red-100 text-red-700 border-2 border-red-200"><svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg> ALPHA</span>
                @endif
              </td>
              <td class="p-4 text-sm text-slate-600 font-semibold">
                {{ $kehadiran->keterangan ?? 'Tidak ada catatan tambahaan' }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <div class="text-center py-16 px-6 bg-slate-50 rounded-b-2xl">
          <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm border border-slate-200">
              <svg class="w-12 h-12 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          </div>
          <h3 class="text-xl font-bold text-slate-900 mb-2">Daftar Kehadiran Kosong</h3>
          <p class="text-base text-slate-600 font-semibold">Anak Anda belum memiliki catatan absen pada bulan ini.</p>
        </div>
        @endif
      </div>
    </div>
    
  </div>
@endsection

@push('scripts')
<script>
function filterKehadiran(status) {
    const rows = document.querySelectorAll('.kehadiran-row');
    let visibleCount = 0;

    rows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        let show = false;

        if (!status) {
            show = true;
        } else if (status === 'HADIR' && rowStatus === 'HADIR') {
            show = true;
        } else if (status === 'IZIN' && (rowStatus === 'IZIN' || rowStatus === 'SAKIT')) {
            show = true;
        }

        row.style.display = show ? '' : 'none';
        if (show) visibleCount++;
    });

    // Tampilkan pesan kosong jika tidak ada data yang cocok
    const emptyMsg = document.getElementById('emptyFilter');
    if (emptyMsg) {
        emptyMsg.style.display = visibleCount === 0 ? '' : 'none';
    }
}
</script>
@endpush