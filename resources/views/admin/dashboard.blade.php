<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background-color: #f4f4f4;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: white;
      padding: 20px;
    }

    .sidebar h2 {
      font-size: 20px;
      margin-bottom: 20px;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 10px 0;
      text-decoration: none;
      font-size: 14px;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #2980b9;
      padding-left: 10px;
    }

    .sidebar .section-title {
      margin-top: 20px;
      font-weight: bold;
      font-size: 14px;
      margin-bottom: 5px;
    }

    /* Main */
    .main {
      flex-grow: 1;
      padding: 30px;
    }

    .dashboard-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .card {
      flex: 1 1 220px;
      padding: 20px;
      color: white;
      border-radius: 10px;
      position: relative;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    .card .icon {
      font-size: 30px;
      position: absolute;
      top: 20px;
      right: 20px;
      opacity: 0.4;
    }

    .card .value {
      font-size: 30px;
      font-weight: bold;
    }

    .card .label {
      margin-top: 10px;
      font-size: 16px;
    }

    .card .info {
      margin-top: 10px;
      font-size: 12px;
      text-decoration: underline;
      cursor: pointer;
    }

    .bg-blue { background-color: #1abc9c; }
    .bg-yellow { background-color: #f1c40f; }
    .bg-red { background-color: #e74c3c; }
    .bg-green { background-color: #27ae60; }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2><i class="bi bi-person-fill"></i> ADMIN</h2>
<a href="{{ route('admin.pasien.index') }}"
   onclick="return confirm('Yakin ingin masuk ke halaman Kelola Pasien?')">
   Kelola Pasien
</a>
 
<a href="{{ route('admin.pesan.index') }}" 
   onclick="return confirm('Yakin ingin masuk ke halaman pesanan layanan?')">
   pesanan layanan
</a>

<a href="{{ route('admin.profil.index') }}" 
   onclick="return confirm('Yakin ingin masuk ke halaman pesanan layanan?')">
   profil
</a>

    <a href="#">pengaduan</a>
    <a href="#">Data Pasien</a>
    <a href="#">Profil Klinik</a>
  </div>
<div class="main">
    @yield('content')
</div>
    
   
</body>
</html>
