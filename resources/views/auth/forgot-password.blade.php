<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reset Password</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #e6f2ff;
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="bg-white shadow-md rounded-lg px-8 pt-8 pb-10 w-full max-w-sm">
        @csrf

        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('img/sehat_harmoni.jpeg') }}" alt="Logo" class="w-28 h-auto">
        </div>

        <!-- Title -->
        <h2 class="text-center text-blue-700 text-lg font-semibold mb-2">Reset Password</h2>
        <p class="text-center text-sm text-gray-600 mb-6">
            Forgot your password? No problem. Just enter your email address and we will send you a reset link.
        </p>

        <!-- Email Field -->
        <div class="relative mb-4">
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v.217l-8 4.8-8-4.8V4z"/>
                    <path d="M0 5.383l7.555 4.533a.5.5 0 0 0 .89 0L16 5.383V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.383z"/>
                </svg>
            </span>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                placeholder="Your Email"
                class="pl-10 w-full py-2 px-3 border border-blue-400 rounded-md focus:outline-none focus:ring focus:ring-blue-200" />
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-md transition">
            Send Reset Link
        </button>
    </form>
</body>
</html>
