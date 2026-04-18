@extends('layout.master')

@section('title', 'Jadwal Pelajaran Anak')

@section('content')
  <div class="w-full px-4 sm:px-8 xl:px-12 pb-16">
    
    {{-- Main Header --}}
    <div class="card-friendly mb-10 bg-gradient-to-r from-blue-600 to-indigo-600 border-none text-white overflow-hidden relative p-8 sm:p-12">
        <div class="absolute -top-16 -left-16 w-64 h-64 bg-white/10 rounded-full blur-[40px]"></div>
        <div class="relative z-10">
            <h1 class="text-2xl sm:text-3xl font-bold mb-2 tracking-tight">Jadwal Belajar Anak</h1>
            <p class="text-base font-semibold text-blue-100 mb-0">Lihat jam mulai dan selesai setiap mata pelajaran di sekolah.</p>
        </div>
    </div>

    @if(isset($jadwal) && $jadwal->count() > 0)
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
        @php
            $hariOrder = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        @endphp

        @foreach($hariOrder as $h)
        @php
            $jadwalHari = $jadwal->get($h, collect());
        @endphp
        @if($jadwalHari->count() > 0)
        <div class="card-friendly bg-white border-2 border-slate-100 p-0 overflow-hidden group hover:border-blue-200 hover:shadow-xl transition-all duration-500">
            <div class="bg-blue-600 px-6 py-4 text-white">
                <h3 class="text-xl font-bold tracking-tight uppercase">{{ $h }}</h3>
            </div>
            <div class="p-4 space-y-4">
                @foreach($jadwalHari as $item)
                <div class="p-5 rounded-3xl bg-slate-50 border-2 border-slate-100 group-hover:bg-white transition-colors">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-bold tracking-wide">
                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                        </span>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2 leading-tight">{{ $item->mata_pelajaran }}</h4>
                    <div class="flex flex-col gap-1.5">
                        <p class="text-sm text-slate-600 font-semibold flex items-center gap-2">
                            <span class="w-6 h-6 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-user-tie text-[0.6rem]"></i>
                            </span>
                            {{ $item->guru }}
                        </p>
                        @if($item->ruangan)
                        <p class="text-xs text-slate-500 font-semibold flex items-center gap-2">
                            <span class="w-6 h-6 bg-slate-100 text-slate-500 rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-location-dot text-[0.6rem]"></i>
                            </span>
                            {{ $item->ruangan }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @else
    <div class="card-friendly p-12 text-center border-2 border-dashed border-slate-300 bg-slate-50">
        <div class="w-20 h-20 mb-6 bg-white rounded-full flex items-center justify-center mx-auto shadow-sm border-2 border-slate-200">
            <i class="fa-solid fa-calendar-xmark text-3xl text-slate-300"></i>
        </div>
        <h2 class="text-xl font-bold text-slate-900 mb-3">Jadwal Belum Tersedia</h2>
        <p class="text-base text-slate-600 font-semibold max-w-lg mx-auto leading-relaxed">
            Bapak & Ibu yang terhormat, guru kelas masih dalam proses menyusun jadwal pelajaran. Mohon dicek kembali nanti ya!
        </p>
    </div>
    @endif
    
  </div>
@endsection