<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Email Verification</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('/favicon/SHI.png') }}" type="image/png" />

    <style>
        body {
            background-color: #e6f2ff;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .logo-container {
            text-align: center;
            margin-top: 20px;
        }

        .logo-container img {
            width: 150px;
            height: auto;
        }

        .form-container {
            max-width: 450px;
            margin: 30px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
        }

        .form-title {
            text-align: center;
            font-size: 20px;
            margin-bottom: 15px;
            color: #0066cc;
            font-weight: 600;
        }

        .text-note {
            font-size: 14px;
            color: #333333;
            margin-bottom: 20px;
            text-align: center;
            line-height: 1.6;
        }

        .status-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn, .btn-logout {
            flex: 1;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn {
            background-color: #007acc;
            border: none;
            color: white;
        }

        .btn:hover {
            background-color: #005999;
        }

        .btn-logout {
            background-color: transparent;
            border: none;
            color: #007acc;
            text-decoration: underline;
        }

        .btn-logout:hover {
            color: #005999;
        }

        form {
            margin: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Logo -->
    <div class="logo-container">
        <img src="{{ asset('img/sehat_harmoni.jpeg') }}" alt="Logo">
    </div>

    <!-- Verification Message -->
    <div class="form-container">
        <div class="form-title">Email Verification</div>

        <div class="text-note">
            {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking the link we just emailed to you. If you didn\'t receive the email, we can send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="status-message">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="button-group">
            <!-- Resend Verification -->
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
