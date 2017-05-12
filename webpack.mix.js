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
            'resources/assets/bootstrap/css/bootstrap.min.css',
            'resources/assets/dist/css/AdminLTE.min.css',
            'resources/assets/dist/css/skins/_all-skins.css',
            'resources/assets/datepicker3.css',
            'resources/assets/mystyle.css'],'public/css/all.css')
;
mix.scripts([
            'resources/assets/plugins/jQuery/jquery-2.2.3.min.js',
            'resources/assets/bootstrap/js/bootstrap.min.js',
            'resources/assets/plugins/fastclick/fastclick.js',
            'resources/assets/plugins/slimScroll/jquery.slimscroll.min.js',
            'resources/assets/bootstrap-datepicker.js',
            'resources/assets/myscript1.js',
            'resources/assets/comment.js',
            'resources/assets/dist/js/app.min.js',],'public/js/all.js')
;
