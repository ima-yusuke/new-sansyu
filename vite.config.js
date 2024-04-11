import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build:{
        manifest: true,
        rollupOptions: {
            input:{
                app: 'resources/js/app.js',
                appStyles: 'resources/css/app.css',
                index: 'resources/js/index.js',
                detail: 'resources/js/detail.js',
                show_detail:'resources/js/show-detail.js'
            }
        }
    }
});
