import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/css/rt-plugins.css',
                'resources/assets/css/app.css',
                'resources/assets/js/jquery-3.6.0.min.js',
                'resources/assets/js/rt-plugins.js',
                'resources/assets/js/app.js',
                'resources/assets/js/settings.js'
            ],
            refresh: true,
        }),
    ],
});
