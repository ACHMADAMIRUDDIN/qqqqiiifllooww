<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Dokter</title>
  <link rel="stylesheet" href="css/artikel.css">
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
      <li >
        <a href="/pesanlayanan">Layanan Terapis</a> 
      </li>
      <li><a href="/pengaduan">Layanan Pengaduan</a></li>
    </ul>
  </nav>
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

<div class="about-us-banner" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(255, 255, 255, 0.8) 100%), url('set/img/2705523986e1892362b489f56fc4ec94.jpg'); background-size: cover; background-position: center; background-blend-mode: multiply; background-color: #5f94ff; color: white;">
    <h1>Artikel</h1>
    <p>Baca berbagai artikel seputar kesehatan, gaya hidup sehat, dan tips menjaga keseimbangan tubuh secara alami.</p>
</div>

  <!-- Konten Profil -->
  <section class="conten">
    <div class="card fade-in-left">
      <img src="img/acupuncture-2.jpg" alt="Akupunktur">
      <div class="text">
        <h3> Akupunktur: Terapi Tradisional dengan Jarum Halus</h3>
        <br>
        <p>Akupunktur adalah teknik pengobatan tradisional Tiongkok yang menggunakan jarum-jarum tipis yang ditusukkan ke titik-titik tertentu pada tubuh.</p>
      </div>
    </div>
    <div class="card fade-in-left">
      <img src="img/images.jpeg" alt="Akupunktur">
      <div class="text">
        <h3>Akupresur: Pijat Titik-Titik Energi untuk Kesehatan</h3>
        <br>
        <p>Akupresur adalah metode penyembuhan yang mirip dengan akupunktur, tetapi tanpa menggunakan jarum. Teknik ini menggunakan tekanan jari pada titik-titik tertentu di tubuh untuk merangsang energi dan memperbaiki fungsi organ</p>
      </div>
    </div>
    <div class="card fade-in-left">
      <img src="img/jenis-terapi-bekam-1.jpg" alt="Akupunktur">
      <div class="text">
        <h3>Bekam: Pengobatan Kuno dengan Cangkir Vakum</h3>
        <br>
        <p>Bekam adalah terapi pengobatan tradisional yang dilakukan dengan meletakkan cangkir khusus pada permukaan kulit dan menciptakan efek vakum</p>
      </div>
    </div>
    <div class="card fade-in-left">
      <img src="img/images (1).jpeg" alt="Akupunktur">
      <div class="text">
        <h3>Pijat: Relaksasi dan Penyembuhan dengan Sentuhan</h3>
        <p>Pijat adalah teknik terapi fisik yang menggunakan tangan untuk memberikan tekanan dan gerakan pada otot, sendi, dan jaringan tubuh lainnya</p>
      </div>
    </div>
  </section>

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
  </footer>

</body>
</html>
