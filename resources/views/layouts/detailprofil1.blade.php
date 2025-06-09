<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Dokter</title>
  <link rel="stylesheet" href="profil/detailprofil1.css">
  <style>
    .card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 24px #0002;
      max-width: 700px;
      margin: 2em auto 3em auto;
      padding: 2em 2em 1.5em 2em;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .card-content {
      display: flex;
      flex-direction: row;
      gap: 2em;
      align-items: flex-start;
      width: 100%;
    }
    .image-section {
      flex: 0 0 220px;
      display: flex;
      align-items: flex-start;
      justify-content: center;
    }
    .image-section img {
      width: 200px;
      height: 240px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 2px 12px #0001;
      border: 2px solid #e0e7ff;
      background: #f8fafc;
    }
    .info-section {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
    }
    .info-section h2 {
      font-size: 2em;
      font-weight: 700;
      margin-bottom: 0.5em;
      color: #2563eb;
    }
    .info-section hr {
      border: none;
      border-top: 2px solid #e0e7ff;
      margin: 0.5em 0 1em 0;
      width: 60%;
    }
    .info-section p {
      font-size: 1.1em;
      color: #444;
      margin-bottom: 0.7em;
      line-height: 1.6;
    }
    @media (max-width: 700px) {
      .card-content {
        flex-direction: column;
        align-items: center;
        gap: 1em;
      }
      .image-section img {
        width: 140px;
        height: 160px;
      }
      .info-section h2 {
        font-size: 1.3em;
      }
    }


    body {
  margin: 0;
  font-family: 'Arial', sans-serif;
  background: #f9f9f9;
  padding-top: 144px; /* 32px top-bar + 64px navbar + 48px menu */
}
.top-bar {
  background-color: #5f94ff;
  color: white;
  font-size: 12px;
  height: 30px;
  overflow: hidden;
  position: relative;
  display: flex;
  align-items: center;
}

.marquee {
  white-space: nowrap;
  display: inline-block;
  animation: scrollText 15s linear infinite;
  padding-left: 50%;
  /* Start dari kanan */
}

@keyframes scrollText {
  0% {
    transform: translateX(0%);
  }

  100% {
    transform: translateX(-100%);
  }
}


