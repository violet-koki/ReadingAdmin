import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import Components from 'unplugin-vue-components/vite'
import { BootstrapVueNextResolver } from 'bootstrap-vue-next'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
        Components({
            resolvers: [BootstrapVueNextResolver()],
        }),
    ],
    server: {
    host: true,
    },
    // resolve: {
    //     alias: {
    //         '@': fileURLToPath(new URL('./src', import.meta.url))
    //     }
    // },
});

