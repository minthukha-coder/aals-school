import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    //    server: {
    //     host: '127.0.0.1',
    //     port: 5173,
    //     cors: true,  
    //     hmr: {
    //         host: '127.0.0.1',
    //     },
    // },

       server: {
        host: '192.168.1.13',
        port: 5173,
        cors: true,
        hmr: {
            host: '192.168.1.13',
        },
    },

});
