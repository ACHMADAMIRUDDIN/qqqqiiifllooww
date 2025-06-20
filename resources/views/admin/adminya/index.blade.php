@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
@section('content')
<div class="dashboard-stats" style="display:flex;flex-wrap:wrap;gap:24px;margin-bottom:32px;justify-content:center;">

    <!-- Total User Terdaftar -->
    <a href="{{ route('admin.user.user') }}" style="text-decoration: none; color: inherit; position:relative;">
        <div class="stat-card" style="background:#fff;border-radius:16px;box-shadow:0 2px 12px #0001;padding:32px 24px 24px;min-width:220px;flex:1 1 220px;max-width:320px;text-align:center;display:flex;flex-direction:column;align-items:center;cursor:pointer;position:relative;">
            <i class="bi bi-people-fill" style="font-size:2.4em;color:#2563eb;margin-bottom:0.3em;"></i>
            <div class="stat-number" style="font-size:2.8em;font-weight:700;color:#2563eb;margin-bottom:0.2em;letter-spacing:1px;">
                {{ $totalUsers ?? 0 }}
            </div>
            <div class="stat-label" style="font-size:1.1em;color:#2563eb;font-weight:500;margin-top:0.2em;">
                Total User Terdaftar
            </div>
            {{-- Notifikasi tanda seru --}}
            @if(session('notif_user') || (isset($notifUser) && $notifUser))
            <span id="notif-user-dot" onclick="hideNotif('notif-user-dot')" style="position:absolute;top:12px;right:18px;background:#ff3b3b;color:#fff;border-radius:50%;width:26px;height:26px;display:flex;align-items:center;justify-content:center;font-weight:bold;font-size:1.2em;box-shadow:0 2px 8px #0002;cursor:pointer;z-index:2;">
                !
            </span>
            @endif
        </div>
    </a>

    <!-- Total Pasien -->
    <div class="stat-card" style="background:#fff;border-radius:16px;box-shadow:0 2px 12px #0001;padding:32px 24px 24px;min-width:220px;flex:1 1 220px;max-width:320px;text-align:center;display:flex;flex-direction:column;align-items:center;">
        <i class="bi bi-hospital-fill" style="font-size:2.4em;color:#2563eb;margin-bottom:0.3em;"></i>
        <div class="stat-number" style="font-size:2.8em;font-weight:700;color:#2563eb;margin-bottom:0.2em;letter-spacing:1px;">
            {{ $totalPasiens ?? 0 }}
        </div>
        <div class="stat-label" style="font-size:1.1em;color:#2563eb;font-weight:500;margin-top:0.2em;">
            Total Pasien
        </div>
    </div>

    <!-- Total Pemesanan -->
    <a href="{{ route('admin.datapemesan.pemesan') }}" style="text-decoration: none; color: inherit;">
        <div class="stat-card" style="background:#fff;border-radius:16px;box-shadow:0 2px 12px #0001;padding:32px 24px 24px;min-width:220px;flex:1 1 220px;max-width:320px;text-align:center;display:flex;flex-direction:column;align-items:center;cursor:pointer;">
            <i class="bi bi-journal-check" style="font-size:2.4em;color:#2563eb;margin-bottom:0.3em;"></i>
            <div class="stat-number" style="font-size:2.8em;font-weight:700;color:#2563eb;margin-bottom:0.2em;letter-spacing:1px;">
                {{ $totalPemesanan ?? 0 }}
            </div>
            <div class="stat-label" style="font-size:1.1em;color:#2563eb;font-weight:500;margin-top:0.2em;">
                Total Pemesanan
            </div>
        </div>
    </a>

</div>


<div class="fade-in">
    <h1>Dashboard Admin</h1>
    <!-- Konten lainnya -->
</div>





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
@endsection
