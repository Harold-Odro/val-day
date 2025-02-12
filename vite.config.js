import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            buildDirectory: 'build' // This ensures correct build directory path
        }),
    ],
    build: {
        outDir: 'public/build',
        manifest: true,
        rollupOptions: {
            output: {
                manualChunks: (id) => {
                    if (id.includes('node_modules')) {
                        // Split vendor files for better caching
                        if (id.includes('alpinejs')) return 'alpine';
                        if (id.includes('swiper')) return 'swiper';
                        if (id.includes('canvas-confetti')) return 'confetti';
                        return 'vendor';
                    }
                }
            }
        },
        chunkSizeWarningLimit: 1000 // Helps with Vercel's size limits
    },
    server: {
        https: false,
        host: true,
        strictPort: true,
        port: 3000,
    }
});
