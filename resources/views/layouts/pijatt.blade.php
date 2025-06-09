<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Dokter</title>
  <link rel="stylesheet" href="new folder/css/pijatt.css">  
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
</head>
<body>

  <!-- Header -->
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
   <li><a href="/artikel">Artikel</a></li>
        </ul>
      </li>

      <li><a href="/iki">Kontak</a></li>
      <li><a href="/pengaduan">Layanan Pengaduan</a></li>
    </ul>
  </nav>


<div class="about-us-banner" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(255, 255, 255, 0.8) 100%), url('set/img/2705523986e1892362b489f56fc4ec94.jpg'); background-size: cover; background-position: center; background-blend-mode: multiply; background-color: #5f94ff; color: white;">
    <h1>Pijat</h1>
    <p>
layanan pijat, silakan hubungi kami atau buat janji temu sebelum datang ke klinik.</p>
</div>

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

  <!-- Konten Profil -->
  <main class="content">
    <div class="layanan-container">
      <img class="layanan-img" src="img/images (1).jpeg" alt="Akupunktur">
      <div class="layanan-deskripsi">
        <P>
        NAkupresur adalah teknik perawatan kesehatan yang menggunakan penekanan pada titik-titik tertentu
        di tubuh dengan tujuan untuk meningkatkan kesehatan dan kesejahteraan.
        Teknik ini mirip dengan akupuntur, tetapi tanpa penggunaan jarum.
        Akupresur melibatkan pemberian tekanan pada titik-titik akupuntur menggunakan jari,
        bagian tubuh lain, atau alat bantu, untuk merangsang aliran energi dan memulihkan keseimbangan tubuh.
        </P>
      </div>
      @auth
        <button class="btn-daftar">Daftar ke Layanan</button>
      @else
        <div style="background:#fff;border-radius:12px;padding:2em;text-align:center;max-width:500px;margin:2em auto;box-shadow:0 2px 12px #0002;">
          <h2 style="font-weight:600;margin-bottom:1em;color:#444;">Pesan Layanan</h2>
          <p style="margin-bottom:2em;font-size:1.1em;">
            Anda harus <a href="{{ route('login') }}" style="color:#2563eb;text-decoration:underline;font-weight:500;">login</a> atau
            <a href="{{ route('register') }}" style="color:#2563eb;text-decoration:underline;font-weight:500;">register</a> terlebih dahulu untuk mengisi form pemesanan layanan.
          </p>
          <div style="display:flex;gap:1em;justify-content:center;">
            <a href="{{ route('login') }}" style="background:#4f8cff;color:#fff;padding:0.7em 2.5em;border-radius:8px;font-weight:600;text-decoration:none;font-size:1.1em;box-shadow:0 2px 8px #4f8cff33;">Login</a>
            <a href="{{ route('register') }}" style="background:#4f8cff;color:#fff;padding:0.7em 2.5em;border-radius:8px;font-weight:600;text-decoration:none;font-size:1.1em;box-shadow:0 2px 8px #4f8cff33;">Register</a>
          </div>
        </div>
      @endauth
    </div>
  </main>

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
