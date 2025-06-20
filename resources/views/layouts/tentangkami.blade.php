<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Harmoni Indonesia | Tentang Kami</title>
    <link rel="stylesheet" href="set/css/opocs.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
</head>

<body>
    <div class="top-bar">
        <div class="marquee">
            📍 Jl. alamat Brigjen Slamet Riyadi 14 Malang, Jawa Timur, Indonesia 65112
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo" style="display: flex; align-items: center; gap: 10px;">
            <img src="img/sehat_harmoni.jpeg" alt="Logo Sehat Harmoni" style="height: 40px;">
            <span>Sehat Harmoni Indonesia</span>
        </div>
        <div class="contact">
            @auth
                <span class="welcome-text">
                    Hallo, {{ Auth::user()->name }}
                </span>
                <span>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </span>
            @else
                <span>
                    <a href="{{ route('login') }}" class="btn">Log in</a>
                </span>
                <span>
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                </span>
            @endauth
        </div>
    </div>

    {{-- Tempatkan konten halaman di sini --}}
    @yield('content')




    <!-- Menu Navigasi -->
    <nav class="menu">
        <div class="hamburger" id="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul id="nav-ul">
            <li><a href="/beranda">Beranda</a></li>
            <li><a href="/tentangkami">Tentang Kami</a></li>
            <li class="dropdown">
                <a href="#">Terapis</a>
                <ul class="dropdown-content">
                    <li><a href="/jadwaldokter1">Jadwal Terapis</a></li>
                    <li><a href="/profildokter">Profil Terapis</a></li>
                </ul>
            </li>
            <li>
                <a href="/pesanlayanan">Layanan Terapis</a>
            </li>
            <li><a href="/pengaduan">Layanan Pengaduan</a></li>
        </ul>
    </nav>

    <div class="about-us-banner"
        style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(255, 255, 255, 0.8) 100%), url('sehat/10.jpg'); background-size: cover; background-position: center; background-blend-mode: multiply; background-color: #5f94ff; color: white;">
        <h1>Tentang Kami</h1>
        <p>Profil Klinik Sehat Harmoni Indonesia</p>
    </div>

    <div class="page-content-wrapper">
        <div class="swiper-container">
            <div class="swiper-wrapper align-items-center">
                @php
                    $profil_klinik = App\Models\Profil_klinik::first();
                @endphp
                @foreach ($profil_klinik->gambarKlinik as $gambar)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="Gambar Klinik">
                    </div>
                @endforeach
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Inisialisasi Swiper
        window.onload = function() {
            new Swiper('.swiper-container', {
                // Konfigurasi untuk menampilkan satu slide pada satu waktu
                slidesPerView: 1,
                spaceBetween: 0, // Tidak ada jarak antar slide
                direction: 'horizontal', // Arah geser horizontal
                loop: true, // Pengulangan tak terbatas
                autoplay: {
                    delay: 3000, // Geser otomatis setiap 3 detik
                    disableOnInteraction: false, // Lanjutkan autoplay setelah interaksi pengguna
                },

                // Konfigurasi tombol navigasi (prev/next)
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // Konfigurasi pagination (titik-titik di bawah)
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true, // Membuat titik pagination bisa diklik
                },

                // Efek transisi (opsional, bisa diubah)
                effect: 'slide', // Efek geser standar
            });
        };
    </script>
    @if ($profil_klinik)
        <div class="content-section">
            <p style="margin-left: 20px; margin-right: 20px">{{ $profil_klinik->deskripsi }}</p>
        </div>
    @endif
    <div class="contact-info">
        <p>Sekretariat Sehat Harmoni Indonesia berada di Jl. Brigjen Slamet Riadi 14 Malang, Jawa Timur, Indonesia
            65112.</p>
        <p>Telp (0341) 367093Â Â Fax. (0341) 345854</p>
        <p>E-mail : <a href="mailto:harmony_fengshui@yahoo.com">harmony_fengshui@yahoo.com</a></p>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h4>Sehat Harmoni Indonesia</h4>
                <p>Layananmu, Pengabdianku</p>
            </div>
            <div class="footer-column">
                <h4>Ikuti Kami</h4>
                <ul>
                    <li><i class="bi bi-instagram"></i> INSTAGRAM : @SehatPol</li>
                    <li><i class="bi bi-facebook"></i> FACEBOOK : Sehat Harmoni Malang </li>
                    <li><i class="bi bi-youtube"></i> YOUTUBE : Sehat Pol</li>
                </ul>
            </div>
            <div class="footer-column kontak">
                <h4>Kontak</h4>
                <p><i class="bi bi-geo-alt-fill"></i>Jl. Tiogamas No.45, Dusun Rambaan, Landungsari, Kec. Dau, Kota
                    Malang, Jawa Timur 65144</p>
                <p><i class="bi bi-phone"></i>NO. TELEPON : (0341) 367093</p>
                <p><i class="bi bi-whatsapp"></i>WHATSAPP : (0341) 367093</p>
                <p><i class="bi bi-envelope"></i><a style="color: #ffffff;"
                        href="mailto:harmony_fengshui@yahoo.com">EMAIL : harmony_fengshui@yahoo.com</a></p>
                <p><i class="bi bi-printer"></i>FAX : 0341 345854</p>
            </div>
        </div>


    </footer>

    <div class="copyright">
        <p>&copy; 2025 Jempol Akupuntur. All rights reserved.</p>
    </div>

    <!-- JS Hamburger dan Dropdown -->
    <script>
        const hamburger = document.getElementById('hamburger-menu');
        const navUl = document.getElementById('nav-ul');
        hamburger.addEventListener('click', () => {
            navUl.classList.toggle('active');
        });

        document.querySelectorAll('.menu .dropdown > a').forEach(link => {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 900) {
                    e.preventDefault();
                    this.parentElement.classList.toggle('open');
                }
            });
        });
    </script>

    <script src="set/js/opojs.js"></script>
</body>

</html>

@php
    // Ganti pencarian admin/pasien agar tidak error jika kolom is_admin tidak ada
    // Misal: admin id 1, pasien id selain 1
    $admin = \App\Models\User::find(1);
    $pasien = \App\Models\User::where('id', '!=', 1)->first();
@endphp
