
<aside class="fixed top-0 left-0 h-screen w-72 bg-white/80 backdrop-blur-xl border-r border-gray-200/60 shadow-xl shadow-blue-500/5 flex flex-col justify-between z-[45]">

    <!-- Logo -->
    <div class="flex items-center gap-4 px-6 py-6 border-b border-gray-200/60">
        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30 animate-pulse-glow">
            <i class="fa-solid fa-graduation-cap text-xl"></i>
        </div>
        <div>
            <h1 class="text-lg font-bold text-gray-800">Admin Panel</h1>
            <p class="text-sm text-gray-500">Portal Orang Tua</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-6 px-4 space-y-2 overflow-y-auto">
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-4">Menu Utama</p>
        
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group
           {{ request()->routeIs('admin.dashboard') 
                ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30' 
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
            <div class="w-9 h-9 flex items-center justify-center rounded-lg transition-all duration-300
                {{ request()->routeIs('admin.dashboard') 
                    ? 'bg-white/20' 
                    : 'bg-blue-100 group-hover:bg-blue-200' }}">
                <i class="fa-solid fa-house {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-600' }}"></i>
            </div>
            <span class="font-medium">Dashboard</span>
        </a>
        
        <a href="{{ route('admin.datasiswa') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group
           {{ request()->routeIs('admin.datasiswa') 
                ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30' 
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
            <div class="w-9 h-9 flex items-center justify-center rounded-lg transition-all duration-300
                {{ request()->routeIs('admin.datasiswa') 
                    ? 'bg-white/20' 
                    : 'bg-emerald-100 group-hover:bg-emerald-200' }}">
                <i class="fa-solid fa-users {{ request()->routeIs('admin.datasiswa') ? 'text-white' : 'text-emerald-600' }}"></i>
            </div>
            <span class="font-medium">Data Siswa</span>
        </a>
        
        <a href="{{ route('admin.kehadiransiswa') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group
           {{ request()->routeIs('admin.kehadiransiswa') 
                ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30' 
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
            <div class="w-9 h-9 flex items-center justify-center rounded-lg transition-all duration-300
                {{ request()->routeIs('admin.kehadiransiswa') 
                    ? 'bg-white/20' 
                    : 'bg-purple-100 group-hover:bg-purple-200' }}">
                <i class="fa-solid fa-calendar-check {{ request()->routeIs('admin.kehadiransiswa') ? 'text-white' : 'text-purple-600' }}"></i>
            </div>
            <span class="font-medium">Kehadiran</span>
        </a>
        
        <a href="{{ route('admin.kelola_izin') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group
           {{ request()->routeIs('admin.kelola_izin') 
                ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30' 
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
            <div class="w-9 h-9 flex items-center justify-center rounded-lg transition-all duration-300
                {{ request()->routeIs('admin.kelola_izin') 
                    ? 'bg-white/20' 
                    : 'bg-amber-100 group-hover:bg-amber-200' }}">
                <i class="fa-solid fa-clipboard-check {{ request()->routeIs('admin.kelola_izin') ? 'text-white' : 'text-amber-600' }}"></i>
            </div>
            <span class="font-medium">Persetujuan Izin</span>
        </a>
        
        <a href="{{ route('admin.pengumuman') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group
           {{ request()->routeIs('admin.pengumuman') 
                ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30' 
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
            <div class="w-9 h-9 flex items-center justify-center rounded-lg transition-all duration-300
                {{ request()->routeIs('admin.pengumuman') 
                    ? 'bg-white/20' 
                    : 'bg-indigo-100 group-hover:bg-indigo-200' }}">
                <i class="fa-solid fa-bullhorn {{ request()->routeIs('admin.pengumuman') ? 'text-white' : 'text-indigo-600' }}"></i>
            </div>
            <span class="font-medium">Mading Digital</span>
        </a>
        
        <a href="{{ route('admin.nilai') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group
           {{ request()->routeIs('admin.nilai') 
                ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30' 
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
            <div class="w-9 h-9 flex items-center justify-center rounded-lg transition-all duration-300
                {{ request()->routeIs('admin.nilai') 
                    ? 'bg-white/20' 
                    : 'bg-fuchsia-100 group-hover:bg-fuchsia-200' }}">
                <i class="fa-solid fa-graduation-cap {{ request()->routeIs('admin.nilai') ? 'text-white' : 'text-fuchsia-600' }}"></i>
            </div>
            <span class="font-medium">Nilai Akademik</span>
        </a>
        
        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group text-gray-600 hover:bg-blue-50 hover:text-blue-600">
            <div class="w-9 h-9 flex items-center justify-center rounded-lg transition-all duration-300 bg-cyan-100 group-hover:bg-cyan-200">
                <i class="fa-solid fa-calendar-days text-cyan-600"></i>
            </div>
            <span class="font-medium">Jadwal Kelas</span>
            <span class="ml-auto text-xs bg-gray-200 text-gray-500 px-2 py-0.5 rounded-full">Soon</span>
        </a>
    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-gray-200/60">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-3 px-6 py-3 rounded-xl text-red-500 bg-red-50 hover:bg-red-500 hover:text-white font-semibold transition-all duration-300 group">
                <i class="fa-solid fa-right-from-bracket transition-transform duration-300 group-hover:-translate-x-1"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>