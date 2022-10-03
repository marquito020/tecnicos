import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/css/inicio.css',
                'public/js/inicio.js',
                'resources/sass/_inicio.scss',
            ],
            refresh: true,
        }),
    ],
});
