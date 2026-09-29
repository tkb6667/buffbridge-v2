import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        origin: 'http://192.168.1.8:5173',
        hmr: {
            host: '192.168.1.8',
        },
        cors: {
            origin: ['http://127.0.0.1:8000', 'http://192.168.1.8:8000'],
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
