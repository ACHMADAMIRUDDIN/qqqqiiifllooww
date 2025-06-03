<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan Layanan - Sehat Harmoni Indonesia</title>
  <link rel="stylesheet" href="New folder/css/pesanlayanan.css">
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


<div class="about-us-banner" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(255, 255, 255, 0.8) 100%), url('set/img/2705523986e1892362b489f56fc4ec94.jpg'); background-size: cover; background-position: center; background-blend-mode: multiply; background-color: #5f94ff; color: white;">
    <h1>Pengaduan</h1>
    <p>Anda Dapat Memberikan Kritik/Saran Terkait Layanan Yang Kami Berikan</p>
</div>

  <!-- Formulir -->
  
    <section class="form-section">
      <h2 class="form-title">Pesan Layanan</h2>
      @auth
      <form class="service-form">
        <h3>Data Pasien:</h3>
        <input type="text" placeholder="Nama Lengkap" required>
        <input type="date" required>
        <input type="tel" placeholder="No. Handphone" required>
        <input type="email" placeholder="Alamat Email" required>
        <input type="text" placeholder="Alamat Rumah" required>
        <input type="text" placeholder="Jenis Kelamin" required>

        <h3>Informasi Kesehatan:</h3>
        <input type="text" placeholder="Gejala Yang Dialami / Dirasakan" required>
        <input type="text" placeholder="Riwayat Penyakit" required>
        <input type="text" placeholder="Keluhan Disampaikan Menurut?" required>
        <textarea placeholder="Keluhan Utama" required></textarea>

        <select required>
          <option value="">Tanggal Layanan</option>
          <option value="2025-05-12">12 Mei 2025</option>
        </select>
        <select required>
          <option value="">Jenis Layanan</option>
          <option value="konsultasi">Konsultasi</option>
        </select>

        <div class="checklist">
          <p><strong>Silakan baca dan beri tanda centang pada setiap pernyataan di bawah ini:</strong></p>
          <label><input type="checkbox"> Saya tidak mengalami risiko besar dan kondisi kesehatan saya dianggap aman oleh dokter</label>
          <label><input type="checkbox"> Saya memahami layanan diberikan oleh petugas medis yang profesional</label>
          <label><input type="checkbox"> Saya menyadari bahwa hasil konsultasi tidak menjadi dasar tunggal diagnosis</label>
          <label><input type="checkbox"> Saya memberikan informasi yang benar kepada petugas</label>
          <label><input type="checkbox"> Saya menyetujui hasil konsultasi medis dapat dibagikan ke pihak lain sesuai kebutuhan</label>
          <label><input type="checkbox"> Saya mengizinkan pihak rumah sakit melakukan tindakan darurat bila diperlukan</label>
        </div>

        <button type="submit" class="submit-button">Daftar</button>
      </form>
@else
  <div style="text-align:center; margin: 2em 0;">
    <p>
      Anda harus <a href="{{ route('login') }}">login</a> atau 
      <a href="{{ route('register') }}">register</a> terlebih dahulu untuk mengisi form pemesanan layanan.
    </p>

    <div class="button-group">
      <a href="{{ route('login') }}" class="submit-button">Login</a>
      <a href="{{ route('register') }}" class="submit-button">Register</a>
    </div>
  </div>
@endauth

    </section>


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
