<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Header Website</title>
  <link rel="stylesheet" href="aset/css/cssnya.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
          <a href="{{ route('beranda') }}" style="font-weight:bold; color:#2b6cb0; font-size:1.1em; text-shadow:1px 1px 2px #e0e0e0;">
            {{ Auth::user()->name }}
          </a>
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

  <!-- Overlay -->
  <div id="overlay" class="overlay hidden"></div>

  <!-- Login Modal -->
  <div id="loginModal" class="login-modal hidden">
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
      link.addEventListener('click', function (e) {
        if (window.innerWidth <= 900) {
          e.preventDefault();
          this.parentElement.classList.toggle('open');
        }
      });
    });
  </script>
  <header  alt="Header Image" >
    <img src="aset/img/2705523986e1892362b489f56fc4ec94.jpg" alt="Header Image">
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
      <h3>Jadwal Dokter</h3>
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
        Rumah Sakit Universitas Muhammadiyah Malang mulai dibangun pada tahun 2009. Proses pembangunannya dilaksanakan
        setelah mendapatkan ijin mendirikan bangunan (IMB) dari Pemerintah Kabupaten Malang melalui unit pelayanan
        terpadu...
      </p>
      <a href="{{ route('tentangkami') }}" class="btn-selengkapnya">Selengkapnya ➝</a>
    </div>


    <div class="tentang-img">
      <video autoplay muted loop playsinline>
        <source src="aset/img/WhatsApp Video 2025-05-07 at 14.12.40_482a688e.mp4" type="video/mp4">
        Browser Anda tidak mendukung tag video.
      </video>
    </div>
  </section>


  <section class="darurat" style="background-image: url('aset/img/2705523986e1892362b489f56fc4ec94.jpg');">
    <div class="darurat-overlay">
      <div class="quote-icon">❝</div>
      <p class="darurat-text">
        Apakah Anda membutuhkan Perawatan Medis Darurat?<br>
        Hubungi : 0341-561666
      </p>
      <p class="testimonial-author">John Doe</p>
    </div>
  </section>

  <section class="promo">
    <h2>Promo</h2>

    <div class="promo-items" id="promoScroll">
      <div class="promo-item">Promo 1</div>
      <div class="promo-item">Promo 2</div>
      <div class="promo-item">Promo 3</div>
      <div class="promo-item">Promo 4</div>
      <div class="promo-item">Promo 5</div>
    </div>

    <button class="lihat-selengkapnya" id="lihatBtn" style="display: none;">Lihat Selengkapnya</button>
  </section>

  <section class="berita">
    <h2>Berita</h2>

    <div class="berita-items" id="beritaScroll">
      <div class="berita-item">
        <img src="aset/img/016ee41e29dbf2358a431465693b7c16.jpg" alt="Berita 1">
        <div class="berita-deskripsi">
<h3>
  <a href="{{ route('detailberita1') }}" class="news-title-link">
    Judul Berita 1
  </a>
</h3>
          <p>Deskripsi singkat berita 1 yang menarik dan informatif.</p>
        </div>
      </div>

      <div class="berita-item">
        <img src="aset/img/2705523986e1892362b489f56fc4ec94.jpg" alt="Berita 2">
        <div class="berita-deskripsi">
<h3>
  <a href="{{ route('detailberita2') }}" class="news-title-link">
    Judul Berita 1
  </a>
</h3>
          <p>Deskripsi singkat berita 2 yang menarik dan informatif.</p>
        </div>
      </div>

      <div class="berita-item">
        <img src="aset/img/016ee41e29dbf2358a431465693b7c16.jpg" alt="Berita 3">
        <div class="berita-deskripsi">
<h3>
  <a href="{{ route('detailberita3') }}" class="news-title-link">
    Judul Berita 1
  </a>
</h3>
          <p>Deskripsi singkat berita 3 yang menarik dan informatif.</p>
        </div>
      </div>

      <!-- Tambahkan berita lainnya -->
    </div>

    <button class="lihat-selengkapnya" id="lihatBeritaBtn" style="display: none;">Lihat Selengkapnya</button>
  </section>

  <div class="outer-container">
    <section class="maps-details-container">
      <h3 class="maps-title">Maps Ini Berisikann Lokasi Dari Klinik Sehat Harmoni Malang</h3>
      <div class="maps-details-wrapper">
        <div class="map-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2497697656395!2d112.62632957505409!3d-7.973118192051944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6282c8d5a600d%3A0xef21ef1552c1d8a5!2sSehat%20Harmoni!5e0!3m2!1sid!2sid!4v1747040906322!5m2!1sid!2sid"
            width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="details-container">
          <h3 class="details-title">Rincian</h3>
          <p class="detail-item"><span class="detail-label">📍 ALAMAT</span>: Jl. Brigjen Slamet Riadi 14 Malang, Jawa
            Timur, Indonesia 65112.</p>
          <p class="detail-item"><span class="detail-label">📞 NO. TELEPON</span>: xxxxxxxxxx</p>
          <p class="detail-item"><span class="detail-label">📱 WHATSAPP</span>: xxxxxxxxxx</p>
          <p class="detail-item"><span class="detail-label">✉️ EMAIL</span>: xxxxxxxxxx</p>
          <p class="detail-item"><span class="detail-label">📠 FAX</span>: -</p>
          <p class="detail-item"><span class="detail-label">🐦 TWITTER</span>: @xxxxxxxxxx</p>
          <p class="detail-item"><span class="detail-label">📸 INSTAGRAM</span>: @xxxxxxxxxx</p>
          <p class="detail-item"><span class="detail-label">f FACEBOOK</span>: xxxxxxxxxx</p>
          <p class="detail-item"><span class="detail-label">📺 YOUTUBE</span>: xxxxxxxxxx</p>
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
  <script src="aset/js/jsnya.js"></script>
</body>

</html>