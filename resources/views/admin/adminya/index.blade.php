@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@section('content')
<div class="dashboard-stats" style="display:flex;flex-wrap:wrap;gap:24px;margin-bottom:32px;justify-content:center;">
    <div class="stat-card" style="background:#fff;border-radius:16px;box-shadow:0 2px 12px #0001;padding:32px 24px 24px 24px;min-width:220px;flex:1 1 220px;max-width:320px;text-align:center;display:flex;flex-direction:column;align-items:center;">
         <i class="bi bi-people-fill" style="font-size:2.4em;color:#2563eb;margin-bottom:0.3em;"></i>
        <div class="stat-number" style="font-size:2.8em;font-weight:700;color:#2563eb;margin-bottom:0.2em;letter-spacing:1px;">{{ $totalUsers ?? 0 }}</div>
        <div class="stat-label" style="font-size:1.1em;color:#2563eb;font-weight:500;margin-top:0.2em;">Total User Terdaftar</div>
    </div>
    <div 
        class="stat-card" style="background:#fff;border-radius:16px;box-shadow:0 2px 12px #0001;padding:32px 24px 24px 24px;min-width:220px;flex:1 1 220px;max-width:320px;text-align:center;display:flex;flex-direction:column;align-items:center;">
         <i class="bi 	bi-person-check-fill" style="font-size:2.4em;color:#2563eb;margin-bottom:0.3em;"></i>
        <div class="stat-number" style="font-size:2.8em;font-weight:700;color:#2563eb;margin-bottom:0.2em;letter-spacing:1px;">{{ $totalUsersLoggedIn ?? 0 }}</div>
        <div class="stat-label" style="font-size:1.1em;color:#2563eb;font-weight:500;margin-top:0.2em;">User Pernah Login</div>
    </div>
    <div class="stat-card" style="background:#fff;border-radius:16px;box-shadow:0 2px 12px #0001;padding:32px 24px 24px 24px;min-width:220px;flex:1 1 220px;max-width:320px;text-align:center;display:flex;flex-direction:column;align-items:center;">
         <i class="bi 	bi-hospital-fill" style="font-size:2.4em;color:#2563eb;margin-bottom:0.3em;"></i>
        <div class="stat-number" style="font-size:2.8em;font-weight:700;color:#2563eb;margin-bottom:0.2em;letter-spacing:1px;">{{ $totalPasiens ?? 0 }}</div>
        <div class="stat-label" style="font-size:1.1em;color:#2563eb;font-weight:500;margin-top:0.2em;">Total Pasien</div>
    </div>
    <div class="stat-card" style="background:#fff;border-radius:16px;box-shadow:0 2px 12px #0001;padding:32px 24px 24px 24px;min-width:220px;flex:1 1 220px;max-width:320px;text-align:center;display:flex;flex-direction:column;align-items:center;">
         <i class="bi 	bi-journal-check" style="font-size:2.4em;color:#2563eb;margin-bottom:0.3em;"></i>
        <div class="stat-number" style="font-size:2.8em;font-weight:700;color:#2563eb;margin-bottom:0.2em;letter-spacing:1px;">{{ $totalPemesanan ?? 0 }}</div>
        <div class="stat-label" style="font-size:1.1em;color:#2563eb;font-weight:500;margin-top:0.2em;">Total Pemesanan</div>
    </div>
</div>
<div class="fade-in">
    <h1>Dashboard Admin</h1>
    <!-- Konten lainnya -->
</div>

@endsection
<style>
    .fade-in {
        opacity: 0;
        animation: fadeIn 0.6s ease-in-out forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    .sidebar a.active {
        background-color: rgba(255, 255, 255, 0.3);
        font-weight: bold;
        border-left: 4px solid #fff;
        padding-left: 16px;
    }
</style>
<a href="{{ route('admin.dashboard') }}"
   class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
   style="text-decoration: none; color: white;">
    <h2><i class="bi bi-person-fill"></i> ADMIN</h2>
</a>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.sidebar-link');
        links.forEach(link => {
            link.addEventListener('click', function () {
                document.body.classList.add('fade-out');
            });
        });
    });
</script>

<style>
    body.fade-out {
        opacity: 0;
        transition: opacity 0.4s ease;
    }
</style>
