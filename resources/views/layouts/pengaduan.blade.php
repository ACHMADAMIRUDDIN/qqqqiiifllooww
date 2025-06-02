<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="penga/css/csspeng.css" />
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
    <h1>Pengaduan</h1>
    <p>Anda Dapat Memberikan Kritik/Saran Terkait Layanan Yang Kami Berikan</p>
</div>
 @auth
  <div class="form-container">
        <div class="form-header">
            Pengaduan Pasien
        </div>

        <div class="section-title">
            Identitas Responden :
        </div>

        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap">
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="text" id="tanggal_lahir" name="tanggal_lahir">
        </div>

        <div class="form-group">
            <label for="no_handphone">No. Handphone</label>
            <input type="tel" id="no_handphone" name="no_handphone">
        </div>

        <div class="form-group">
            <label for="alamat_email">Alamat Email</label>
            <input type="email" id="alamat_email" name="alamat_email">
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="usia">Usia</label>
            <input type="text" id="usia" name="usia">
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan">
        </div>

        <div class="form-group">
            <label for="jenis_layanan">Jenis Layanan yang Digunakan</label>
            <input type="text" id="jenis_layanan" name="jenis_layanan">
        </div>

        <div class="form-group">
            <label for="tanggal_layanan">Tanggal Melakukan Layanan</label>
            <input type="date" id="tanggal_layanan" name="tanggal_layanan">
        </div>

        <div class="section-title">
            Kritik/Saran :
        </div>

        <div class="form-group">
            <label for="kritik_saran">Ketik di sini...</label>
            <textarea id="kritik_saran" name="kritik_saran"></textarea>
        </div>

        <div class="submit-button-container">
            <button type="submit" class="submit-button">Adukan</button>
        </div>

    </div>
  </div>
@else
  <div style="background:#fff;border-radius:12px;padding:2em;text-align:center;max-width:500px;margin:2em auto;box-shadow:0 2px 12px #0002;">
    <h2 style="font-weight:600;margin-bottom:1em;color:#444;">Pesan Layanan</h2>
    <p style="margin-bottom:2em;font-size:1.1em;">
      Anda harus <a href="{{ route('login') }}" style="color:#2563eb;text-decoration:underline;font-weight:500;">login</a> atau 
      <a href="{{ route('register') }}" style="color:#2563eb;text-decoration:underline;font-weight:500;">register</a> terlebih dahulu untuk mengisi form pengaduan.
    </p>
    <div style="display:flex;gap:1em;justify-content:center;">
      <a href="{{ route('login') }}" style="background:#4f8cff;color:#fff;padding:0.7em 2.5em;border-radius:8px;font-weight:600;text-decoration:none;font-size:1.1em;box-shadow:0 2px 8px #4f8cff33;">Login</a>
      <a href="{{ route('register') }}" style="background:#4f8cff;color:#fff;padding:0.7em 2.5em;border-radius:8px;font-weight:600;text-decoration:none;font-size:1.1em;box-shadow:0 2px 8px #4f8cff33;">Register</a>
    </div>
  </div>
@endauth

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