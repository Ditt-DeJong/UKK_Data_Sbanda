<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin' }} - Portal Orang Tua</title>

    <!-- Font Awesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <!-- Tailwind -->
    @vite('resources/css/app.css')
    
    @stack('styles')
</head>

<body class="bg-gray-50 font-sans antialiased">

<!-- OVERLAY dengan opacity yang lebih ringan -->
<div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-30 z-[40] transition-opacity duration-300"></div>

<div class="flex min-h-screen">

    <!-- Sidebar Component -->
    <x-mainSidebar :active="$active ?? 'dashboard'" />

    <!-- MAIN CONTENT -->
    <main class="flex-1 ml-64">

        <!-- Header Component -->
        <x-mainHeader 
            :title="$pageTitle ?? 'Dashboard'" 
            :subtitle="$pageSubtitle ?? 'Kelola sistem absensi dan pendataan siswa'"
            :notifCount="$notifCount ?? 3" 
        />

        <!-- PAGE CONTENT -->
        {{ $slot }}

    </main>
</div>

@stack('scripts')

<!-- Global Modal Scripts -->
<script>
    const overlay = document.getElementById("overlay");

    // Global function to close any modal
    function closeAllModals() {
        document.querySelectorAll('[id$="Modal"]').forEach(modal => {
            modal.classList.add("hidden");
        });
        overlay.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
    }

    // Close modal with ESC key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeAllModals();
        }
    });

    // Close modal when clicking overlay
    overlay?.addEventListener("click", closeAllModals);
</script>

</body>
</html>