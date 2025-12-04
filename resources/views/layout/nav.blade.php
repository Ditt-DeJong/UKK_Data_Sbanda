{{-- ini adalah navbar --}}
<nav class="bg-gradient-to-b from-blue-600 to-blue-500 rounded-b-xl shadow-lg">
  <div class="h-20 relative mx-auto px-4 flex items-center justify-between">

    {{-- identitas website --}}
    <div class="flex items-center space-x-3">
      <div class="flex flex-col leading-tight">
        <span class="font-semibold text-2xl text-white">Data SBANDA</span>
        <span class="text-blue-100 text-sm">Portal Orang Tua</span>
      </div>
    </div>

    {{-- tombol hamburger --}}
    <button class="lg:hidden text-white focus:outline-none" type="button" id="menu-btn">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    {{-- isi navbar --}}
    <ul id="menu" class="flex-1 flex items-center justify-center space-x-14 list-none text-lg m-0">
      <li><a href="{{ route('kehadiran') }}" class="text-white font-semibold !no-underline px-4 py-1 rounded-md transition-all duration-200
      {{ request()->routeIs('kehadiran') ? '!no-underline !text-blue-600 !bg-blue-100 shadow-[0_0_15px_4px_rgba(147,197,253,0.7)]' : 'text-white hover:text-blue-100' }}">Kehadiran</a></li>

      <li><a href="{{ route('ajukanizin') }}" class="text-white font-semibold !no-underline px-4 py-1 rounded-md transition-all duration-200 
      {{ request()->routeIs('ajukanizin') ? '!no-underline !text-blue-600 !bg-blue-100 shadow-[0_0_15px_4px_rgba(147,197,253,0.7)]' : 'text-white hover:text-blue-100' }}">Ajukan Izin</a></li>

      <li><a href="{{ route('jadwalkelas') }}" class="text-white font-semibold !no-underline px-4 py-1 rounded-md transition-all duration-200
      {{ request()->routeIs('jadwalkelas') ? '!no-underline !text-blue-600 !bg-blue-100 shadow-[0_0_15px_4px_rgba(147,197,253,0.7)]' : 'text-white hover:text-blue-100' }}">Jadwal Kelas</a></li>
    </ul>

    {{-- avatar + nama user --}}
    <div class="flex items-center space-x-3 pr-2">

      @php
          $nama = Auth::user()->lengkapi1->nama_lengkap ?? 'User';
          $inisial = strtoupper(substr($nama, 0, 1));
      @endphp

      {{-- nama user --}}
      <span class="text-white font-semibold text-lg">
        {{ $nama }}
      </span>

      {{-- lingkaran inisial --}}
      <div class="w-10 h-10 bg-white text-blue-700 font-bold flex items-center justify-center rounded-full shadow-md">
        {{ $inisial }}
      </div>

    </div>

  </div>

  {{-- mobile menu --}}
  <div id="mobile-menu" class="hidden lg:hidden px-4 items-center">
    <ul class="flex flex-col">
      <li><a href="{{ route('kehadiran') }}" class="block text-white font-semibold hover:text-gray-200">Kehadiran</a></li>
      <li><a href="{{ route('ajukanizin') }}" class="block text-white font-semibold hover:text-gray-200">Ajukan Izin</a></li>
      <li><a href="{{ route('jadwalkelas') }}" class="block text-white font-semibold hover:text-gray-200">Jadwal Kelas</a></li>
    </ul>
  </div>
</nav>
