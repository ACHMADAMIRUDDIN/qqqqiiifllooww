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
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
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
    </style>
</head>

<body>


    <!-- Reset Password Form -->
    <form method="POST" action="{{ route('password.store') }}" class="form-container">
        @csrf
                <div class="logo-container">
        <img src="{{ asset('img/sehat_harmoni.jpeg') }}" alt="Logo" class="logo">
    </div>

        <div class="form-title">Reset Password</div>

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="input-group">
            <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus placeholder="Email" autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-group">
            <input id="password" type="password" name="password" required placeholder="New Password" autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="input-group">
            <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="btn-submit">Reset Password</button>
    </form>

</body>
</html>
