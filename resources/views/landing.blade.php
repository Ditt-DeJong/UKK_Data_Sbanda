<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Data SBANDA - Platform digital untuk monitoring kehadiran dan pendataan siswa secara real-time. Portal Orang Tua terpercaya.">
    <title>Data SBANDA - Portal Monitoring Kehadiran Siswa</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>

<!-- ═══ DECORATIVE BLOBS (global) ═══ -->
<div class="decor-blobs" aria-hidden="true">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
</div>

<!-- ═══════════ NAVBAR ═══════════ -->
<nav id="landing-nav">
    <div class="nav-inner">
        <a href="#hero" class="nav-logo">
            <div class="nav-logo-icon">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3ZM18.82 9L12 12.72L5.18 9L12 5.28L18.82 9ZM17 15.99L12 18.72L7 15.99V12.27L12 15L17 12.27V15.99Z"/>
                </svg>
            </div>
            <div>
                <span class="nav-logo-title">Data SBANDA</span>
                <span class="nav-logo-sub">Portal Orang Tua</span>
            </div>
        </a>

        <div class="nav-links">
            <a href="#fitur">Fitur</a>
            <a href="#cara-kerja">Cara Kerja</a>
            <a href="#keunggulan">Keunggulan</a>
            <a href="#faq">FAQ</a>
        </div>

        <div class="nav-cta">
            <a href="{{ route('login.form') }}" class="btn-outline-nav">Masuk</a>
            <a href="{{ route('register.form') }}" class="btn-solid-nav">Daftar Sekarang</a>
        </div>

        <button id="mobile-nav-btn" class="nav-mobile-toggle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>

    <div id="mobile-nav-menu" class="nav-mobile-menu hidden">
        <a href="#fitur">Fitur</a>
        <a href="#cara-kerja">Cara Kerja</a>
        <a href="#keunggulan">Keunggulan</a>
        <a href="#faq">FAQ</a>
        <div class="nav-mobile-cta">
            <a href="{{ route('login.form') }}" class="btn-outline-nav w-full text-center">Masuk</a>
            <a href="{{ route('register.form') }}" class="btn-solid-nav w-full text-center">Daftar Sekarang</a>
        </div>
    </div>
</nav>

<!-- ═══════════ HERO ═══════════ -->
<section id="hero" class="hero-section">
    <div class="hero-blob-left"></div>
    <div class="hero-blob-right"></div>

    <div class="hero-container">
        <div class="hero-grid">
            <div class="hero-text reveal-up">
                <div class="hero-badge">
                    <span class="hero-badge-dot"></span>
                    <span>Platform Edukasi Digital</span>
                </div>

                <h1>
                    Pantau Kehadiran<br>
                    <span class="hero-highlight">Anak Anda</span><br>
                    Secara Real-Time
                </h1>

                <p class="hero-desc">Data SBANDA menghubungkan orang tua dan sekolah melalui platform digital yang transparan — monitoring kehadiran, pengajuan izin, dan informasi jadwal kelas dalam satu tempat.</p>

                <div class="hero-actions">
                    <a href="{{ route('register.form') }}" class="btn-primary group">
                        <span>Mulai Sekarang</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="#cara-kerja" class="btn-ghost group">
                        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        <span>Lihat Cara Kerja</span>
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="hero-stat">
                        <span class="hero-stat-num" data-count="500">0</span><span class="text-blue-500 font-bold">+</span>
                        <span class="hero-stat-label">Orang Tua Aktif</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-num" data-count="99">0</span><span class="text-blue-500 font-bold">%</span>
                        <span class="hero-stat-label">Akurasi Data</span>
                    </div>
                    <div class="hero-stat">
                        <span class="hero-stat-num" data-count="24">0</span><span class="text-blue-500 font-bold">/7</span>
                        <span class="hero-stat-label">Selalu Online</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual reveal-up" style="animation-delay:.25s">
                <div class="dash-card">
                    <div class="dash-header">
                        <div class="dash-icon"><i class="fa-solid fa-chart-line text-white text-sm"></i></div>
                        <div>
                            <h3>Dashboard Kehadiran</h3>
                            <p>Minggu ini</p>
                        </div>
                        <span class="dash-live">Live</span>
                    </div>
                    <div class="dash-bars">
                        <div class="dash-bar chart-bar" style="height:75%"></div>
                        <div class="dash-bar bar-alt chart-bar" style="height:92%"></div>
                        <div class="dash-bar chart-bar" style="height:58%"></div>
                        <div class="dash-bar bar-alt chart-bar" style="height:85%"></div>
                        <div class="dash-bar chart-bar" style="height:96%"></div>
                        <div class="dash-bar bar-alt chart-bar" style="height:100%"></div>
                        <div class="dash-bar bar-empty" style="height:40%"></div>
                    </div>
                    <div class="dash-labels">
                        <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span class="text-blue-600 font-bold">Sab</span><span>Min</span>
                    </div>
                </div>

                <div class="float-card float-card-1">
                    <div class="float-card-icon fc-green"><i class="fa-solid fa-check-circle"></i></div>
                    <div>
                        <p class="fc-title">Hadir Hari Ini</p>
                        <p class="fc-value text-emerald-600">✓ 07:15 WIB</p>
                    </div>
                </div>
                <div class="float-card float-card-2">
                    <div class="float-card-icon fc-blue"><i class="fa-solid fa-calendar-check"></i></div>
                    <div>
                        <p class="fc-title">Izin Disetujui</p>
                        <p class="fc-value text-blue-600">2 dari 2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <span>Scroll</span>
        <div class="scroll-mouse"><div class="scroll-dot"></div></div>
    </div>
