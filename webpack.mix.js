const mix = require('laravel-mix');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copyDirectory('node_modules/material-design-icons-iconfont/dist/fonts', 'public/fonts');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            ziggy: path.resolve('vendor/tightenco/ziggy/src/js/route.js'),
            '@': path.resolve('resources/js')
        },
    },
});

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/backend_app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
