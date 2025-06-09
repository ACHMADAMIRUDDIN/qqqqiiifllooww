<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Dokter</title>
  <link rel="stylesheet" href="cssdokter/jadwaldokter1.css">  
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
    const dataJadwal = {
  Akupuntur: [
    { nama: "Dr. Yoga", jadwal: "08:00 - 10:00" },
    { nama: "Dr. Lina", jadwal: "13:00 - 15:00" }
  ],
  Akupresur: [
    { nama: "Dr. Budi", jadwal: "09:00 - 11:00" }
  ],
  Bekam: [
    { nama: "Dr. Rina", jadwal: "10:00 - 12:00" }
  ],
  Pijat: [
    { nama: "Dr. Toni", jadwal: "11:00 - 13:00" }
  ]
};

function cariJadwal() {
  const tanggal = document.getElementById("tanggal").value;
  const terapi = document.getElementById("terapi").value;
  const hasil = document.getElementById("hasil");

  if (!tanggal || !terapi) {
    alert("Silakan isi tanggal dan pilih jenis terapi.");
    return;
  }

  const daftar = dataJadwal[terapi];

  if (daftar && daftar.length > 0) {
    hasil.innerHTML = daftar.map(item =>
      `<tr><td>${item.nama}</td><td>${item.jadwal}</td></tr>`
    ).join('');
  } else {
    hasil.innerHTML = '<tr><td colspan="2">Tidak ada jadwal</td></tr>';
  }
}

  </script>

<div class="about-us-banner" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(255, 255, 255, 0.8) 100%), url('set/img/2705523986e1892362b489f56fc4ec94.jpg'); background-size: cover; background-position: center; background-blend-mode: multiply; background-color: #5f94ff; color: white;">
    <h1>Jadwal Dokter</h1>
    <p>Dimohon Sebelum Mengunjungi Klinik Dapat Menghubungi Atau Mendaftar Terlebih Dahulu</p>
</div>

@auth
  <!-- Konten Profil Dokter dalam Box -->
   <div class="container">
    <div class="form-container">
      <input type="date" id="tanggal" />
      <select id="terapi">
        <option value="">-- Pilih Jenis Terapi --</option>
        <option value="Akupuntur">Akupuntur</option>
        <option value="Akupresur">Akupresur</option>
        <option value="Bekam">Bekam</option>
        <option value="Pijat">Pijat</option>
      </select>
      <button onclick="cariJadwal()">Cari</button>
    </div>

    <div class="result-container">
      <table>
        <thead>
          <tr>
            <th>NAMA DOKTER</th>
            <th>JADWAL</th>
          </tr>
        </thead>
        <tbody id="hasil">
          <tr><td colspan="2">Tidak ada jadwal</td></tr>
        </tbody>
      </table>
    </div>
  </div>
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