</section>

<!-- ═══════════ FITUR ═══════════ -->
<section id="fitur" class="section">
    <div class="blob blob-section-1"></div>
    <div class="section-inner">
        <div class="section-header reveal-up">
            <span class="section-badge badge-blue">Fitur Unggulan</span>
            <h2>Semua yang Anda <span class="text-blue-600">Butuhkan</span></h2>
            <p>Platform lengkap untuk memantau aktivitas sekolah anak dengan fitur-fitur canggih dan mudah digunakan.</p>
        </div>

        <div class="features-grid">
            <div class="f-card reveal-up" style="animation-delay:.1s">
                <div class="f-icon f-icon-blue"><i class="fa-solid fa-clock"></i></div>
                <h3>Kehadiran Real-Time</h3>
                <p>Pantau status kehadiran anak Anda secara langsung, lengkap dengan waktu check-in dan riwayat mingguan.</p>
            </div>
            <div class="f-card reveal-up" style="animation-delay:.15s">
                <div class="f-icon f-icon-green"><i class="fa-solid fa-file-signature"></i></div>
                <h3>Pengajuan Izin Digital</h3>
                <p>Ajukan izin ketidakhadiran langsung dari aplikasi. Tanpa surat fisik, proses lebih cepat dan terlacak.</p>
            </div>
            <div class="f-card reveal-up" style="animation-delay:.2s">
                <div class="f-icon f-icon-violet"><i class="fa-solid fa-calendar-days"></i></div>
                <h3>Jadwal Kelas</h3>
                <p>Lihat jadwal pelajaran anak secara lengkap dan pastikan mereka tidak melewatkan mata pelajaran penting.</p>
            </div>
            <div class="f-card reveal-up" style="animation-delay:.25s">
                <div class="f-icon f-icon-amber"><i class="fa-solid fa-bell"></i></div>
                <h3>Notifikasi Instan</h3>
                <p>Dapatkan notifikasi langsung saat anak terlambat, tidak hadir, atau ada pengumuman penting dari sekolah.</p>
            </div>
            <div class="f-card reveal-up" style="animation-delay:.3s">
                <div class="f-icon f-icon-rose"><i class="fa-solid fa-shield-halved"></i></div>
                <h3>Data Aman & Privat</h3>
                <p>Keamanan data siswa dan orang tua terjamin. Hanya pihak berwenang yang dapat mengakses informasi sensitif.</p>
            </div>
            <div class="f-card reveal-up" style="animation-delay:.35s">
                <div class="f-icon f-icon-cyan"><i class="fa-solid fa-mobile-screen"></i></div>
                <h3>Responsif di Semua Device</h3>
                <p>Akses platform dari mana saja — smartphone, tablet, atau komputer — dengan tampilan yang sempurna.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════ CARA KERJA ═══════════ -->
<section id="cara-kerja" class="section section-alt">
    <div class="blob blob-section-2"></div>
    <div class="section-inner">
        <div class="section-header reveal-up">
            <span class="section-badge badge-cyan">Cara Kerja</span>
            <h2>Mulai dalam <span class="text-blue-600">3 Langkah</span> Mudah</h2>
            <p>Proses registrasi yang simpel dan cepat untuk mulai memantau kehadiran anak.</p>
        </div>

        <div class="steps-grid">
            <div class="hidden md:block steps-line"></div>

            <div class="step-card reveal-up" style="animation-delay:.1s">
                <div class="step-num">1</div>
                <div class="step-icon-box"><i class="fa-solid fa-user-plus text-2xl text-blue-600"></i></div>
                <h3>Daftar Akun</h3>
                <p>Buat akun menggunakan email aktif Anda. Proses registrasi kurang dari 2 menit.</p>
            </div>
            <div class="step-card reveal-up" style="animation-delay:.2s">
                <div class="step-num">2</div>
                <div class="step-icon-box"><i class="fa-solid fa-clipboard-list text-2xl text-blue-600"></i></div>
                <h3>Lengkapi Data</h3>
                <p>Isi data siswa dan wali murid untuk verifikasi. Data akan divalidasi oleh admin sekolah.</p>
            </div>
            <div class="step-card reveal-up" style="animation-delay:.3s">
                <div class="step-num">3</div>
                <div class="step-icon-box"><i class="fa-solid fa-rocket text-2xl text-emerald-600"></i></div>
                <h3>Mulai Monitoring</h3>
                <p>Setelah diverifikasi, akses seluruh fitur untuk memantau kehadiran anak secara real-time.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════ KEUNGGULAN ═══════════ -->
