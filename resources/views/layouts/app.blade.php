@props(['role'])
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
        <script src="https://kit.fontawesome.com/cbd855a2c0.js" crossorigin="anonymous"></script>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('storage/apple-touch-icon.png')}}">
        <link rel="icon" type="image/x-icon" sizes="32x32" href="{{url('storage/favicon-32x32.png')}}">
        <link rel="icon" type="image/x-icon" sizes="16x16" href="{{url('storage/favicon-16x16.png')}}">
        <link rel="manifest" href="{{url('/site.webmanifest')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            @if(Route::is('welcome') == false)
            @include('layouts.navigation')
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            function togglePassword(passwordField, togglePasswordIcon) {

if (passwordField.type === "password") {
    passwordField.type = "text";
    // passwordField.style.fontSize = "20px";
    togglePasswordIcon.classList.remove("fa-eye");
    togglePasswordIcon.classList.add("fa-eye-slash");
} else {
    passwordField.type = "password";
    // passwordField.style.fontSize = "initial";
    togglePasswordIcon.classList.remove("fa-eye-slash");
    togglePasswordIcon.classList.add("fa-eye");
}
}

        </script>
    </body>
</html>
