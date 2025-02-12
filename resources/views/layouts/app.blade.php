<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', "Valentine's Day")</title>

    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script defer src="https://unpkg.com/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>


       <!-- Debugging Scripts -->
       <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('✅ Alpine:', typeof Alpine !== 'undefined' ? 'Loaded' : 'Not Loaded');
            console.log('✅ Swiper:', typeof Swiper !== 'undefined' ? 'Loaded' : 'Not Loaded');
            console.log('✅ Confetti:', typeof confetti !== 'undefined' ? 'Loaded' : 'Not Loaded');
        });
    </script>

    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
