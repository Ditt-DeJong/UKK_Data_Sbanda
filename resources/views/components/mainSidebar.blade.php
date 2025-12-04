
<aside class="fixed top-0 left-0 h-screen w-64 bg-white border-r border-gray-300 shadow-sm flex flex-col justify-between">

    <!-- Logo -->
    <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-300">
        <div class="bg-blue-600 text-white p-2 rounded-lg">
            <i class="fa-solid fa-graduation-cap text-lg"></i>
        </div>
        <div>
            <h1 class="text-lg font-bold text-gray-800">Admin Panel</h1>
            <p class="text-sm text-gray-500 -mt-1">Portal Orang Tua</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-4 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3
        {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition' }}">
            <i class="fa-solid fa-house mr-3 w-5"></i> Dashboard
        </a>
        <a href="{{ route('admin.datasiswa') }}" class="flex items-center px-6 py-3
        {{ request()->routeIs('admin.datasiswa') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition' }}">
            <i class="fa-solid fa-users mr-3 w-5"></i> Data Siswa
        </a>
        <a href="{{ route('admin.kehadiransiswa') }}" class="flex items-center px-6 py-3
            {{ request()->routeIs('admin.kehadiransiswa') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition' }}">
            <i class="fa-solid fa-calendar-check mr-3 w-5"></i> Kehadiran
        </a>
        <a href="{{ route('admin.kelola_izin') }}" class="flex items-center px-6 py-3
        {{ request()->routeIs('admin.kelola_izin') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition' }}">
            <i class="fa-solid fa-clipboard-check mr-3 w-5"></i> Persetujuan Izin
        </a>
        <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 transition">
            <i class="fa-solid fa-calendar-days mr-3 w-5"></i> Jadwal Kelas
        </a>
    </nav>

    <!-- Logout -->
    <form action="{{ route('admin.logout') }}" method="POST" class="border-t border-gray-300">
        @csrf
        <button type="submit" class="w-full flex items-center justify-center gap-2 px-6 py-4 text-red-500 hover:text-white hover:bg-red-500 font-semibold transition">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>
</aside>