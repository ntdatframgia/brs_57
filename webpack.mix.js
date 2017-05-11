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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles('resources/assets/bootstrap/css/bootstrap.min.css', 'public/bootstrap/css/bootstrap.min.css')
   .styles('resources/assets/dist/css/AdminLTE.min.css', 'public/dist/css/AdminLTE.min.css')
   .styles('resources/assets/dist/css/skins/_all-skins.css', 'public/dist/css/skins/_all-skins.min.css')
   .styles('resources/assets/mystyle.css', 'public/dist/css/mystyle.css')
   .js('resources/assets/myscript1.js', 'public/dist/myscript1.js')
   .js('resources/assets/bootstrap/js/bootstrap.min.js', 'public/bootstrap/js/bootstrap.min.js')
   .js('resources/assets/dist/js/app.min.js', 'public/dist/js/app.min.js')
   .js('resources/assets/js/bootstrap.js', 'public/js/bootstrap.js')
   .js('resources/assets/plugins/fastclick/fastclick.js', 'public/plugins/fastclick/fastclick.js')
   .js('resources/assets/plugins/jQuery/jquery-2.2.3.min.js', 'public/plugins/jQuery/jquery-2.2.3.min.js')
   .js('resources/assets/plugins/slimScroll/jquery.slimscroll.min.js', 'public/plugins/slimScroll/jquery.slimscroll.min.js')
;
