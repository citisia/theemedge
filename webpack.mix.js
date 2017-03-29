const {mix} = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .combine([
        'resources/assets/css/vendor/bootstrap.css',
        'resources/assets/css/vendor/font-awesome.css',
        'resources/assets/css/vendor/metisMenu.css',
        'resources/assets/css/vendor/sb-admin-2.css'
    ], 'public/css/all.css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .combine([
        'resources/assets/js/vendor/jquery.min.js',
        'resources/assets/js/vendor/bootstrap.js',
        'resources/assets/js/vendor/metisMenu.min.js',
        'resources/assets/js/vendor/sb-admin-2.js',
        'resources/assets/js/vendor/jquery.steps.min.js'
    ], 'public/js/all.js');
