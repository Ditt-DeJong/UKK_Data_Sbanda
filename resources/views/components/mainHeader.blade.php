@props(['title' => 'Dashboard', 'subtitle' => 'Kelola sistem absensi dan pendataan siswa', 'notifCount' => 0])

<header class="sticky top-0 z-[30] flex justify-between items-center bg-white px-6 py-4 border-b border-gray-300 shadow-sm">

    <div>
        <h2 class="text-2xl font-bold text-blue-600">{{ $title }}</h2>
        <p class="text-sm text-gray-500">{{ $subtitle }}</p>
    </div>

    <!-- NOTIF + PROFILE -->
    <div class="flex items-center gap-6 relative">

        <!-- NOTIF ICON -->
        <div class="relative cursor-pointer group" id="notifButton">
            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center shadow-sm hover:bg-blue-200 transition-colors">
                <i class="fa-solid fa-bell text-lg"></i>
            </div>

            <!-- BADGE -->
            @if($notifCount > 0)
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                {{ $notifCount }}
            </span>
            @endif
        </div>

        <!-- PROFILE -->
        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="font-semibold text-gray-800">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-gray-500">Administrator</p>
            </div>

            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white font-semibold shadow-sm">
                {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'Admin', 0, 1)) }}
            </div>
        </div>

    </div>
</header>

@push('scripts')
<script>
    // Notification Button Handler
    const notifButton = document.getElementById("notifButton");
    const notifModal = document.getElementById("notifModal");
    const overlay = document.getElementById("overlay");

    notifButton?.addEventListener("click", () => {
        notifModal.classList.remove("hidden");
        overlay.classList.remove("hidden");
        document.body.classList.add("overflow-hidden");
    });
</script>
@endpush