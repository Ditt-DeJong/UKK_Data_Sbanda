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

        {{-- Flash messages are handled by SweetAlert2 below --}}

        <!-- PAGE CONTENT with animation -->
        <div class="animate-fade-in">
            {{ $slot }}
        </div>

    </main>
</div>

@stack('scripts')

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Global Scripts -->
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

    // Global Interactive Confirm Forms using SweetAlert2
    document.addEventListener("DOMContentLoaded", function() {
        const confirmForms = document.querySelectorAll(".form-confirm");
        confirmForms.forEach(form => {
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                const message = this.getAttribute("data-confirm-message") || "Apakah Anda yakin ingin melanjutkan?";
                const title = this.getAttribute("data-confirm-title") || "Konfirmasi";
                const isDanger = this.getAttribute("data-confirm-danger") === "true";
                Swal.fire({
                    title: title,
                    text: message,
                    icon: isDanger ? 'warning' : 'question',
                    showCancelButton: true,
                    confirmButtonColor: isDanger ? '#ef4444' : '#10b981',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Lanjutkan!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'rounded-3xl shadow-2xl pb-6',
                        title: 'font-bold text-gray-800 pt-4',
                        confirmButton: 'rounded-xl px-6 py-3 font-bold shadow-lg',
                        cancelButton: 'rounded-xl px-6 py-3 font-bold'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // =============================================
        // SweetAlert2 Flash Notifications dari Session
        // =============================================
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '<span style="font-size:1.1rem;font-weight:800;color:#1e293b">Berhasil!</span>',
                html: '<p style="color:#475569;font-size:0.95rem">{{ addslashes(session('success')) }}</p>',
                showConfirmButton: false,
                timer: 2800,
                timerProgressBar: true,
                position: 'top-end',
                toast: true,
                background: '#f0fdf4',
                customClass: {
                    popup: 'rounded-2xl shadow-xl border border-emerald-100',
                    timerProgressBar: 'bg-emerald-500'
                },
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: '<span style="font-size:1.1rem;font-weight:800;color:#1e293b">Terjadi Kesalahan!</span>',
                html: '<p style="color:#475569;font-size:0.95rem">{{ addslashes(session('error')) }}</p>',
                showConfirmButton: true,
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#ef4444',
                position: 'center',
                background: '#fff1f2',
                customClass: {
                    popup: 'rounded-3xl shadow-2xl border border-red-100 pb-6',
                    title: 'font-bold',
                    confirmButton: 'rounded-xl px-8 py-3 font-bold'
                }
            });
        @endif

        @if(session('sweet_success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ addslashes(session('sweet_success')) }}',
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                position: 'top-end',
                customClass: { popup: 'rounded-2xl shadow-xl' }
            });
        @endif
    });
</script>

</body>
</html>