const { mix } = require('laravel-mix');

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

mix.styles([
            'resources/assets/css/bootstrap.min.css',
            'resources/assets/css/AdminLTE.min.css',
            'resources/assets/css/skins/_all-skins.css',],'public/css/all.css')
;
mix.scripts([
            'resources/assets/js/jquery-2.2.3.min.js',
            'resources/assets/js/bootstrap.min.js',
            'resources/assets/js/fastclick.js',
            'resources/assets/js/jquery.slimscroll.min.js',
            'resources/assets/js/app.min.js',],'public/js/all.js')
;
