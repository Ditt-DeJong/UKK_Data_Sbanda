{{-- ini adalah navbar --}}
<nav class="navbar-futuristic rounded-b-2xl sticky top-0 z-50">
  {{-- Decorative orbs --}}
  <div class="orb orb-cyan w-32 h-32 -top-10 -left-10 opacity-30"></div>
  <div class="orb orb-blue w-24 h-24 -bottom-8 -right-8 opacity-20"></div>
  
  <div class="h-20 relative mx-auto px-6 flex items-center justify-between">

    {{-- identitas website --}}
    <div class="flex items-center space-x-3 group cursor-pointer">
      {{-- Logo icon with glow --}}
      <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 group-hover:glow-white">
        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3ZM18.82 9L12 12.72L5.18 9L12 5.28L18.82 9ZM17 15.99L12 18.72L7 15.99V12.27L12 15L17 12.27V15.99Z"/>
        </svg>
      </div>
      <div class="flex flex-col leading-tight">
        <span class="font-bold text-2xl text-white text-glow-white tracking-tight">Data SBANDA</span>
        <span class="text-blue-100/80 text-sm font-medium">Portal Orang Tua</span>
      </div>
    </div>

    {{-- tombol hamburger --}}
    <button class="lg:hidden text-white focus:outline-none p-2 hover:bg-white/10 rounded-lg transition-all duration-300" type="button" id="menu-btn">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    {{-- isi navbar --}}
    <ul id="menu" class="hidden lg:flex flex-1 items-center justify-center space-x-8 list-none text-lg m-0">
      <li class="animate-fade-in" style="animation-delay: 0.1s">
        <a href="{{ route('kehadiran') }}" class="nav-link-futuristic !no-underline flex items-center gap-2
        {{ request()->routeIs('kehadiran') ? 'bg-white/20 glow-blue-sm' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          Kehadiran
        </a>
      </li>

      <li class="animate-fade-in" style="animation-delay: 0.2s">
        <a href="{{ route('ajukanizin') }}" class="nav-link-futuristic !no-underline flex items-center gap-2
        {{ request()->routeIs('ajukanizin') ? 'bg-white/20 glow-blue-sm' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
          Ajukan Izin
        </a>
      </li>

      <li class="animate-fade-in" style="animation-delay: 0.3s">
        <a href="{{ route('jadwalkelas') }}" class="nav-link-futuristic !no-underline flex items-center gap-2
        {{ request()->routeIs('jadwalkelas') ? 'bg-white/20 glow-blue-sm' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          Jadwal Kelas
        </a>
      </li>
    </ul>

    {{-- avatar + nama user with dropdown --}}
    <div class="hidden lg:flex items-center space-x-4 pr-2 animate-fade-in relative" style="animation-delay: 0.4s">

      @php
          $nama = Auth::user()->dataSiswa->nama_siswa ?? 'User';
          $inisial = strtoupper(substr($nama, 0, 1));
      @endphp

      {{-- Profile dropdown trigger --}}
      <div class="relative" id="profile-dropdown-container">
        <button type="button" id="profile-dropdown-btn" 
          class="flex items-center space-x-3 p-2 rounded-xl hover:bg-white/10 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white/30">
          
          {{-- nama user --}}
          <div class="text-right">
            <span class="text-white font-semibold text-lg block">
              {{ $nama }}
            </span>
            <span class="text-blue-100/70 text-xs">Online</span>
          </div>

          {{-- lingkaran inisial dengan glow --}}
          <div class="relative">
            <div class="w-11 h-11 bg-white text-blue-600 font-bold flex items-center justify-center rounded-xl shadow-lg group-hover:glow-white transition-all duration-300">
              {{ $inisial }}
            </div>
            {{-- Online indicator --}}
            <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-green-400 rounded-full border-2 border-blue-600 animate-pulse"></div>
          </div>

          {{-- Dropdown arrow --}}
          <svg id="dropdown-arrow" class="w-4 h-4 text-white/70 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>

        {{-- Dropdown menu --}}
        <div id="profile-dropdown-menu" class="hidden absolute right-0 top-full mt-2 w-56 bg-white/95 backdrop-blur-xl rounded-xl shadow-2xl border border-white/20 overflow-hidden z-50 transform origin-top-right transition-all duration-200">
          
          {{-- User info header --}}
          <div class="px-4 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
            <p class="text-sm font-medium">{{ $nama }}</p>
            <p class="text-xs text-blue-100 truncate">{{ Auth::user()->email }}</p>
          </div>

          {{-- Menu items --}}
          <div class="py-2">
            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}" class="block">
              @csrf
              <button type="submit" 
                class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 flex items-center gap-3 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
              </button>
            </form>
          </div>
        </div>
      </div>

    </div>

  </div>

  {{-- mobile menu --}}
  <div id="mobile-menu" class="hidden lg:hidden px-4 pb-4">
    <ul class="flex flex-col space-y-2 bg-white/10 backdrop-blur-sm rounded-xl p-4">
      <li>
        <a href="{{ route('kehadiran') }}" class="flex items-center gap-3 text-white font-semibold hover:bg-white/10 p-3 rounded-lg transition-all duration-300
        {{ request()->routeIs('kehadiran') ? 'bg-white/20' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          Kehadiran
        </a>
      </li>
      <li>
        <a href="{{ route('ajukanizin') }}" class="flex items-center gap-3 text-white font-semibold hover:bg-white/10 p-3 rounded-lg transition-all duration-300
        {{ request()->routeIs('ajukanizin') ? 'bg-white/20' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
          Ajukan Izin
        </a>
      </li>
      <li>
        <a href="{{ route('jadwalkelas') }}" class="flex items-center gap-3 text-white font-semibold hover:bg-white/10 p-3 rounded-lg transition-all duration-300
        {{ request()->routeIs('jadwalkelas') ? 'bg-white/20' : '' }}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          Jadwal Kelas
        </a>
      </li>
      
      {{-- User info in mobile --}}
      @php
          $nama = Auth::user()->dataSiswa->nama_siswa ?? 'User';
          $inisial = strtoupper(substr($nama, 0, 1));
      @endphp
      <li class="border-t border-white/20 pt-3 mt-2">
        <div class="flex items-center gap-3 p-2">
          <div class="w-10 h-10 bg-white text-blue-600 font-bold flex items-center justify-center rounded-xl">
            {{ $inisial }}
          </div>
          <div>
            <span class="text-white font-semibold block">{{ $nama }}</span>
            <span class="text-blue-100/70 text-xs">{{ Auth::user()->email }}</span>
          </div>
        </div>
      </li>
      
      {{-- Logout button for mobile --}}
      <li class="mt-2">
        <form method="POST" action="{{ route('logout') }}" class="block">
          @csrf
          <button type="submit" 
            class="w-full flex items-center gap-3 text-white font-semibold bg-red-500/20 hover:bg-red-500/40 p-3 rounded-lg transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            Logout
          </button>
        </form>
      </li>
    </ul>
  </div>
</nav>

<script>
  // Mobile menu toggle
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  
  menuBtn?.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    // Add slide animation
    if (!mobileMenu.classList.contains('hidden')) {
      mobileMenu.style.animation = 'slide-up 0.3s ease-out';
    }
  });

  // Profile dropdown toggle
  const profileBtn = document.getElementById('profile-dropdown-btn');
  const profileMenu = document.getElementById('profile-dropdown-menu');
  const dropdownArrow = document.getElementById('dropdown-arrow');

  profileBtn?.addEventListener('click', (e) => {
    e.stopPropagation();
    profileMenu.classList.toggle('hidden');
    dropdownArrow?.classList.toggle('rotate-180');
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    const container = document.getElementById('profile-dropdown-container');
    if (container && !container.contains(e.target)) {
      profileMenu?.classList.add('hidden');
      dropdownArrow?.classList.remove('rotate-180');
    }
  });

  // Close dropdown on escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      profileMenu?.classList.add('hidden');
      dropdownArrow?.classList.remove('rotate-180');
    }
  });
</script>
