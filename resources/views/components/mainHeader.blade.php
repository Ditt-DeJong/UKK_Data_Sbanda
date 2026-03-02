@props(['title' => 'Dashboard', 'subtitle' => 'Kelola sistem absensi dan pendataan siswa', 'notifCount' => 0])

<header class="sticky top-0 z-[30] flex justify-between items-center bg-white/80 backdrop-blur-xl px-8 py-5 border-b border-gray-200/60 shadow-sm shadow-blue-500/5">

    <!-- Title Section -->
    <div class="animate-fade-in">
        <div class="flex items-center gap-3 mb-1">
            <div class="w-2 h-8 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></div>
            <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-500">{{ $title }}</h2>
        </div>
        <p class="text-sm text-gray-500 ml-5">{{ $subtitle }}</p>
    </div>

    <!-- NOTIF + PROFILE -->
    <div class="flex items-center gap-6 relative">

        <!-- Search Bar (optional decorative) -->
        <div class="hidden lg:flex items-center gap-3 bg-gray-100/80 rounded-xl px-4 py-2.5 border border-gray-200/60 focus-within:ring-2 focus-within:ring-blue-500/30 transition-all duration-300">
            <i class="fa-solid fa-search text-gray-400"></i>
            <input type="text" placeholder="Cari sesuatu..." class="bg-transparent border-none outline-none text-sm text-gray-600 placeholder-gray-400 w-48">
        </div>

        <!-- NOTIF ICON -->
        <div class="relative cursor-pointer group" id="notifButton">
            <div class="w-11 h-11 bg-gradient-to-br from-blue-50 to-blue-100 text-blue-600 rounded-xl flex items-center justify-center shadow-sm hover:shadow-md hover:from-blue-100 hover:to-blue-200 transition-all duration-300 group-hover:scale-105">
                <i class="fa-solid fa-bell text-lg group-hover:animate-wiggle"></i>
            </div>

            <!-- BADGE -->
            @if($notifCount > 0)
            <span class="absolute -top-1.5 -right-1.5 bg-gradient-to-br from-red-500 to-rose-500 text-white text-xs font-bold px-2 py-0.5 rounded-full shadow-lg shadow-red-500/30 animate-pulse-glow">
                {{ $notifCount }}
            </span>
            @endif
        </div>

        <!-- Divider -->
        <div class="w-px h-10 bg-gray-200"></div>

        <!-- PROFILE -->
        <div class="flex items-center gap-4 group cursor-pointer">
            <div class="text-right">
                <p class="font-semibold text-gray-800">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-gray-500 flex items-center gap-1 justify-end">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    Administrator
                </p>
            </div>

            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white font-bold text-lg shadow-lg shadow-blue-500/30 group-hover:shadow-xl group-hover:scale-105 transition-all duration-300">
                {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'Admin', 0, 1)) }}
            </div>
        </div>

    </div>
</header>

@push('scripts')
<script>
    // Notification Button Handler (wrapped in IIFE to avoid const conflicts)
    (function() {
        const notifButton = document.getElementById("notifButton");
        const notifModal = document.getElementById("notifModal");
        const overlay = document.getElementById("overlay");

        notifButton?.addEventListener("click", () => {
            notifModal?.classList.remove("hidden");
            overlay?.classList.remove("hidden");
            document.body.classList.add("overflow-hidden");
        });
    })();
</script>
@endpush