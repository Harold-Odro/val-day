import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',  // Ensure assets are stored correctly
        manifest: true, // Generates a manifest.json for Laravel to track built files
        rollupOptions: {
            output: {
                assetFileNames: "assets/[name]-[hash][extname]",
                entryFileNames: "assets/[name]-[hash].js",
                chunkFileNames: "assets/[name]-[hash].js",
            }
        }
    },
    server: {
        https: false, // Disable HTTPS for local dev (can cause issues)
        host: '127.0.0.1',
        port: 5173,
    }
});