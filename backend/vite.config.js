// vite.config.js
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { svelte } from "@sveltejs/vite-plugin-svelte";

export default defineConfig({
    plugins: [
        // 👇 Plugin Laravel habituel
        laravel({
            input: ["resources/js/app.js"], // ton point d'entrée Laravel
            refresh: true,
        }),

        // 👇 Plugin Svelte
        svelte({
            configFile: "frontend/svelte.config.js", // on indique le chemin du fichier de config
            compilerOptions: {
                dev: true,
            },
        }),
    ],

    // 👇 Permet d’accéder au dossier frontend
    resolve: {
        alias: {
            "@frontend": "/frontend/src",
        },
    },
});