<section id="keunggulan" class="section">
    <div class="blob blob-section-3"></div>
    <div class="section-inner">
        <div class="keunggulan-grid">
            <div class="reveal-up">
                <span class="section-badge badge-green">Mengapa Kami?</span>
                <h2 class="keunggulan-title">Platform Terpercaya untuk <span class="text-blue-600">Orang Tua Modern</span></h2>
                <p class="keunggulan-desc">Kami menghadirkan solusi digital yang mendekatkan orang tua dengan aktivitas sekolah anak secara efisien dan transparan.</p>

                <div class="adv-list">
                    <div class="adv-item">
                        <div class="adv-icon"><i class="fa-solid fa-bolt text-amber-500"></i></div>
                        <div>
                            <h4>Respon Super Cepat</h4>
                            <p>Data kehadiran diperbarui secara instan tanpa harus refresh halaman.</p>
                        </div>
                    </div>
                    <div class="adv-item">
                        <div class="adv-icon"><i class="fa-solid fa-lock text-blue-500"></i></div>
                        <div>
                            <h4>Keamanan Terjamin</h4>
                            <p>Sistem autentikasi berlapis menjaga data pribadi siswa dan orang tua.</p>
                        </div>
                    </div>
                    <div class="adv-item">
                        <div class="adv-icon"><i class="fa-solid fa-headset text-emerald-500"></i></div>
                        <div>
                            <h4>Dukungan Responsif</h4>
                            <p>Tim support siap membantu kapan saja jika terdapat kendala teknis.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal-up" style="animation-delay:.2s">
                <div class="stat-card-grid">
                    <div class="stat-box">
                        <i class="fa-solid fa-users text-3xl text-blue-500 mb-3"></i>
                        <span class="stat-num" data-count="500">0</span>
                        <span class="stat-label">Pengguna Aktif</span>
                    </div>
                    <div class="stat-box">
                        <i class="fa-solid fa-check-double text-3xl text-emerald-500 mb-3"></i>
                        <span class="stat-num" data-count="15000">0</span>
                        <span class="stat-label">Data Tercatat</span>
                    </div>
                    <div class="stat-box">
                        <i class="fa-solid fa-chart-line text-3xl text-blue-500 mb-3"></i>
                        <span class="stat-num" data-count="99">0</span>
                        <span class="stat-label">Uptime (%)</span>
                    </div>
                    <div class="stat-box">
                        <i class="fa-solid fa-star text-3xl text-amber-500 mb-3"></i>
                        <span class="stat-num" data-count="5">0</span>
                        <span class="stat-label">Rating Bintang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════ FAQ ═══════════ -->
<section id="faq" class="section section-alt">
    <div class="faq-container">
        <div class="section-header reveal-up">
            <span class="section-badge badge-violet">FAQ</span>
            <h2>Pertanyaan <span class="text-blue-600">Umum</span></h2>
        </div>

        <div class="faq-list reveal-up" style="animation-delay:.1s">
            <div class="faq-item">
                <button class="faq-trigger" onclick="toggleFaq(this)">
                    <span>Bagaimana cara mendaftar di Data SBANDA?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer"><p>Klik tombol "Daftar Sekarang", buat akun menggunakan email aktif Anda, lalu lengkapi data siswa dan wali murid. Setelah data diverifikasi admin, Anda bisa langsung mengakses seluruh fitur.</p></div>
            </div>
            <div class="faq-item">
                <button class="faq-trigger" onclick="toggleFaq(this)">
                    <span>Apakah data anak saya aman?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer"><p>Sangat aman. Kami menggunakan enkripsi data dan sistem autentikasi berlapis. Hanya orang tua/wali terdaftar dan admin sekolah yang bisa mengakses data siswa terkait.</p></div>
            </div>
            <div class="faq-item">
                <button class="faq-trigger" onclick="toggleFaq(this)">
                    <span>Apakah platform ini gratis?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer"><p>Ya, Data SBANDA sepenuhnya gratis untuk digunakan oleh orang tua/wali murid. Tidak ada biaya tersembunyi atau langganan yang dikenakan.</p></div>
            </div>
            <div class="faq-item">
                <button class="faq-trigger" onclick="toggleFaq(this)">
                    <span>Berapa lama proses verifikasi akun?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer"><p>Proses verifikasi biasanya memerlukan waktu 1x24 jam kerja. Admin sekolah akan mencocokkan data yang Anda masukkan dengan data siswa di sekolah.</p></div>
            </div>
            <div class="faq-item">
                <button class="faq-trigger" onclick="toggleFaq(this)">
                    <span>Bisa diakses dari perangkat apa saja?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer"><p>Data SBANDA dapat diakses melalui semua perangkat: smartphone (Android/iOS), tablet, laptop, maupun desktop. Cukup buka melalui browser tanpa perlu install aplikasi.</p></div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════ CTA FINAL ═══════════ -->
