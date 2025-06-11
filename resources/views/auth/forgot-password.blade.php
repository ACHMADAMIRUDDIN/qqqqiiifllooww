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
            margin-top: 140px;
        }

        .logo-container {
            text-align: justify;
            justify-items: center;
            margin-top: 4px;
        }

        .logo-container img {
            width: 150px;
            height: auto;
            justify-items: center;
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

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Forgot Password Form -->
    <form method="POST" action="{{ route('password.email') }}" class="form-container">
        @csrf
                <div class="logo-container">
        <img src="{{ asset('img/sehat_harmoni.jpeg') }}" alt="Logo" class="logo">
    </div>

        <div class="form-title">Reset Password</div>

        <div class="info-text">
            {{ __('Forgot your password? No problem. Just enter your email address and we will send you a reset link.') }}
        </div>

        <!-- Email Address -->
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v.217l-8 4.8-8-4.8V4z"/>
                <path d="M0 5.383l7.555 4.533a.5.5 0 0 0 .89 0L16 5.383V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.383z"/>
            </svg>
            <input id="email" type="email" name="email" :value="old('email')" required placeholder="Your Email" autofocus>
        </div>

        <button type="submit" class="btn-submit">Send Reset Link</button>
    </form>
</body>
</html>