/* General Reset */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Navbar */
.navbar {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  background: #ffffff;
  padding: 15px 20px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.logo {
  font-size: 20px;
  font-weight: bold;
  color: #1976d2;
}

.contact {
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
  align-items: center;
  font-size: 14px;
}

.contact span {
  cursor: pointer;
  white-space: nowrap;
  color: #444;
}

/* Style umum */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.navbar {
  background-color: #ffffff;
  color: white;
  padding: 15px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.navbar .logo {
  font-size: 1.2em;
  font-weight: bold;
}

.navbar .user-profile {
  cursor: pointer;
  font-weight: bold;
}
/* Main Content */

.menu {
  background-color: #f5f5f5;
  border-top: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  position: sticky;
  top: 0;
  z-index: 888;
}

.menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;

}

.menu li {
  position: relative;
}

.menu a {
  display: block;
  padding: 15px 20px;
  text-decoration: none;
  color: #333;
  font-size: 17px;
  cursor: pointer;
}

.menu li:hover {
  background-color: #e6eaff;
}

.menu .dropdown-content {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  min-width: 180px;
  background-color: #fff;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  border-radius: 0 0 6px 6px;
  overflow: hidden;

}

.menu .dropdown:hover .dropdown-content {
  display: block;
}

.menu .dropdown>a::after {
  content: " ▼";
  font-size: 10px;
  margin-left: 5px;
}

.menu .dropdown-content li a {
  padding: 12px 16px;
  color: #333;
  background-color: #fff;
  white-space: nowrap;
}

.menu .dropdown-content li a:hover {
  background-color: #f0f0f0;
}

/* Hamburger menu */
.hamburger {
  display: none;
  flex-direction: column;
  cursor: pointer;
  width: 30px;
  height: 30px;
  justify-content: center;
  align-items: center;
  margin-left: 10px;
  z-index: 1100;
}

.hamburger span {
  height: 4px;
  width: 100%;
  background: #5f94ff;
  margin: 4px 0;
  border-radius: 2px;
  transition: 0.4s;
}

/* --- RESPONSIVE --- */
@media (max-width: 900px) {

  .menu {
    position: relative;
  }

  .menu ul {
    flex-direction: column;
    width: 100%;
    display: none;
    background: #f5f5f5;
    position: absolute;
    top: 100%;
    left: 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
    z-index: 1000;
  }

  .menu ul.active {
    display: flex;
  }

  .menu li {
    width: 100%;
  }

  .menu a {
    padding: 15px;
    border-bottom: 1px solid #eee;
    
  }

  .menu .dropdown-content {
    position: static;
    box-shadow: none;
    min-width: 100%;
    border-radius: 0;
  }

  .menu .dropdown:hover .dropdown-content,
  .menu .dropdown:focus-within .dropdown-content {
    display: none;
  }

  .menu .dropdown.open .dropdown-content {
    display: block;
  }

  .hamburger {
    display: flex;
  }
}
/* Styling untuk banner "Tentang Kami" */
        .about-us-banner {
            width: 100%; /* Pastikan banner mengambil lebar penuh */
            height: 250px; /* Menggunakan tinggi yang Anda berikan */
            background-color: #5f94ff; /* Menggunakan warna yang Anda berikan */
            color: #ffffff; /* Warna teks putih */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            /* border-radius: 8px; <--- BARIS INI DIHAPUS UNTUK EFEK FULL-WIDTH */
            margin-bottom: 20px; /* Jarak bawah dari konten berikutnya */
            padding: 0 20px; /* Padding di kiri dan kanan agar teks tidak menempel ke tepi */
            opacity: 0.9; /* Menggunakan opacity yang Anda berikan */
            /* Jika Anda ingin background image, tambahkan seperti ini: */
            /* background-image: url('https://placehold.co/1200x400/3f51b5/ffffff?text=Background+Image'); */
            /* background-size: cover; */
            /* background-position: center; */
            /* background-blend-mode: multiply; */
        }



.about-us-banner h1 {
  font-size: 3em;
  /* Sesuaikan ukuran font sesuai kebutuhan */
  margin-bottom: 10px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
  /* Bayangan teks opsional */
}

.about-us-banner p {
  font-size: 1.2em;
  /* Sesuaikan ukuran font sesuai kebutuhan */
  max-width: 80%;
  /* Batasi lebar untuk keterbacaan yang lebih baik */
  line-height: 1.5;
}
.button-group {
  margin-top: 30px;
}

.submit-button {
  background-color: #4d94ff;
  color: white;
  padding: 10px 20px;
  border-radius: 10px;
  text-decoration: none;
  font-weight: bold;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  transition: background-color 0.3s ease;
  margin-right: 10px;
}

.submit-button:hover {
  background-color: #357ae8;
}


/* --- HERO & FOOTER --- */
.hero {
  position: relative;
  background-image: url('imgg/akuountur.jpg');
  background-size: cover;
  background-position: center;
  height: 150px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  text-align: center;
}
.hero::before {
  content: '';
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  background-color: rgba(0, 74, 173, 0.6);
  z-index: 1;
}
.hero h1 {
  position: relative;
  z-index: 2;
  font-size: 36px;
  font-weight: bold;
}

  footer {
    background-color: #4a69bd; /* Warna biru seperti di foto */
    color: white;
    padding: 30px 20px;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.footer-column {
    flex: 1;
    min-width: 200px;
    margin-bottom: 20px;
}

.footer-column h4 {
    font-size: 1.2em;
    margin-bottom: 10px;
    border-bottom: 2px solid white;
    padding-bottom: 5px;
}

.footer-column p,
.footer-column li {
    font-size: 0.9em;
    line-height: 1.6;
}

.footer-column ul {
    list-style: none;
    padding: 0;
}

.footer-column ul li {
    margin-bottom: 8px;
}

.footer-column i {
    margin-right: 8px;
}

.footer-column.kontak p {
    margin-bottom: 8px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }

    .footer-column {
        width: 80%;
        text-align: center;
    }

    .footer-column.kontak {
        text-align: left;
    }
}
  .copyright {
    text-align: center;
    background-color: #6D8EFF;
    color: white;
    padding: 10px;
  }
 .card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
  }
  
  .card h3 {
    margin: 10px 0 5px;
  }
  
  .card p {
    color: #666;
    font-size: 14px;
  }
  
  .btn {
    margin-top: 10px;
    display: inline-block;
    padding: 8px 12px;
    background: #3366cc;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 13px;
  }
  card {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    max-width: 700px;
    width: 80%;
    padding: 90px 50px;
    text-align: center;
  }
  
  .card-content {
    display: flex;
    gap: 24px;
    align-items: flex-start;
  }
  
  .image-section img {
    width: 140px;
    height: 180px;
    border-radius: 10px;
    object-fit: cover;
  }
  
  .info-section {
    flex: 1;
  }
  
  .info-section h2 {
    color: #1f3bb3;
    margin: 0;
    font-size: 20px;
  }
  
  .info-section hr {
    border: none;
    border-bottom: 3px solid #1f3bb3;
    width: 180px;
    margin: 6px 0 14px 0;
  }
  
  .info-section p {
    margin: 4px 0;
    line-height: 1.5;
    font-size: 14px;
  }
  
  .profil-dokter {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 30px;
  padding: 40px 0;
  background: #fff;
  min-height: 60vh;
}

