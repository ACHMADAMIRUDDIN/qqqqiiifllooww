<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 5000px;
        }

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
        }

        .navbar-center a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }

        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            width: 220px;
            height: 100%;
            background-color: #5f94ff;
            padding: 20px;
            transition: width 0.3s;
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

        .sidebar a {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            text-decoration: none;
            color: rgb(255, 255, 255);
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
            background-color: #ffffff33;
            /* sedikit transparan putih */
            color: #fff;
            border-radius: 5px;
            transition: all 0.2s;
        }

        .sidebar a:hover i {
            transform: scale(1.1);
            color: #fff;
        }

        .sidebar a:hover span {
            color: #fff;
        }

        .sidebar.minimized a span {
            display: none;
        }

        .main {
            margin-top: 60px;
            margin-left: 220px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .sidebar.minimized+.main {
            margin-left: 60px;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        textarea,
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        img {
            max-width: 300px;
            margin-bottom: 10px;
            display: block;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            background-color: #2e8b57;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #256f47;
        }

        .btn-danger {
            background-color: #d9534f;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .text-danger {
            color: red;
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
    <a href="{{ route('admin.dashboard') }}" class="sidebar-link" data-title="Dashboard" style="text-decoration: none; color: white;">
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
        <i class="bi bi-person-badge-fill"></i> <span>Profil Dokter</span>
    </a>
    <a href="{{ route('admin.jadwal.index') }}" class="sidebar-link" data-title="Jadwal Dokter">
        <i class="bi bi-calendar-event-fill"></i> <span>Jadwal Dokter</span>
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
