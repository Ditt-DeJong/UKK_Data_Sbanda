{{-- ini adalah navbar --}}
<nav class="bg-blue-500">
  <div class="h-18 relative mx-auto px-4 flex items-center justify-between">
    <span class="font-semibold text-2xl text-white" href="#">Data Sbanda</span>

    {{-- tombol hamburger --}}
    <button class="lg:hidden text-white focus:outline-none" type="button" id="menu-btn">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    {{-- isi navbar --}}
    <ul id="menu" class="flex-1 flex left-1/2 top-1/2 items-center justify-center space-x-14 list-none text-lg m-0">
      <li><a href="{{ route('kehadiran') }}" class="text-white font-semibold !no-underline px-4 py-1 rounded-md transition-all duration-200
      {{ request()->routeIs('kehadiran') ? '!no-underline !text-blue-600 !bg-blue-200 ' : 'text-white hover:text-blue-600-300 hover:border-blue-100' }}">Kehadiran</a></li>
      <li><a href="{{ route('ajukanizin') }}" class="text-white font-semibold !no-underline px-4 py-1 rounded-md transition-all duration-200 
      {{ request()->routeIs('ajukanizin') ? '!no-underline !text-blue-600 !bg-blue-200 ' : 'text-white hover:text-blue-600-300 hover:border-blue-100' }}">Ajukan Izin</a></li>
      <li><a href="{{ route('jadwalkelas') }}" class="text-white font-semibold !no-underline px-4 py-1 rounded-md transition-all duration-200
      {{ request()->routeIs('jadwalkelas') ? '!no-underline !text-blue-600 !bg-blue-200 ' : 'text-white hover:text-blue-600-300 hover:border-blue-100' }}">Jadwal Kelas</a></li>
    </ul>
  </div>

  <div id="mobile-menu" class="hidden lg:hidden px-4 items-center">
    <ul class="flex flex-col">
      <li><a href="{{ route('kehadiran') }}" class="block text-white font-semibold hover:text-gray-200">Home</a></li>
      <li><a href="{{ route('ajukanizin') }}" class="block text-white font-semibold hover:text-gray-200">Fitur 1</a></li>
      <li><a href="{{ route('jadwalkelas') }}" class="block text-white font-semibold hover:text-gray-200">Contact</a></li>
    </ul>
  </div>
</nav>
