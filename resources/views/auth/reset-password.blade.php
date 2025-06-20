<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reset Password</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />

    <!-- Tailwind CSS CDN -->
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

    <!-- Reset Password Form -->
    <form method="POST" action="{{ route('password.store') }}" class="bg-white shadow-md rounded-lg px-8 pt-8 pb-10 w-full max-w-sm">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Title -->
        <h2 class="text-center text-blue-700 text-lg font-semibold mb-4">Reset Password</h2>

        <!-- Email -->
        <div class="mb-4">
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                placeholder="Email"
                class="w-full py-2 px-3 border border-blue-400 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            <x-input-error :messages="$errors->get('email')" class="text-sm text-red-500 mt-1" />
        </div>

        <!-- New Password -->
        <div class="mb-4">
            <input id="password" type="password" name="password" required
                placeholder="New Password"
                class="w-full py-2 px-3 border border-blue-400 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            <x-input-error :messages="$errors->get('password')" class="text-sm text-red-500 mt-1" />
        </div>

        <!-- Confirm New Password -->
        <div class="mb-6">
            <input id="password_confirmation" type="password" name="password_confirmation" required
                placeholder="Confirm Password"
                class="w-full py-2 px-3 border border-blue-400 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            <x-input-error :messages="$errors->get('password_confirmation')" class="text-sm text-red-500 mt-1" />
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-md transition">
            Reset Password
        </button>
    </form>

</body>
</html>
