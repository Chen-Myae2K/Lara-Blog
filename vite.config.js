import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/js/theme.js",
                "resources/sass/theme.scss",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
