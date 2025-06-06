<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #e6f2ff;
            font-family: 'Segoe UI', sans-serif;
        }

        .logo-container {
            text-align: center;
            margin-top: 40px;
        }

        .logo-container img {
            width: 150px;
            height: auto;
        }

        .form-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-title {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #0066cc;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group svg {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #007acc;
        }

        .input-group input {
            width: 100%;
            padding: 10px 10px 10px 35px;
            border: 1px solid #007acc;
            border-radius: 5px;
            outline: none;
        }

        .input-group input:focus {
            border-color: #005999;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #007acc;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #005999;
        }

        .info-text {
            font-size: 14px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Logo -->
    <div class="logo-container">
        <img src="{{ asset('img/sehat_harmoni.jpeg') }}" alt="Logo Sehat Harmoni">
    </div>

    <!-- Confirm Password Form -->
    <form method="POST" action="{{ route('password.confirm') }}" class="form-container">
        @csrf

        <div class="form-title">Confirm Password</div>

        <div class="info-text">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Password -->
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path d="M8 1a3 3 0 0 0-3 3v3h6V4a3 3 0 0 0-3-3zM5 4a3 3 0 1 1 6 0v3H5V4z"/>
                <path d="M3.5 8A1.5 1.5 0 0 0 2 9.5v5A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 12.5 8h-9z"/>
            </svg>
            <input id="password" type="password" name="password" required placeholder="Password" autocomplete="current-password">
        </div>

        <button type="submit" class="btn-submit">Confirm</button>
    </form>
</body>
</html>
