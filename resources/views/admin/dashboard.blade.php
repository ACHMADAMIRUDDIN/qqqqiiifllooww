<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
   /* ===== Reset & Body ===== */
body {
    margin: 0;
    font-family: 'Segoe UI', Arial, sans-serif;
    min-height: 100vh;
    background-color: #f4f6f8;
}

/* ===== Navbar ===== */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 60px;
    background-color: #5f94ff;
    display: flex;
    align-items: center;
    padding: 0 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

.toggle-menu {
    font-size: 20px;
    background: none;
    border: none;
    cursor: pointer;
    margin-right: 20px;
    color: white;
}

/* ===== Navbar Center Links ===== */
.navbar-center a {
    margin: 0 10px;
    text-decoration: none;
    color: #ffffff;
}

/* ===== Sidebar ===== */
.sidebar {
    position: fixed;
    top: 60px;
    left: 0;
    width: 220px;
    height: 100%;
    background-color: #5f94ff;
    padding: 20px;
    transition: width 0.3s ease;
    overflow: hidden;
}

.sidebar.minimized {
    width: 60px;
}

.sidebar h2 {
    font-size: 18px;
    margin-bottom: 20px;
    color: white;
}

.sidebar.minimized h2 {
    display: none;
}

/* Sidebar Links */
.sidebar a {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
    text-decoration: none;
    color: white;
    white-space: nowrap;
    padding: 10px;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.sidebar a i {
    margin-right: 10px;
    font-size: 18px;
    transition: transform 0.3s ease;
}

.sidebar a span {
    transition: color 0.3s ease;
}

.sidebar a:hover {
    background-color: rgba(255, 255, 255, 0.2);
    color: #fff;
}

.sidebar a:hover i,
.sidebar a:hover span {
    color: #fff;
    transform: scale(1.1);
}

.sidebar.minimized a span {
    display: none;
}

/* ===== Main Content ===== */
.main {
    margin-top: 80px;
    margin-left: 250px;
    padding: 32px;
    min-height: 100vh;
    background-color: #f4f6f8;
    color: #2c3e50;
    box-sizing: border-box;
    transition: margin-left 0.3s ease;
}

.sidebar.minimized + .main {
    margin-left: 60px;
}

        
    </style>
</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar">
        <button class="toggle-menu" onclick="toggleSidebar()">☰</button>
        <div class="navbar-center" id="navbar-title">
            <h3 style="margin: 0;">Dashboard</h3> <!-- default -->
        </div>
    </nav>

    <!-- ===== SIDEBAR ===== -->
    <div id="sidebar" class="sidebar">
    <a href="{{ route('admin.adminya.index') }}" class="sidebar-link" data-title="admin" style="text-decoration: none; color: white;">
        <h2><i class="bi bi-person-fill"></i> ADMIN</h2>
    </a>
    <a href="{{ route('admin.pasien.index') }}" class="sidebar-link" data-title="Kelola Data Pasien">
        <i class="bi bi-people-fill"></i> <span>Kelola Data Pasien</span>
    </a>
    <a href="{{ route('admin.promo.index') }}" class="sidebar-link" data-title="Promo">
        <i class="bi bi-tags-fill"></i> <span>Promo Layanan</span>
    </a>
    <a href="{{ route('admin.profil_klinik.index') }}" class="sidebar-link" data-title="Profil Klinik">
            <i class="bi bi-hospital-fill"></i> <span>Profil Klinik</span>
    </a>
    <a href="{{ route('admin.dokter.index') }}" class="sidebar-link" data-title="Profil Dokter">
        <i class="bi bi-person-badge-fill"></i> <span>Profil Terapis</span>
    </a>
    <a href="{{ route('admin.jadwal.index') }}" class="sidebar-link" data-title="Jadwal Dokter">
        <i class="bi bi-calendar-event-fill"></i> <span>Jadwal Terapis</span>
    </a>
    <a href="{{ route('admin.pengaduan.tampilan') }}" class="sidebar-link" data-title="Daftar Pengaduan Pengguna">
        <i class="bi bi-chat-left-dots-fill"></i> <span>Pengaduan</span>
    </a>
</div>


    <!-- ===== MAIN CONTENT ===== -->
    <div class="main">
        @yield('content')
    </div>

    <!-- ===== SCRIPT ===== -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('minimized');
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbarTitle = document.getElementById("navbar-title");

            // Tampilkan title terakhir jika ada di localStorage
            const savedTitle = localStorage.getItem("navbar-title");
            if (savedTitle) {
                navbarTitle.innerHTML = `<h3 style="margin: 0;">${savedTitle}</h3>`;
            }

            document.querySelectorAll(".sidebar-link").forEach(link => {
                link.addEventListener("click", function() {
                    const newTitle = this.getAttribute("data-title");
                    if (newTitle) {
                        localStorage.setItem("navbar-title", newTitle); // Simpan
                        navbarTitle.innerHTML = `<h3 style="margin: 0;">${newTitle}</h3>`;
                    }
                });
            });
        });

        // Fungsi toggle sidebar (opsional jika kamu sudah punya, lewati ini)
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("minimized");
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