.card {
  background: none;
  border: none;
  box-shadow: none;
  border-radius: 0;
  padding: 40px 40px 32px 40px;
  text-align: center;
  margin: 0 auto;
  transition: none;
  max-width: 700px;
  width: 90%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.card img {
  display: block;
  margin: 0 auto 18px auto;
  width: 180px;
  height: 240px;
  object-fit: cover;
  border-radius: 12px;
}

.card h3, .card h2 {
  margin: 10px 0 5px 0;
  text-align: center;
}

.card p {
  color: #666;
  font-size: 15px;
  margin: 6px 0;
  text-align: center;
}

.btn {
  margin-top: 14px;
  display: inline-block;
  padding: 8px 18px;
  background: #3366cc;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-size: 14px;
}
.btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #3490dc; /* Biru */
        color: white;
        text-decoration: none;
        border-radius: 7px;
        font-weight: 600;
        transition: background-color 0.2s ease;
        }

      .btn:hover {
      background-color: #064a7e;
      }

      .btn-secondary {
      background-color: #3490dc; /* Abu-abu */
      }

      .btn-secondary:hover {
      background-color: #064a7e;
      }
      .logout-button {
    background-color: #3490dc;
    font-style: italic;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .logout-button:hover {
    background-color: #174166;
  }

  .welcome-text {
    font-weight: bold;
    margin-right: 10px;
    font-style: oblique;
  }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
  <!-- Header -->
  <div class="top-bar">
    <div class="marquee">
      📍 Jl. alamat Brigjen Slamet Riyadi 14 Malang, Jawa Timur, Indonesia 65112
    </div>
  </div>

<!-- Navbar -->
  <div class="navbar">
<div class="logo" style="display: flex; align-items: center; gap: 10px;">
  <img src="{{ asset('img/sehat_harmoni.jpeg') }}" style="height: 40px;">
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

<div class="about-us-banner"
     style="
        width: 100%;
        min-height: 220px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-image: linear-gradient(to bottom, rgba(0,0,0,0.15) 60%, rgba(255,255,255,0.85) 100%), url('{{ asset('set/img/2705523986e1892362b489f56fc4ec94.jpg') }}');
        background-size: cover;
        background-position: center;
        background-blend-mode: multiply;
        background-color: #5f94ff;
        color: white;
        margin-bottom: 24px;
        padding: 2.5em 1em 1.5em 1em;
        box-shadow: 0 2px 16px #0001;
     ">
    <h1 style="font-size:2.2em;font-weight:700;margin-bottom:0.3em;">Profil Dokter</h1>
    <p style="font-size:1.2em;">Profil Dokter Kami</p>
</div>
  <!-- Konten Profil Dokter dalam Box -->
 <div class="card">
  <div class="card-content" style="flex-direction: column; align-items: center;">
    <div class="image-section" style="margin-bottom: 1.5em;">
      <a href="{{ asset('storage/'.$dokter->foto_detail) }}" target="_blank" style="display:inline-block;">
        <img src="{{ asset('storage/'.$dokter->foto_detail) }}" alt="Foto Dokter" style="cursor:zoom-in;transition:box-shadow 0.2s;" onmouseover="this.style.boxShadow='0 0 0 4px #2563eb44'" onmouseout="this.style.boxShadow='none'"/>
      </a>
    </div>
    <div class="info-section" style="width:100%;max-width:400px;">
      <div style="border-left: 6px solid #2563eb; padding-left: 1em; background: #f3f7ff; border-radius: 0 8px 8px 0;">
        <h2 style="font-size:1.5em;font-weight:700;color:#2563eb;margin-bottom:0.2em;">{{ $dokter->nama }}</h2>
        <hr style="border:none;border-top:2.5px solid #2563eb;width:60px;margin:0.5em 0 1em 0;">
        <p style="font-size:1.08em;color:#444;margin-bottom:0.7em;line-height:1.6;">{{ $dokter->keterangan_detail ?? $dokter->keterangan }}</p>
      </div>
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
  </footer>
</body>
</html>