<section class="cta-section">
    <div class="cta-blob-1"></div>
    <div class="cta-blob-2"></div>
    <div class="cta-inner reveal-up">
        <h2>Siap Pantau Kehadiran <span class="text-blue-600">Anak Anda?</span></h2>
        <p>Bergabung dengan ratusan orang tua yang sudah mempercayakan monitoring kehadiran anak melalui Data SBANDA.</p>
        <div class="cta-buttons">
            <a href="{{ route('register.form') }}" class="btn-primary group text-lg px-10 py-4">
                <span>Daftar Gratis Sekarang</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            <a href="{{ route('login.form') }}" class="btn-ghost text-lg px-10 py-4">
                <span>Sudah Punya Akun?</span>
            </a>
        </div>
    </div>
</section>

<!-- ═══════════ FOOTER ═══════════ -->
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="flex items-center gap-3 mb-5">
                    <div class="nav-logo-icon">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3ZM18.82 9L12 12.72L5.18 9L12 5.28L18.82 9ZM17 15.99L12 18.72L7 15.99V12.27L12 15L17 12.27V15.99Z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800 font-display">Data SBANDA</span>
                </div>
                <p class="footer-desc">Platform monitoring kehadiran siswa yang menghubungkan orang tua dan sekolah secara digital, transparan, dan real-time.</p>
                <div class="footer-socials">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>
            <div>
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#fitur">Fitur</a></li>
                    <li><a href="#cara-kerja">Cara Kerja</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4>Akses Cepat</h4>
                <ul>
                    <li><a href="{{ route('login.form') }}">Login Portal</a></li>
                    <li><a href="{{ route('register.form') }}">Registrasi</a></li>
                    <li><a href="{{ route('admin.login') }}">Admin Panel</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Data SBANDA. All rights reserved.</p>
            <p>Dibuat dengan <span class="text-red-500">♥</span> untuk pendidikan Indonesia</p>
        </div>
    </div>
</footer>

<script>
const nav=document.getElementById('landing-nav');
window.addEventListener('scroll',()=>{nav.classList.toggle('nav-scrolled',window.scrollY>50)});
document.getElementById('mobile-nav-btn')?.addEventListener('click',()=>{document.getElementById('mobile-nav-menu')?.classList.toggle('hidden')});
document.querySelectorAll('a[href^="#"]').forEach(a=>{a.addEventListener('click',function(e){e.preventDefault();const t=document.querySelector(this.getAttribute('href'));if(t){t.scrollIntoView({behavior:'smooth',block:'start'});document.getElementById('mobile-nav-menu')?.classList.add('hidden')}})});
const ro=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('revealed');ro.unobserve(e.target)}})},{threshold:.1,rootMargin:'0px 0px -50px 0px'});
document.querySelectorAll('.reveal-up').forEach(el=>ro.observe(el));
function animateCounters(){document.querySelectorAll('[data-count]').forEach(c=>{if(c.dataset.animated)return;const t=parseInt(c.dataset.count),d=2000,inc=t/(d/16);let cur=0;const ti=setInterval(()=>{cur+=inc;if(cur>=t){c.textContent=t.toLocaleString();c.dataset.animated='true';clearInterval(ti)}else{c.textContent=Math.floor(cur).toLocaleString()}},16)})}
const co=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting)animateCounters()})},{threshold:.3});
document.querySelectorAll('[data-count]').forEach(el=>co.observe(el));
function toggleFaq(btn){const item=btn.parentElement,ans=item.querySelector('.faq-answer'),icon=btn.querySelector('.faq-icon'),open=item.classList.contains('faq-open');document.querySelectorAll('.faq-item').forEach(f=>{f.classList.remove('faq-open');f.querySelector('.faq-answer').style.maxHeight='0';f.querySelector('.faq-icon').style.transform='rotate(0deg)'});if(!open){item.classList.add('faq-open');ans.style.maxHeight=ans.scrollHeight+'px';icon.style.transform='rotate(180deg)'}}
</script>
</body>
</html>
