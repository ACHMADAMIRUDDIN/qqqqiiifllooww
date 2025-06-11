@extends('admin.dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />
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

{{-- ====== CHAT ADMIN KE USER ====== --}}
<div id="admin-chat-box" style="position:fixed;bottom:30px;right:30px;z-index:1000;width:370px;max-width:95vw;background:#fff;border-radius:16px;box-shadow:0 4px 24px #0003;overflow:hidden;flex-direction:column;display:none;">
    <div style="background:#2563eb;color:#fff;padding:1em 1.2em;font-weight:600;display:flex;justify-content:space-between;align-items:center;">
        <span>Chat User</span>
        <button onclick="toggleAdminChat()" style="background:none;border:none;color:#fff;font-size:1.3em;cursor:pointer;">&times;</button>
    </div>
    <div style="padding:0.7em 1em 0.5em 1em;">
        <select id="admin-chat-user" class="form-select" style="margin-bottom:0.7em;">
            <option value="">Pilih User</option>
            @foreach(\App\Models\User::where('id', '!=', auth()->id())->get() as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>
    </div>
    <div id="admin-chat-messages" style="height:220px;overflow-y:auto;padding:1em;background:#f8fafc;"></div>
    <form id="admin-chat-form" style="display:flex;gap:8px;padding:0.7em 1em 1em 1em;background:#f8fafc;">
        <input type="text" id="admin-chat-input" class="form-control" placeholder="Ketik pesan..." autocomplete="off" style="flex:1;">
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>
<button onclick="toggleAdminChat()" style="position:fixed;bottom:25px;right:25px;background:#2563eb;color:#fff;border:none;padding:14px 18px;border-radius:50px;box-shadow:0 4px 10px rgba(0,0,0,0.3);font-size:16px;cursor:pointer;z-index:999;transition:background 0.3s;">💬 Chat User</button>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.3/echo.iife.js"></script>
<script>
let adminSelectedUserId = null;
let adminSelectedUserName = '';
function toggleAdminChat() {
    const box = document.getElementById("admin-chat-box");
    box.style.display = (box.style.display === "none" || box.style.display === "") ? "flex" : "none";
}
document.getElementById('admin-chat-user').onchange = function() {
    adminSelectedUserId = this.value;
    adminSelectedUserName = this.options[this.selectedIndex].text;
    loadAdminChat();
};
function loadAdminChat() {
    if (!adminSelectedUserId) {
        document.getElementById('admin-chat-messages').innerHTML = '<div style="color:#888;text-align:center;">Pilih user untuk mulai chat</div>';
        return;
    }
    fetch(`/chat/messages/${adminSelectedUserId}`)
        .then(res => res.json())
        .then(messages => {
            const box = document.getElementById('admin-chat-messages');
            box.innerHTML = '';
            messages.forEach(msg => {
                let isMe = msg.sender_id == {{ auth()->id() }};
                box.innerHTML += `<div style="margin-bottom:8px;text-align:${isMe?'right':'left'};">
                    <span style="display:inline-block;background:${isMe?'#2563eb':'#e5e7eb'};color:${isMe?'#fff':'#222'};padding:7px 14px;border-radius:12px;max-width:80%;font-size:1em;">
                        ${msg.message}
                    </span>
                    <div style="font-size:0.8em;color:#888;margin-top:2px;">${isMe?'Saya':adminSelectedUserName} - ${msg.created_at}</div>
                </div>`;
            });
            box.scrollTop = box.scrollHeight;
        });
}
document.getElementById('admin-chat-form').onsubmit = function(e) {
    e.preventDefault();
    if (!adminSelectedUserId) return alert('Pilih user terlebih dahulu');
    const input = document.getElementById('admin-chat-input');
    if (!input.value.trim()) return;
    fetch('/chat/messages', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({receiver_id: adminSelectedUserId, message: input.value})
    })
    .then(res => {
        if (!res.ok) throw new Error('Gagal mengirim pesan');
        return res.json();
    })
    .then(msg => {
        input.value = '';
        loadAdminChat();
        let notif = document.createElement('div');
        notif.innerText = 'Pesan terkirim!';
        notif.style = 'background:#2563eb;color:#fff;padding:6px 16px;border-radius:8px;position:absolute;bottom:80px;right:40px;z-index:2000;';
        document.body.appendChild(notif);
        setTimeout(() => notif.remove(), 1200);
    })
    .catch(err => {
        alert('Gagal mengirim pesan. Pastikan user sudah login dan channel sudah benar.');
    });
};
// Pusher/Echo listen
window.Echo = new window.Echo({
    broadcaster: 'pusher',
    key: '{{ config('broadcasting.connections.pusher.key') }}',
    cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
    encrypted: true,
    authEndpoint: '/broadcasting/auth',
});
window.Echo.private('chat.{{ auth()->id() }}')
    .listen('MessageSent', (e) => {
        // Hanya reload jika pesan dari/ke user yang sedang dipilih
        if (adminSelectedUserId == e.message.sender_id || adminSelectedUserId == e.message.receiver_id) {
            loadAdminChat();
        }
    });
</script>
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

@php
    // Ganti pencarian admin/pasien agar tidak error jika kolom is_admin tidak ada
    // Misal: admin id 1, pasien id selain 1
    $admin = \App\Models\User::find(1);
    $pasien = \App\Models\User::where('id', '!=', 1)->first();
@endphp



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
