<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="set/css/opocs.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
        <span>
          <a href="{{ route('beranda') }}">{{ Auth::user()->name }}</a>
        </span>
        <span>
          <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" style="background:none;border:none;padding:0;color:inherit;cursor:pointer;">Logout</button>
          </form>
        </span>
      @else
        <span>
          <a href="{{ route('login') }}">Log in</a>
        </span>
        <span>
          <a href="{{ route('register') }}">Register</a>
        </span>
      @endauth
    </div>
  </div>

  {{-- Tempatkan konten halaman di sini --}}
  @yield('content')



  <!-- Login Modal -->
  <div id="loginModal" class="login-modal">
    <div class="login-box">
      <h2>Login</h2>
      <input type="text" placeholder="Email atau Username" />
      <input type="password" placeholder="Password" />
      <button>Masuk</button>
    </div>
  </div>

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
        <a href="#">Dokter Kami </a>
        <ul class="dropdown-content">
          <li><a href="/jadwaldokter1">jadwal dokter</a></li>
          <li><a href="/profildokter">profil dokter</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Layanan </a>
        <ul class="dropdown-content">
          <li><a href="/pesanlayanan">pesan layanan</a></li>
          <li><a href="/apalah">Akupunture</a></li>
          <li><a href="/akupresure">akupresure</a></li>
          <li><a href="/bekam">bekam</a></li>
          <li><a href="/pijatt">pijat</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Informasi </a>
        <ul class="dropdown-content">
   <li><a href="/artikel">Artikel </a></li>
        </ul>
      </li>
  
      <li><a href="/iki">Kontak</a></li>
      <li><a href="/pengaduan">Layanan Pengaduan</a></li>
    </ul>
  </nav>


<div class="about-us-banner" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(255, 255, 255, 0.8) 100%), url('set/img/2705523986e1892362b489f56fc4ec94.jpg'); background-size: cover; background-position: center; background-blend-mode: multiply; background-color: #5f94ff; color: white;">
    <h1>Tentang Kami</h1>
    <p>Berisikan Tentang Profil Sehat Harmoni Indonesia</p>
</div>

      <div class="page-content-wrapper">
        <div class="swiper-container">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                    <img src="set/img/2705523986e1892362b489f56fc4ec94.jpg" alt="Gambar 1">
                </div>
                <div class="swiper-slide">
                    <img src="set/img/2705523986e1892362b489f56fc4ec94.jpg" alt="Gambar 2">
                </div>
                <div class="swiper-slide">
                    <img src="set/img/2705523986e1892362b489f56fc4ec94.jpg" alt="Gambar 3">
                </div>
                <div class="swiper-slide">
                    <img src="set/img/2705523986e1892362b489f56fc4ec94.jpg" alt="Gambar 4">
                </div>
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
 <div class="content-section">
        <p>Sehat Harmony Indonesia adalah suatu pengobatan alternatif peduli terhadap HIV/AIDS dan NAPSA.</p>
        <p>Sehat Harmoni Indonesia merupakan asuhan suhu Drs. Hariadi seorang MasterÂ Trainer Akupunktur dan Geomancer Fengshui, yang aktif mengisi acara Feng Shui di Malang TV, Dhamma TV, dan siaran di radio-radio swasta di Indonesia. Beliau juga seorang penulis artikel kesehatan dan Feng Shui di Malang Post, Liberty, Kaltim Post, Nusa Bali, dan majalah Indonesia Media (Los Angeles). Sehat Harmoni membuka pengobatan sosial setiap Minggu pagi pukul 07.00-10.00 WIB mulai tahun 1998 sampai sekarang. Kurang lebih 65-70 pasien yang datang dan berobat di pengobatan ini sudah merasakan khasiat dan manfaatnya.</p>
        <p>Sehat Harmoni Indonesia juga mengadakan pendidikan kursus akupressure, akupunktur, kop, dan moksa yang diadakan tiap 3 bulan sekali, sudah diadakan sampai angkatan 32, dan menghasilkan lebih dari 1000 tenaga ahli di bidang pengobatan alternatif yang sukses membuka praktek di seluruh Indonesia.</p>
    </div>

    <div class="contact-info">
        <p>Sekretariat Sehat Harmoni Indonesia berada di Jl. Brigjen Slamet Riadi 14 Malang, Jawa Timur, Indonesia 65112.</p>
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
          <li><i class="fab fa-twitter"></i> TWITTER : @</li>
          <li><i class="fab fa-instagram"></i> INSTAGRAM : @</li>
          <li><i class="fab fa-facebook-f"></i> FACEBOOK : </li>
          <li><i class="fab fa-youtube"></i> YOUTUBE : </li>
        </ul>
      </div>
      <div class="footer-column kontak">
        <h4>Kontak</h4>
        <p>Jl. Tiogamas No.45, Dusun Rambaan, Landungsari, Kec. Dau, Kota Malang, Jawa Timur 65144</p>
        <p><i class="fas fa-phone"></i> NO. TELEPON : 0341-XXXXXXXX</p>
        <p><i class="fab fa-whatsapp"></i> WHATSAPP : 081XXXXXXXXXX</p>
        <p><i class="fas fa-envelope"></i> EMAIL : -</p>
        <p><i class="fas fa-fax"></i> FAX : -</p>
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
      link.addEventListener('click', function (e) {
        if (window.innerWidth <= 900) {
          e.preventDefault();
          this.parentElement.classList.toggle('open');
        }
      });
    });

    // Fungsi toggle login modal
    function toggleLogin() {
      const overlay = document.getElementById("overlay");
      const modal = document.getElementById("loginModal");
      overlay.classList.toggle("active");
      modal.classList.toggle("active");
    }
  </script>

  <script src="set/js/opojs.js"></script>
</body>
</html>