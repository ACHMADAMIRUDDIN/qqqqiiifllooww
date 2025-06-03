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
            max-width: 450px;
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

        .text-note {
            font-size: 14px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .status-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            padding: 10px 15px;
            background-color: #007acc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #005999;
        }

        .btn-logout {
            background: none;
            border: none;
            color: #007acc;
            font-size: 14px;
            text-decoration: underline;
            cursor: pointer;
        }

        .btn-logout:hover {
            color: #005999;
        }
    </style>
</head>

<body>

    <!-- Logo -->
    <div class="logo-container">
        <img src="{{ asset('img/sehat_harmoni.jpeg') }}" alt="Logo Sehat Harmoni">
    </div>

    <div class="form-container">
        <div class="form-title">Email Verification</div>

        <div class="text-note">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="status-message">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="button-group">
            <!-- Resend Link -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button class="btn" type="submit">{{ __('Resend Verification Email') }}</button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-logout" type="submit">{{ __('Log Out') }}</button>
            </form>
        </div>
    </div>

</body>
</html>
