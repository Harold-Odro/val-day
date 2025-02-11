<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Valentine's Day</title>
    
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    
    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    
    <!-- Ensure resources are loaded -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if all required libraries are loaded
            if (typeof Alpine === 'undefined') {
                console.error('Alpine.js not loaded');
            }
            if (typeof Swiper === 'undefined') {
                console.error('Swiper not loaded');
            }
            if (typeof confetti === 'undefined') {
                console.error('Confetti not loaded');
            }
        });
    </script>
    
    @vite(['resources/js/app.js'])
</head>
<body class="bg-white">
    <div id="app">
        @yield('content')
    </div>

    <!-- Initialize Alpine.js after DOM is loaded -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Wait for Alpine to be available
            if (typeof Alpine !== 'undefined') {
                Alpine.start();
            }
        });
    </script>
</body>
</html>
