<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Beranda - Sehat Harmoni Indonesia</title>
    <link rel="stylesheet" href="aset/css/cssnya.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.body.classList.add('loaded');
        });
    </script>
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
            @auth
                @role('admin')
                    <a href="{{ route('dashboard') }}" class="btn"><i class="bi bi-gear-fill">Admin</i></a>
                @endrole
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
    <!-- Script untuk hamburger dan dropdown -->
    <script>
        // Hamburger menu toggle
        const hamburger = document.getElementById('hamburger-menu');
        const navUl = document.getElementById('nav-ul');
        hamburger.addEventListener('click', () => {
            navUl.classList.toggle('active');
        });

        // Dropdown di mobile
        document.querySelectorAll('.menu .dropdown > a').forEach(link => {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 900) {
                    e.preventDefault();
                    this.parentElement.classList.toggle('open');
                }
            });
        });
    </script>
    <header class="header">
        <img src="aset/img/2705523986e1892362b489f56fc4ec94.jpg" alt="Header Image" class="header-img">

        <div class="header-overlay">
            <h1>Konsultasi Keluhan Anda (Admin Kami)</h1>
            <a href="https://wa.me/6285878607469?text=Halo%20saya%20ingin%20konsultasi%20dengan%20klinik%20Sehat%20Harmoni%20Indonesia"
                class="header-btn">Hubungi </a>
        </div>
    </header>

    <section class="info-buttons">
        <div class="info-button">
            <img src="aset/img/2705523986e1892362b489f56fc4ec94.jpg">
            <h3>Pesan Layanan</h3>
            <p>Layanan kesehatan terbaik dari Sehat Harmoni Indonesia untuk Anda.</p>
            <a href="{{ route('pesanlayanan') }}">Selengkapnya →</a>
        </div>
        <div class="info-button">
            <img src="aset/img/2705523986e1892362b489f56fc4ec94.jpg">
            <h3>Jadwal Terapis</h3>
            <p>Informasi jadwal dokter dari Sehat Harmoni Indonesia.</p>
            <a href="{{ route('jadwaldokter1') }}">Lihat Jadwal →</a>
        </div>
        <div class="info-button">
            <img src="aset/img/2705523986e1892362b489f56fc4ec94.jpg">
            <h3>Artikel</h3>
            <p>Informasi dan edukasi dari Sehat Harmoni Indonesia.</p>
            <a href="{{ route('artikel') }}">Selengkapnya →</a>
        </div>
    </section>


    <section class="tentang-kami">
        <div class="tentang-text">
            <h2>Tentang Kami</h2>
            <h3>SEJARAH</h3>
            <p>
                Sehat Harmony Indonesia adalah suatu pengobatan alternatif peduli terhadap HIV/AIDS dan NAPSA.
                Sehat Harmoni Indonesia merupakan asuhan suhu Drs. Hariadi seorang Master Trainer Akupunktur dan
                Geomancer Fengshui,
                yang aktif mengisi acara Feng Shui di Malang TV, Dhamma TV, dan siaran di radio-radio swasta di
                Indonesia.
            </p>
            <a href="{{ route('tentangkami') }}" class="btn-selengkapnya">Selengkapnya ➝</a>
        </div>


        <div class="tentang-img">
            <div class="video-container"
                style="position: relative; padding-bottom:56.25%; height: 100; overflow: hidden; max-width: 100%;">
                <iframe src="https://www.youtube.com/embed/0-chLJbtL8Q?autoplay=1&mute=1&controls=1" frameborder="0"
                    allow="autoplay; encrypted-media" allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>

        </div>
    </section>


    <section class="darurat">
        <div class="darurat-overlay">
            <div class="darurat-box">
                <div class="quote-icon">❝</div>
                <p class="darurat-text">
                    Apakah Anda membutuhkan penanganan dari kami?<br>
                    Hubungi : 0341-561666
                </p>
                <p class="testimonial-author">John Doe</p>
            </div>
    </section>

    <section>
        <div class="promo">
            <h2>Promo</h2>
            <h3>promo terbaru dan ter update ada di sini </h3>

            <div class="carousel-container" style="max-width: 600px; margin: 0 auto;">
                <div class="carousel-slide" id="promoSlide" style="display: flex; transition: transform 0.5s;">
                    @php
                        $promoImages = \App\Models\Promo::all();
                    @endphp
                    @foreach ($promoImages as $promo)
                        <div class="carousel-item"
                            style="flex: 0 0 100%; display: flex; justify-content: center; position:relative;">
                            @if (isset($promo->image_path))
                                <img src="{{ asset('storage/' . $promo->image_path) }}" onclick="openLightbox(this)"
                                    style="width: 100%; max-width: 600px; height: 320px; object-fit:cover; border-radius: 12px; box-shadow:0 2px 12px #0002; cursor:pointer;">
                                <div
                                    style="position:absolute;bottom:0;left:0;right:0;text-align:center;color:#fff;padding:0.5em 0;font-size:1.2em;font-weight:600;border-radius:0 0 12px 12px;">
                                    {{ $promo->judul }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="arrow left" onclick="prevSlide()">&#10094;</div>
                <div class="arrow right" onclick="nextSlide()">&#10095;</div>
                <div class="carousel-dots" id="promoDots"></div>
            </div>
            <div id="lightbox"
                style="display:none;position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.8);justify-content:center;align-items:center;">
                <span onclick="closeLightbox()"
                    style="position:absolute;top:30px;right:40px;font-size:3em;color:#fff;cursor:pointer;">&times;</span>
                <img id="lightbox-img" src=""
                    style="max-width:90vw;max-height:90vh;border-radius:12px;box-shadow:0 4px 32px #000a;">
            </div>
            <script>
                const slide = document.getElementById("promoSlide");
                const totalSlides = slide.children.length;
                const dotsContainer = document.getElementById("promoDots");
                let currentIndex = 0;
                let dots = [];

                function showSlide(index) {
                    if (index < 0) index = totalSlides - 1;
                    if (index >= totalSlides) index = 0;
                    slide.style.transform = `translateX(-${index * 100}%)`;
                    currentIndex = index;
                    dots.forEach(dot => dot.classList.remove("active"));
                    if (dots[index]) dots[index].classList.add("active");
                }

                function nextSlide() {
                    showSlide(currentIndex + 1);
                }

                function prevSlide() {
                    showSlide(currentIndex - 1);
                }

                // Dots
                for (let i = 0; i < totalSlides; i++) {
                    let dot = document.createElement("span");
                    dot.className = "dot";
                    if (i === 0) dot.classList.add("active");
                    dot.onclick = () => showSlide(i);
                    dotsContainer.appendChild(dot);
                    dots.push(dot);
                }

                showSlide(0);

                // Auto slide
                setInterval(() => {
                    nextSlide();
                }, 5000);

                // Lightbox
                function openLightbox(img) {
                    document.getElementById("lightbox-img").src = img.src;
                    document.getElementById("lightbox").style.display = "flex";
                }

                function closeLightbox() {
                    document.getElementById("lightbox").style.display = "none";
                }
            </script>

        </div>
    </section>
    @php
        $beritas = \App\Models\Berita::latest()->get();
    @endphp

    <section class="berita">
        <div class="mix-section">
            <div class="mix-title">Artikel</div>
            <div class="mix-subtitle">Artikel berisikan Informasi Kesehatan dan Akupunkture</div>
        </div>
        <br>
        <div class="berita-items" id="beritaScroll">
            @foreach ($beritas as $berita)
                <div class="berita-item">
                    @if ($berita->thumbnail)
                        <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="Thumbnail">
                    @endif
                    <div class="berita-deskripsi">
                        <h3>
                            <a href="{{ asset('storage/' . $berita->pdf_path) }}" target="_blank"
                                class="news-title-link">
                                {{ $berita->judul }}
                            </a>
                        </h3>
                        <p>{{ $berita->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="Maps">




        <body>
            <div class="outer-container">
                <section class="maps-details-container">
                    <h3 class="maps-title">Lokasi Klinik Sehat Harmoni Malang</h3>
                    <br>
                    <div class="maps-details-wrapper">
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2497697656395!2d112.62632957505409!3d-7.973118192051944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6282c8d5a600d%3A0xef21ef1552c1d8a5!2sSehat%20Harmoni!5e0!3m2!1sid!2sid!4v1747040906322!5m2!1sid!2sid"
                                width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="details-container">
                            <h3 class="details-title">Rincian</h3>

                            <p class="detail-item"><span class="detail-label"><i class="bi bi-geo-alt-fill"></i>
                                    ALAMAT</span>: Jl. Brigjen Slamet Riadi 14 Malang, Jawa Timur, Indonesia 65112.</p>
                            <p class="detail-item"><span class="detail-label"><i class="bi bi-telephone-fill"></i>
                                    NO. TELEPON</span>: (0341) 367093</p>
                            <p class="detail-item"><span class="detail-label"><i class="bi bi-whatsapp"></i>
                                    WHATSAPP</span>: (0341) 367093</p>
                            <p class="detail-item"><span class="detail-label"><i class="bi bi-envelope-fill"></i>
                                    EMAIL</span>: <a
                                    href="mailto:harmony_fengshui@yahoo.com">harmony_fengshui@yahoo.com</a></p>
                            <p class="detail-item"><span class="detail-label"><i class="bi bi-printer-fill"></i>
                                    FAX</span>: 0341  345854</p>
                            <p class="detail-item"><span class="detail-label"><i class="bi bi-instagram"></i>
                                    INSTAGRAM</span>: @SehatPol</p>
                            <p class="detail-item"><span class="detail-label"><i class="bi bi-facebook"></i>
                                    FACEBOOK</span>: Sehat Harmoni Malang</p>
                            <p class="detail-item"><span class="detail-label"><i class="bi bi-youtube"></i>
                                    YOUTUBE</span>: Sehat Pol</p>

                        </div>
                    </div>
                </section>
            </div>

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
                        <p><i class="bi bi-geo-alt-fill"></i>Jl. Tiogamas No.45, Dusun Rambaan, Landungsari, Kec. Dau,
                            Kota Malang, Jawa Timur 65144</p>
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
            <script src="aset/js/jsnya.js"></script>
        </body>
