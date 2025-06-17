<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="set/css/opocs.css" />
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
    <h1>Tentang Kami</h1>
    <p>Profil Klinik Sehat Harmoni Indonesia</p>
</div>

      <div class="page-content-wrapper">
        <div class="swiper-container">
    <div class="swiper-wrapper align-items-center">
        @php
            $profil_klinik = App\Models\Profil_Klinik::first();
        @endphp
        @foreach ($profil_klinik->gambarKlinik as $gambar)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="Gambar Klinik">
            </div>
        @endforeach
    </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Inisialisasi Swiper
        window.onload = function() {
            new Swiper('.swiper-container', {
                // Konfigurasi untuk menampilkan satu slide pada satu waktu
                slidesPerView: 1,
                spaceBetween: 0, // Tidak ada jarak antar slide
                direction: 'horizontal', // Arah geser horizontal
                loop: true, // Pengulangan tak terbatas
                autoplay: {
                    delay: 3000, // Geser otomatis setiap 3 detik
                    disableOnInteraction: false, // Lanjutkan autoplay setelah interaksi pengguna
                },

                // Konfigurasi tombol navigasi (prev/next)
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // Konfigurasi pagination (titik-titik di bawah)
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true, // Membuat titik pagination bisa diklik
                },

                // Efek transisi (opsional, bisa diubah)
                effect: 'slide', // Efek geser standar
            });
        };
    </script>
    @if ($profil_klinik)

    <div class="content-section">
           <p style="margin-left: 20px; margin-right: 20px">{{ $profil_klinik->deskripsi }}</p>
       </div>
@endif
    <div class="contact-info">
        <p>Sekretariat Sehat Harmoni Indonesia berada di Jl. Brigjen Slamet Riadi 14 Malang, Jawa Timur, Indonesia 65112.</p>
        <p>Telp (0341) 367093Â Â Fax. (0341) 345854</p>
        <p>E-mail : <a href="mailto:harmony_fengshui@yahoo.com">harmony_fengshui@yahoo.com</a></p>
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
    <!-- Tombol Chat -->
<!-- Chat Toggle Button (Pasien) -->
<button id="chatToggleButton" onclick="toggleChat()" class="chat-button"
  style="position:fixed;bottom:25px;right:25px;background:#2563eb;color:#fff;border:none;padding:10px 16px;border-radius:40px;box-shadow:0 4px 10px rgba(0,0,0,0.2);font-size:15px;cursor:pointer;z-index:999;transition:background 0.3s;width:54px;height:54px;display:flex;align-items:center;justify-content:center;">
  💬
</button>

<!-- Chat Box -->
<div id="chatBox" style="display:none;position:fixed;bottom:90px;right:30px;z-index:1000;width:320px;max-width:95vw;background:#fff;border-radius:16px;box-shadow:0 4px 24px #0003;overflow:hidden;flex-direction:column;">
  <!-- Header -->
  <div style="background:#2563eb;color:#fff;padding:1em 1.2em;font-weight:600;display:flex;justify-content:space-between;align-items:center;">
    <span>Chat Admin</span>
    <button onclick="toggleChat()" style="background:none;border:none;color:#fff;font-size:1.3em;cursor:pointer;">&times;</button>
  </div>
  <!-- Messages -->
  <div id="chat-messages" style="height:220px;overflow-y:auto;padding:1em;background:#f8fafc;display:flex;flex-direction:column;gap:10px;font-size:14px;">
    <!-- Contoh pesan -->
    <!-- <div style="align-self:flex-start;background:#e5e7eb;padding:8px 12px;border-radius:12px 12px 12px 0;max-width:80%;">Halo, ada yang bisa kami bantu?</div>
    <div style="align-self:flex-end;background:#2563eb;color:#fff;padding:8px 12px;border-radius:12px 12px 0 12px;max-width:80%;">Ya, saya ingin tanya...</div> -->
  </div>
  <!-- Form Input -->
  <form id="chat-form" style="display:flex;gap:8px;padding:0.7em 1em 1em 1em;background:#000;">
    <input type="text" id="chat-input" class="form-control" placeholder="Ketik pesan..." autocomplete="off"
           style="flex:1;border:1px solid #555;border-radius:8px;padding:8px;background:#222;color:#fff;">
    <button type="submit" class="btn btn-primary"
            style="background:#2563eb;border:none;border-radius:8px;padding:8px 14px;color:white;">
      Kirim
    </button>
  </form>
</div>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.3/echo.iife.js"></script>
@php
    // Ambil semua pasien (selain admin id 1)
    $admin = \App\Models\User::find(1);
    $pasiens = \App\Models\User::where('id', '!=', 1)->get();
@endphp
<script>
@auth
let isAdmin = {{ auth()->id() == 1 ? 'true' : 'false' }};
let selectedUserId = null;
let selectedUserName = '';

