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
    </head>
    <style>
        body {
            background-color: #e6f2ff;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-title {
            text-align: center;
            font-size: 24px;
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

        .link {
            text-align: center;
            margin-top: 10px;
        }

        .link a {
            color: #007acc;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>

    <form method="POST" action="{{ route('register') }}" class="form-container">
        @csrf

        <div class="form-title">Register</div>

        <!-- Name -->
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M8 9a5 5 0 0 0-5 5v1h10v-1a5 5 0 0 0-5-5z"/>
            </svg>
            <input id="name" type="text" name="name" :value="old('name')" required placeholder="Full Name">
        </div>

        <!-- Email -->
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1l-8 5-8-5V4z"/>
                <path d="M0 6.5l8 5 8-5V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6.5z"/>
            </svg>
            <input id="email" type="email" name="email" :value="old('email')" required placeholder="Email Address">
        </div>

        <!-- Password -->
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path d="M8 1a3 3 0 0 0-3 3v3h6V4a3 3 0 0 0-3-3zM5 4a3 3 0 1 1 6 0v3H5V4z"/>
                <path d="M3.5 8A1.5 1.5 0 0 0 2 9.5v5A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 12.5 8h-9z"/>
            </svg>
            <input id="password" type="password" name="password" required placeholder="Password">
        </div>

        <!-- Confirm Password -->
        <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                <path d="M2 8a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8z"/>
                <path d="M8 1a3 3 0 0 1 3 3v3H5V4a3 3 0 0 1 3-3z"/>
            </svg>
            <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirm Password">
        </div>

        <button type="submit" class="btn-submit">Register</button>

        <div class="link">
            <a href="{{ route('login') }}">Already registered?</a>
        </div>
    </form>

</html>