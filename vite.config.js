import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/app.tsx'
            ],
            refresh: true,
        }),
        react(),
    ],
    server: {
        host: '0.0.0.0', // Faz o Vite aceitar de qualquer IP
        port: 5173,
        strictPort: true,
        cors: {
            origin: '*', // Permite qualquer origem
        },
        hmr: {
            host: '192.168.0.139', // o IP da sua máquina na rede
        },
    },
});
