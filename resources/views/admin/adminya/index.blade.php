@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
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
