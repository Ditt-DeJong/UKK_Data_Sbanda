<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Admin' }} - Portal Orang Tua</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Font Awesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        h1, h2, h3, h4, h5, h6, .btn-futuristic, .card-futuristic h3 { font-family: 'Outfit', sans-serif; }
    </style>
    
    @stack('styles')
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-100 font-sans antialiased">

<!-- OVERLAY dengan glassmorphism -->
<div id="overlay" class="hidden fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-[60] transition-all duration-300"></div>

@stack('modals')

<div class="flex min-h-screen">

    <!-- Sidebar Component -->
    <x-mainSidebar :active="$active ?? 'dashboard'" />

    <!-- MAIN CONTENT -->
    <main class="flex-1 ml-72 transition-all duration-300 min-h-screen">

        <!-- Header Component -->
        <x-mainHeader 
            :title="$pageTitle ?? 'Dashboard'" 
            :subtitle="$pageSubtitle ?? 'Kelola sistem absensi dan pendataan siswa'"
            :notifCount="$notifCount ?? 3" 
        />

        <!-- FLASH MESSAGES -->
        @if(session('success'))
        <div id="flashSuccess" class="mx-6 mt-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center gap-3 animate-slide-up">
            <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-check-circle text-emerald-600 text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold">Berhasil!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('flashSuccess').remove()" class="text-emerald-400 hover:text-emerald-600 transition">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div id="flashError" class="mx-6 mt-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-center gap-3 animate-slide-up">
            <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-exclamation-circle text-red-600 text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold">Error!</p>
                <p class="text-sm">{{ session('error') }}</p>
            </div>
            <button onclick="document.getElementById('flashError').remove()" class="text-red-400 hover:text-red-600 transition">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
        @endif

        <!-- PAGE CONTENT with animation -->
        <div class="animate-fade-in">
            {{ $slot }}
        </div>

    </main>
</div>

@stack('scripts')

<!-- Global Modal Scripts -->
<script>
    var overlay = document.getElementById("overlay");

    // Global function to close any modal
    function closeAllModals() {
        document.querySelectorAll('[id$="Modal"]').forEach(modal => {
            modal.classList.add("hidden");
        });
        overlay?.classList.add("hidden");
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