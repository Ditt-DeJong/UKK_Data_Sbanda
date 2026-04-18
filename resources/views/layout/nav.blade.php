<style>
  @keyframes shimmer-border {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }
  
  #nav-wrapper {
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(219, 234, 254, 0.7);
    box-shadow: 0 4px 24px rgba(37, 99, 235, 0.06), 0 1px 0 rgba(255,255,255,0.9) inset;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }
  
  #nav-wrapper.scrolled {
    background: rgba(255, 255, 255, 0.98);
    box-shadow: 0 8px 32px rgba(37, 99, 235, 0.10), 0 1px 0 rgba(255,255,255,1) inset;
    border-bottom-color: rgba(191, 219, 254, 0.9);
  }

  /* Animated gradient line at the very top */
  nav::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #2563eb, #60a5fa, #818cf8, #60a5fa, #2563eb);
    background-size: 200% 100%;
    animation: shimmer-border 4s ease infinite;
    z-index: 1;
  }
</style>

<nav class="fixed top-0 left-0 w-full z-50">
  <div id="nav-wrapper" class="px-4 sm:px-8 py-5 flex items-center justify-between relative">
    
    {{-- Brand --}}
    <a href="{{ route('kehadiran') }}" class="flex items-center space-x-3 cursor-pointer group flex-shrink-0">
      <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white group-hover:scale-105 group-hover:shadow-[0_4px_16px_rgba(37,99,235,0.4)] transition-all duration-300 shadow-[0_2px_8px_rgba(37,99,235,0.25)]">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
      </div>
      <div class="hidden sm:block">
        <span class="font-extrabold text-xl text-slate-900 tracking-tight block leading-none group-hover:text-blue-700 transition-colors duration-200">Data SBANDA</span>
        <span class="text-blue-500 font-bold text-[0.68rem] uppercase tracking-widest block mt-0.5">Portal Orang Tua</span>
      </div>
    </a>

    {{-- Desktop Links --}}
    <div class="hidden lg:flex items-center justify-center relative bg-slate-100/70 rounded-2xl p-1.5" id="desktop-nav">
      <ul class="flex items-center gap-1 relative z-10 w-full">
        <li>
          <a href="{{ route('kehadiran') }}" class="block px-5 py-2 rounded-xl text-[0.9rem] font-bold transition-all duration-200 {{ request()->routeIs('kehadiran') ? 'bg-blue-600 text-white shadow-[0_2px_8px_rgba(37,99,235,0.35)]' : 'text-slate-500 hover:bg-white/60 hover:text-blue-700' }}">Kehadiran Anak</a>
        </li>
        <li>
          <a href="{{ route('ajukanizin') }}" class="block px-5 py-2 rounded-xl text-[0.9rem] font-bold transition-all duration-200 {{ request()->routeIs('ajukanizin') ? 'bg-blue-600 text-white shadow-[0_2px_8px_rgba(37,99,235,0.35)]' : 'text-slate-500 hover:bg-white/60 hover:text-blue-700' }}">Buat Izin Baru</a>
        </li>
        <li>
          <a href="{{ route('jadwalkelas') }}" class="block px-5 py-2 rounded-xl text-[0.9rem] font-bold transition-all duration-200 {{ request()->routeIs('jadwalkelas') ? 'bg-blue-600 text-white shadow-[0_2px_8px_rgba(37,99,235,0.35)]' : 'text-slate-500 hover:bg-white/60 hover:text-blue-700' }}">Jadwal Belajar</a>
        </li>
      </ul>
    </div>

    {{-- User & Logout --}}
    <div class="hidden lg:flex items-center gap-3 flex-shrink-0">
      @php
          $nama = Auth::user()->dataSiswa->nama_siswa ?? Auth::user()->name ?? 'Orang Tua';
          $inisial = strtoupper(substr($nama, 0, 1));
      @endphp
      
      <div class="flex items-center gap-2.5 bg-blue-50/80 hover:bg-blue-100/80 px-3 py-2 rounded-2xl border border-blue-100 hover:border-blue-200 hover:shadow-sm transition-all duration-300 cursor-pointer group">
          <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white font-black text-sm shadow-sm group-hover:shadow-[0_2px_8px_rgba(37,99,235,0.3)] group-hover:scale-105 transition-all duration-300">
             {{ $inisial }}
          </div>
          <div class="leading-none">
            <span class="font-bold text-slate-700 text-sm block max-w-[140px] truncate group-hover:text-blue-700 transition-colors">{{ $nama }}</span>
            <span class="text-[0.65rem] text-blue-500 font-semibold">Orang Tua</span>
          </div>
      </div>

      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" title="Keluar dari sistem" class="w-10 h-10 rounded-xl bg-red-50 text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white hover:scale-105 hover:shadow-[0_4px_12px_rgba(239,68,68,0.25)] transition-all duration-300 border border-red-100">
             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
          </button>
      </form>
    </div>

    {{-- Mobile Menu Button --}}
    <button id="mobile-menu-btn" class="lg:hidden w-11 h-11 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100 hover:bg-blue-100 transition-colors focus:outline-none">
      <svg id="hamburger-icon" class="w-5 h-5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
      <svg id="close-icon" class="w-5 h-5 hidden transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
  </div>

  {{-- Mobile Nav Dropdown (Animated) --}}
  <div id="mobile-menu-container" class="lg:hidden absolute top-[100%] left-0 w-full overflow-hidden transition-all duration-300 max-h-0 bg-transparent">
    <div id="mobile-menu" class="bg-white/95 backdrop-blur-xl rounded-b-3xl shadow-2xl border-x border-b border-blue-100/70 p-4 flex flex-col gap-2 mx-3 mb-4 transform -translate-y-4 opacity-0 transition-all duration-300">
        <a href="{{ route('kehadiran') }}" class="p-4 rounded-2xl text-base font-bold flex items-center gap-3 transition-all duration-200 {{ request()->routeIs('kehadiran') ? 'bg-blue-600 text-white shadow-md' : 'bg-slate-50 text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}">
            <div class="w-1.5 h-1.5 rounded-full flex-shrink-0 {{ request()->routeIs('kehadiran') ? 'bg-white' : 'bg-blue-400' }}"></div>
            Kehadiran Anak
        </a>
        <a href="{{ route('ajukanizin') }}" class="p-4 rounded-2xl text-base font-bold flex items-center gap-3 transition-all duration-200 {{ request()->routeIs('ajukanizin') ? 'bg-blue-600 text-white shadow-md' : 'bg-slate-50 text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}">
            <div class="w-1.5 h-1.5 rounded-full flex-shrink-0 {{ request()->routeIs('ajukanizin') ? 'bg-white' : 'bg-blue-400' }}"></div>
            Buat Surat Izin
        </a>
        <a href="{{ route('jadwalkelas') }}" class="p-4 rounded-2xl text-base font-bold flex items-center gap-3 transition-all duration-200 {{ request()->routeIs('jadwalkelas') ? 'bg-blue-600 text-white shadow-md' : 'bg-slate-50 text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}">
            <div class="w-1.5 h-1.5 rounded-full flex-shrink-0 {{ request()->routeIs('jadwalkelas') ? 'bg-white' : 'bg-blue-400' }}"></div>
            Jadwal Pelajaran
        </a>
        
        <div class="h-px bg-blue-50 my-1"></div>
        
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full p-4 rounded-2xl text-base font-bold bg-red-50 text-red-500 text-left flex items-center gap-3 hover:bg-red-500 hover:text-white transition-all duration-200 border border-red-100/70">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Keluar Dari Sistem
            </button>
        </form>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', () => {
      // --- Scroll Detection: Navbar Shadow Enhancement ---
      const navWrapper = document.getElementById('nav-wrapper');
      const onScroll = () => {
          if (window.scrollY > 10) {
              navWrapper.classList.add('scrolled');
          } else {
              navWrapper.classList.remove('scrolled');
          }
      };
      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll(); // run on load
      // (Sliding indicator logic has been removed to fix FOUC glitches during page turns)

      // --- Mobile Menu Toggle Logic ---
      const btn = document.getElementById('mobile-menu-btn');
      const menuContainer = document.getElementById('mobile-menu-container');
      const menuBox = document.getElementById('mobile-menu');
      const hamburger = document.getElementById('hamburger-icon');
      const closeBtn = document.getElementById('close-icon');
      
      let isMenuOpen = false;

      if(btn && menuContainer) {
          btn.addEventListener('click', () => {
              isMenuOpen = !isMenuOpen;
              
              if(isMenuOpen) {
                  // Open animations
                  hamburger.classList.add('hidden');
                  closeBtn.classList.remove('hidden');
                  closeBtn.classList.replace('scale-90', 'scale-100');
                  
                  menuContainer.style.maxHeight = '500px';
                  menuBox.classList.remove('opacity-0', '-translate-y-4');
                  menuBox.classList.add('opacity-100', 'translate-y-0');
              } else {
                  // Close animations
                  closeBtn.classList.add('hidden');
                  closeBtn.classList.replace('scale-100', 'scale-90');
                  hamburger.classList.remove('hidden');
                  
                  menuContainer.style.maxHeight = '0px';
                  menuBox.classList.remove('opacity-100', 'translate-y-0');
                  menuBox.classList.add('opacity-0', '-translate-y-4');
              }
          });
      }
  });
</script>
