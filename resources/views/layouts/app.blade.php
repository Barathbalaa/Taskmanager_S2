<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        <!-- Scripts -->
        <x-admin-nav-bar /><hr>
        </head>

        <script src="{{ asset('js/app.js') }}"></script>
<body class="font-sans antialiased">




<script src="{{ asset('js/app.js') }}"></script>
<div class="min-h-screen bg-gray-100">
    <ul class="navbar-nav ml-auto">
        <!-- ... existing menu items ... -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">
            </a>
        </li>
    </ul>

    <!-- Page Heading -->


    <!-- Page Content -->
    <main>
        <!-- <div id="app">
         
        </div>-->
    </main>
</div>
</body>
</html>