function renderPasienDropdown() {
    if (!isAdmin) return;
    let dropdown = `<select id="pasien-dropdown" style="width:100%;margin-bottom:10px;padding:6px 10px;border-radius:8px;border:1px solid #ccc;">`;
    dropdown += `<option value="">Pilih Pasien</option>`;
    @foreach($pasiens as $pasien)
        dropdown += `<option value="{{ $pasien->id }}">{{ addslashes($pasien->name) }} ({{ $pasien->email }})</option>`;
    @endforeach
    dropdown += `</select>`;
    document.getElementById('chat-messages').insertAdjacentHTML('beforebegin', dropdown);
    document.getElementById('pasien-dropdown').onchange = function() {
        selectedUserId = this.value;
        selectedUserName = this.options[this.selectedIndex].text;
        document.getElementById('chat-input').disabled = !selectedUserId;
        document.querySelector('#chat-form button[type="submit"]').disabled = !selectedUserId;
        loadChat();
    };
}

function setPasienMode() {
    selectedUserId = 1;
    selectedUserName = "Admin Klinik";
    document.getElementById('chat-input').disabled = false;
    document.querySelector('#chat-form button[type="submit"]').disabled = false;
}

function loadChat() {
    if (!selectedUserId) {
        if (isAdmin) {
            document.getElementById('chat-messages').innerHTML = '<div style="color:#888;text-align:center;">Pilih pasien untuk mulai chat</div>';
        }
        document.getElementById('chat-input').disabled = true;
        document.querySelector('#chat-form button[type="submit"]').disabled = true;
        return;
    }
    fetch(`/chat/messages/${selectedUserId}`)
        .then(res => {
            if (!res.ok) throw new Error('Gagal load pesan');
            return res.json();
        })
        .then(messages => {
            const box = document.getElementById('chat-messages');
            box.innerHTML = '';
            messages.forEach(msg => {
                let isMe = msg.sender_id == {{ auth()->id() }};
                box.innerHTML += `<div style="margin-bottom:8px;text-align:${isMe?'right':'left'};">
                    <span style="display:inline-block;background:${isMe?'#2563eb':'#e5e7eb'};color:${isMe?'#fff':'#222'};padding:7px 14px;border-radius:12px;max-width:80%;font-size:1em;">
                        ${msg.message}
                    </span>
                    <div style="font-size:0.8em;color:#888;margin-top:2px;">${isMe?'Saya':selectedUserName} - ${msg.created_at}</div>
                </div>`;
            });
            box.scrollTop = box.scrollHeight;
            document.getElementById('chat-input').disabled = !selectedUserId;
            document.querySelector('#chat-form button[type="submit"]').disabled = !selectedUserId;
        })
        .catch(() => {
            document.getElementById('chat-messages').innerHTML = '<div style="color:#c00;text-align:center;">Gagal memuat pesan. Hubungi admin.</div>';
        });
}
document.getElementById('chat-form').onsubmit = function(e) {
    e.preventDefault();
    if (!selectedUserId) return alert(isAdmin ? 'Pilih pasien terlebih dahulu' : 'Tidak ada lawan chat.');
    const input = document.getElementById('chat-input');
    if (!input.value.trim()) return;
    fetch('/chat/messages', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({receiver_id: selectedUserId, message: input.value})
    })
    .then(res => {
        if (!res.ok) throw new Error('Gagal mengirim pesan');
        return res.json();
    })
    .then(msg => {
        loadChat();
        input.value = '';
    })
    .catch(() => {
        alert('Gagal mengirim pesan. Hubungi admin.');
    });
};
function toggleChat() {
    const chatBox = document.getElementById("chatBox");
    chatBox.style.display = (chatBox.style.display === "none" || chatBox.style.display === "") ? "flex" : "none";
    if (chatBox.style.display === "flex") {
        if (isAdmin) {
            if (!document.getElementById('pasien-dropdown')) renderPasienDropdown();
            document.getElementById('chat-input').disabled = !selectedUserId;
            document.querySelector('#chat-form button[type="submit"]').disabled = !selectedUserId;
        } else {
            setPasienMode();
            loadChat();
        }
    }
}
// Pusher/Echo listen
window.Echo = new window.Echo({
    broadcaster: 'pusher',
    key: '{{ config('broadcasting.connections.pusher.key') }}',
    cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
    forceTLS: true,
    encrypted: true,
    authEndpoint: '/broadcasting/auth'
});
window.Echo.private('chat.{{ auth()->id() }}')
    .listen('MessageSent', (e) => {
        // Hanya reload jika pesan dari/ke lawan chat yang sedang aktif
        if (selectedUserId == e.message.sender_id || selectedUserId == e.message.receiver_id) {
            loadChat();
        }
    });
@endauth
</script>

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

@php
    // Ganti pencarian admin/pasien agar tidak error jika kolom is_admin tidak ada
    // Misal: admin id 1, pasien id selain 1
    $admin = \App\Models\User::find(1);
    $pasien = \App\Models\User::where('id', '!=', 1)->first();
@endphp


