<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Layanan - Sehat Harmoni Indonesia</title>
    <link rel="stylesheet" href="New folder/css/pesanlayanan.css">
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

    <div class="about-us-banner"
        style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, rgba(255, 255, 255, 0.8) 100%), url('set/img/2705523986e1892362b489f56fc4ec94.jpg'); background-size: cover; background-position: center; background-blend-mode: multiply; background-color: #5f94ff; color: white;">
        <h1>Pesan Layanan</h1>
        <p>Sebelum Melakukan Pemesanan Cek Jadwal Dokter Terlebih Dahulu</p>
    </div>

    <!-- Formulir -->

    <section class="form-section">
        <h2 class="form-title">Pesan Layanan</h2>
        @auth

            <form action="{{ route('form.store') }}" method="POST" class="service-form">
                @csrf

                <h3>Data Pasien:</h3>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required>

                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" required>

                <label for="no_hp">No. Handphone</label>
                <input type="tel" name="no_hp" required>

                <label for="email">Alamat Email</label>
                <input type="email" name="email" required>

                <label for="alamat">Alamat Rumah</label>
                <input type="text" name="alamat" required>

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <h3>Informasi Kesehatan:</h3>

                <label for="gejala">Gejala</label>
                <input type="text" name="gejala" placeholder="Gejala" required>

                <label for="riwayat_penyakit">Riwayat Penyakit</label>
                <input type="text" name="riwayat_penyakit" placeholder="Riwayat Penyakit" required>

                <label for="keluhan">Keluhan Disampaikan Menurut?</label>
                <input type="text" name="keluhan" placeholder="Keluhan Disampaikan Menurut?" required>

                <label for="keluhan_utama">Keluhan Utama</label>
                <textarea name="keluhan_utama" placeholder="Keluhan Utama" required></textarea>

                <label for="jadwal_pemesanan">Tanggal Pemesanan</label>
                <input type="datetime-local" name="jadwal_pemesanan" required>

                <label for="jenis_layanan">Jenis Layanan</label>
                <select name="jenis_layanan" required>
                    <option value="">Jenis Layanan</option>
                    <option value="Akupunture">Akupunture</option>
                    <option value="Akupresure">Akupresure</option>
                    <option value="Bekam">Bekam</option>
                    <option value="Pijat">Pijat</option>
                </select>

                <div class="checklist">
                    <p><strong>Silakan baca dan beri tanda centang pada setiap pernyataan di bawah ini:</strong></p>
                    <ul style="text-align: justify; margin-left: 20px;">
                        <li>Saya memahami bahwa tindakan akupunktur dapat menimbulkan efek samping ringan seperti memar,
                            nyeri, pusing, atau kelelahan.</li>
                        <li>Saya telah menginformasikan semua kondisi medis yang saya alami, termasuk penyakit kronis,
                            alergi, serta status kehamilan (jika ada).</li>
                        <li>Saya memberikan izin kepada praktisi/terapis akupunktur untuk melakukan tindakan sesuai standar
                            medis yang berlaku.</li>
                        <li>Saya memahami bahwa semua informasi saya akan dijaga kerahasiaannya sesuai dengan kebijakan
                            penyedia layanan.</li>
                        <li>Saya mengetahui dan menyetujui kebijakan pembatalan atau penjadwalan ulang layanan yang berlaku.
                        </li>
                    </ul><br>

                    <!-- Ini akan divalidasi oleh controller sebagai 'accepted' -->
                    <label>
                        <input type="checkbox" name="persetujuan" value="1" required>
                        Dengan menyetujui secara digital, saya menyatakan telah membaca, memahami, dan menyetujui seluruh
                        isi pernyataan ini tanpa paksaan dari pihak manapun.
                    </label>
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
                <p>Jl. Tlogamas No.45, Dusun Rambaan, Landungsari, Kec. Dau, Kota Malang, Jawa Timur 65144</p>
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

  <!-- JS Hamburger dan Dropdown -->
  <script>
    const hamburger = document.getElementById('hamburger-menu');
    const navUl = document.getElementById('nav-ul');
    hamburger.addEventListener('click', () => {
      navUl.classList.toggle('active');
    });

    document.querySelectorAll('.menu .dropdown > a').forEach(link => {
      link.addEventListener('click', function(e) {
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
</body>

</html>
