<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Confirm Password</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />

    <!-- Tailwind CSS CDN for layout consistency -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #e6f2ff;
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center">

    <!-- Logo -->
    <div class="mb-4">
        <img src="{{ asset('img/sehat_harmoni.jpeg') }}" alt="Logo" class="w-28 h-auto">
    </div>

    <!-- Confirm Password Form -->
    <form method="POST" action="{{ route('password.confirm') }}" class="bg-white shadow-md rounded-lg px-8 pt-8 pb-10 w-full max-w-sm">
        @csrf

        <!-- Title -->
        <h2 class="text-center text-blue-700 text-lg font-semibold mb-2">Confirm Password</h2>
        <p class="text-center text-sm text-gray-600 mb-6">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </p>

        <!-- Password Field -->
        <div class="relative mb-4">
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 1a3 3 0 0 0-3 3v3h6V4a3 3 0 0 0-3-3zM5 4a3 3 0 1 1 6 0v3H5V4z"/>
                    <path d="M3.5 8A1.5 1.5 0 0 0 2 9.5v5A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 12.5 8h-9z"/>
                </svg>
            </span>
            <input id="password" type="password" name="password" required
                placeholder="Password" autocomplete="current-password"
                class="pl-10 w-full py-2 px-3 border border-blue-400 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-md transition">
            Confirm
        </button>
    </form>
</body>
</html>
