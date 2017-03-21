const { mix } = require('laravel-mix');
const WebpackRTLPlugin = require('webpack-rtl-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/frontend/app.scss', 'public/css/frontend.css')
    .sass('resources/assets/sass/backend/app.scss', 'public/css/backend.css')
    .styles([
        'resources/assets/plugin/select2/select2.css',
        'resources/assets/plugin/flag-icon-css/css/flag-icon.min.css',
        'resources/assets/plugin/toastr/build/toastr.min.css',
        'resources/assets/plugin/bootstrap-toggle/css/bootstrap-toggle.min.css'
    ], 'public/css/all.css')
    .js([
        'resources/assets/js/frontend/app.js',
        'resources/assets/js/plugin/sweetalert/sweetalert.min.js',
        'resources/assets/js/plugins.js'
    ], 'public/js/frontend.js')
    .js([
        'resources/assets/js/backend/app.js',
        'resources/assets/js/plugin/sweetalert/sweetalert.min.js',
        'resources/assets/js/plugins.js',
        'resources/assets/plugin/select2/select2.full.min.js',
        'resources/assets/plugin/toastr/build/toastr.min.js',
        'resources/assets/plugin/bootstrap-toggle/js/bootstrap-toggle.js',
        'resources/assets/plugin/bootstrap-confirmation/bootstrap-confirmation.min.js'
    ], 'public/js/backend.js')
    .webpackConfig({
        plugins: [
            new WebpackRTLPlugin('/css/[name].rtl.css')
        ]
    })
    .version();