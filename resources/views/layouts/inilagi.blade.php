<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Akupunktur - Sehat Harmoni Indonesia</title>
  <link rel="stylesheet" href="detailberita/detailberita.css">  
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
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

  <!-- Bagian menu navbar responsif -->
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
  <!-- Judul Halaman -->
  <section class="hero">
    <h1>informasi</h1>
  </section>

  <!-- Konten -->
<div class="gambar">
  <img src="img/Screenshot 2025-02-26 111859.png" class="image-fade-in-up">
</div>
<div class="teks-bawah-gambar">
  <!-- Pindahkan isi <main class="content"> ke sini agar rapi dan di tengah -->
  <p>
    “Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, <br>
    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.<br>
    Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.”<br><br>

    “Ini adalah cara cerdas untuk mengatasi berbagai masalah kesehatanmu. Gak usah takut jarum lagi deh 😁, karena akupunktur itu gak seburuk yang kamu bayangkan kok!”<br><br>

    “Kalau sakit kepala kamu gak sembuh-sembuh, mungkin perlu coba akupunktur.”<br><br>

    “Dari riset dan sidang yang kami temukan, ternyata akupunktur memberikan rasa rileks saat sesi berjalan karena rasa sakit itu—ternyata cuma di bayangan kita aja! Bahkan ada pasien dengan migrain berat aja setelah mendapatkan 3 sesi udah merasa enteng banget loh.”<br><br>

    “Untuk nyeri sendi atau masalah pencernaan, akupunktur bisa jadi solusi yang baik.”<br><br>

    “Kamu sering pegal di pundak, leher, atau punggung belakang? Apalagi duduk lama kerja di depan laptop? Ini salah satu cara yang bisa bantu banget!”<br><br>

    Atau siapa tahu yang mau meredakan rasa sakit tanpa obat, ternyata ini bisa membawa sesuatu yang lebih baik?
  </p>
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
  </footer>

</body>
</html>
