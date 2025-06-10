<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="kontak/css/cssle.css" />
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

  <!-- Overlay -->
  <div id="overlay" class="overlay" onclick="toggleLogin()"></div>

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
        <a href="#">Terapis</a>
        <ul class="dropdown-content">
          <li><a href="/jadwaldokter1">Jadwal Terapis</a></li>
          <li><a href="/profildokter">Profil Terapis</a></li>
        </ul>
      </li>
      <li >
        <a href="/pesanlayanan">Layanan Terapis</a> 
      </li>
      <li><a href="/pengaduan">Layanan Pengaduan</a></li>
    </ul>
  </nav>


<div class="about-us-banner" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(255, 255, 255, 0.8) 100%), url('set/img/2705523986e1892362b489f56fc4ec94.jpg'); background-size: cover; background-position: center; background-blend-mode: multiply; background-color: #5f94ff; color: white;">
    <h1>Kontak</h1>
    <p>
Dimohon Sebelum Mengunjungi Klinik Dapat Menghubungi Atau Membuat Janji Temu/Mendaftar Terlebih Dahulu.</p>
</div>


 <div class="main-container">
        <div class="map-section">
            <div class="map-header">
                <span class="icon">Y</span>
                <h2>Sehat Harmoni Indonesia</h2>
            </div>
            <p class="map-address">Jl. Brigjen Slamet Riadi 14 Malang<br>Indonesia 65112</p>
            <a href="#" class="map-link">Lihat peta lebih besar</a>

            <div class="map-placeholder">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13290.344356309506!2d112.62172787938347!3d-7.973817240726862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6282c8d5a600d%3A0xef21ef1552c1d8a5!2sSehat%20Harmoni!5e0!3m2!1sid!2sid!4v1748354985043!5m2!1sid!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="details-section">
            <h3>Rincian</h3>
            <div class="detail-item">
                <span class="detail-label">ALAMAT :</span>
                <span class="detail-value">Jl. Brigjen Slamet Riadi 14 Malang, Jawa Timur, Indonesia 6502</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">NO TELEPON :</span>
                <span class="detail-value">(0341) 387093</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">WHATSAPP :</span>
                <span class="detail-value">(0341) 367003</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">EMAIL :</span>
                <span class="detail-value"><a href="mailto:harmony_fengshui@yahoo.com">harmony_fengshui@yahoo.com</a></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">FAX :</span>
                <span class="detail-value">0341 345854</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">INSTAGRAM :</span>
                <span class="detail-value">@SehatPul</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">FACEBOOK :</span>
                <span class="detail-value">Sehat Harmoni Malang</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">YOUTUBE :</span>
                <span class="detail-value">Sehat Pul</span>
            </div>
        </div>
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
