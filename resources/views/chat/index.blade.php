@extends('layouts.app')
@section('content')
<div id="chat-app">
    <div class="chat-users">
        <h4>Daftar Kontak</h4>
        <ul>
            @foreach($users as $user)
                <li>
                    <a href="#" onclick="selectUser({{ $user->id }}, '{{ addslashes($user->name) }}'); return false;">
                        {{ $user->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="chat-window">
        <div id="chat-messages" style="height:300px;overflow-y:auto;background:#f8fafc;padding:1em;border-radius:8px;margin-bottom:1em;"></div>
        <form id="chat-form" style="display:flex;gap:8px;">
            <input type="text" id="chat-input" class="form-control" placeholder="Ketik pesan..." autocomplete="off">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.3/echo.iife.js"></script>
<script>
let selectedUserId = null;
let selectedUserName = '';
function selectUser(id, name) {
    selectedUserId = id;
    selectedUserName = name;
    fetch(`/chat/messages/${id}`)
        .then(res => res.json())
        .then(messages => {
            const box = document.getElementById('chat-messages');
            box.innerHTML = '';
            messages.forEach(msg => {
                let isMe = msg.sender_id == {{ auth()->id() }};
                box.innerHTML += `<div style="margin-bottom:8px;"><b>${isMe ? 'Saya' : selectedUserName}</b>: ${msg.message} <span style="font-size:0.8em;color:#888;">${msg.created_at}</span></div>`;
            });
            box.scrollTop = box.scrollHeight;
        });
}
document.getElementById('chat-form').onsubmit = function(e) {
    e.preventDefault();
    if (!selectedUserId) return alert('Pilih kontak terlebih dahulu');
    const input = document.getElementById('chat-input');
    if (!input.value.trim()) return;
    fetch('/chat/messages', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({receiver_id: selectedUserId, message: input.value})
    }).then(res => res.json()).then(msg => {
        selectUser(selectedUserId, selectedUserName);
        input.value = '';
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
        if (selectedUserId == e.message.sender_id || selectedUserId == e.message.receiver_id) {
            selectUser(selectedUserId, selectedUserName);
        }
    });
</script>
@endsection
