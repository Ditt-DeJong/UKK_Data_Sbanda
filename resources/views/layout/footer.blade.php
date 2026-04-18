<footer class="mt-auto z-10 w-full bg-white border-t border-slate-200 pt-12 pb-8 px-4 sm:px-8 xl:px-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 mb-10">
        {{-- Branding --}}
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center shrink-0 text-white shadow-md">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h3 class="font-black text-xl text-slate-900 tracking-tight leading-none">SD Bandungrejo 2</h3>
                    <p class="text-blue-600 font-bold text-[0.65rem] uppercase tracking-widest mt-1">Portal Orang Tua</p>
                </div>
            </div>
            <p class="text-sm text-slate-500 font-medium leading-relaxed max-w-xs">
                Sistem informasi kehadiran dan akademik terpadu untuk mempermudah peran serta orang tua dalam memantau perkembangan siswa di sekolah.
            </p>
        </div>

        {{-- Layanan --}}
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <h4 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-4">Menu Utama</h4>
            <ul class="space-y-3 font-semibold text-sm text-slate-500">
                <li><a href="{{ route('kehadiran') }}" class="hover:text-blue-600 transition-colors">Cek Kehadiran Anak</a></li>
                <li><a href="{{ route('ajukanizin') }}" class="hover:text-blue-600 transition-colors">Buat Surat Izin</a></li>
                <li><a href="{{ route('jadwalkelas') }}" class="hover:text-blue-600 transition-colors">Lihat Jadwal Pelajaran</a></li>
            </ul>
        </div>

        {{-- Hubungi Kami --}}
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
            <h4 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-4">Pusat Bantuan</h4>
            <ul class="space-y-3 font-semibold text-sm text-slate-500">
                <li class="flex items-center gap-2 justify-center md:justify-start">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>admin@sdbandungrejo2.sch.id</span>
                </li>
                <li class="flex items-center gap-2 justify-center md:justify-start">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>Hubungi Guru Via Sistem</span>
                </li>
                <li class="flex items-center gap-2 justify-center md:justify-start mt-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-md text-xs font-bold bg-green-50 text-green-700 border border-green-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Jam Layanan 07:00 - 15:00
                    </span>
                </li>
            </ul>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="max-w-7xl mx-auto pt-6 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-xs text-slate-500 font-medium">
            &copy; {{ date('Y') }} SD Bandungrejo 2. Hak Cipta Dilindungi Undang-Undang.
        </p>
        <div class="flex items-center gap-4 text-xs font-medium text-slate-400">
            <a href="#" class="hover:text-blue-600 transition-colors">Kebijakan Privasi</a>
            <span class="text-slate-200">&bull;</span>
            <a href="#" class="hover:text-blue-600 transition-colors">Syarat & Ketentuan</a>
        </div>
    </div>
</footer>