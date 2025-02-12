<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Valentine's Day</title>

    <!-- Styles -->
    @if (app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    @else
        @vite(['resources/css/app.css'])
    @endif

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.plugin(Intersect);
        });

        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Alpine === 'undefined') console.error('Alpine.js not loaded');
            if (typeof Swiper === 'undefined') console.error('Swiper not loaded');
            if (typeof confetti === 'undefined') console.error('Confetti not loaded');
        });
    </script>

    @if (app()->environment('production'))
        <script defer src="{{ asset('build/assets/app.js') }}"></script>
    @else
        @vite(['resources/js/app.js'])
    @endif
</head>