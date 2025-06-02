<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Dokter - Sehat Harmoni Indonesia</title>
  <link rel="stylesheet" href="cssdokter/style.css">
</head>
<body>

  <!-- Header -->
  <header>
    <div class="top-bar">
      <p>📍 Jl. alamat Brigjen Slamet Riyadi 14 Malang, Jawa Timur, Indonesia 65112</p>
    </div>
    <div class="navbar">
<div class="logo" style="display: flex; align-items: center; gap: 10px;">
  <img src="img/sehat_harmoni.jpeg" alt="Logo Sehat Harmoni" style="height: 40px;">
  <span>Sehat Harmoni Indonesia</span>
</div>

    </div>
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
  </header>

  <!-- Hero / Judul Halaman -->
  <section class="hero">
    <h1>Jadwal Dokter</h1>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div>
        <h4>Jempol Akupuntur</h4>
        <p>Layananku Pengobatanku</p>
      </div>
      <div>
        <h4>Ikuti Kami</h4>
        <p>🐦 Twitter: @</p>
        <p>📸 Instagram: @</p>
        <p>📘 Facebook: @</p>
        <p>▶️ YouTube: @</p>
      </div>
      <div>
        <h4>Kontak</h4>
        <p>Jl. Tlogomas No.45, Dusun Rambaan, Landungsari, Kec. Dau, Kota Malang</p>
        <p>☎️ Telp: 0341-898006</p>
        <p>📱 WA: 081234567045</p>
        <p>📧 Email: -</p>
        <p>📠 FAX: -</p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© Copyright 2021 | All Rights Reserved</p>
    </div>
  </footer>

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
</body>
</html>