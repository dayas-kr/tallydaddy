<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <!-- SEO -->
    @stack('seo')

    <!-- CRITICAL: Prevents flash on page load - inline minimal script -->
    <script>
        (function() {
            const stored = localStorage.theme || 'system';
            document.documentElement.setAttribute('data-theme', stored);
            const cls = stored === 'system' ?
                (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light') :
                stored;
            document.documentElement.classList.remove('dark', 'light');
            document.documentElement.classList.add(cls);
        })();
    </script>

    <!-- Full theme manager -->
    @vite('resources/js/theme.js')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Head -->
    @stack('head')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Extra styles -->
    @stack('styles')
</head>

<body class="font-geist antialiased bg-(--background) text-neutral-900 dark:text-neutral-50">
    <div class="min-h-screen">
        <!-- Page Content -->
        <main>{{ $slot }}</main>
    </div>

    <!-- Extra scripts -->
    @stack('scripts')
</body>

</html>
