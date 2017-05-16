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
  .scripts([
    'resources/assets/js/jquery-1.11.1.min.js',
    'resources/assets/js/modernizr.custom.js',
    'resources/assets/js/jquery.flexslider.js',
    'resources/assets/js/imagezoom.js'
  ], 'public/js/initial.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
  .styles([
    'resources/assets/sass/theme/style.css',
    'resources/assets/sass/theme/flexslider1.css'
  ], 'public/css/initial.css');
